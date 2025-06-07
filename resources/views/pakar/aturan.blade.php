@extends('layouts.pakar')

@section('title', 'Data Aturan')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('css/pakar/diagnosa.css') }}">
<style>
    .card {
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 8px;
        margin-bottom: 20px;
    }
    
    .card-header {
        padding: 15px 20px;
        border-bottom: 1px solid #dee2e6;
        border-radius: 8px 8px 0 0;
        background-color: #EBDEFC;
        color: #7D6898;
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    .card-title {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .form-group label {
        font-weight: 500;
        color: #1F5E5D;
        margin-bottom: 6px;
        display: block;
    }
    .form-group input[type="text"],
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #d1c4e9;
        border-radius: 8px;
        font-size: 1rem;
        font-family: 'Poppins', sans-serif;
        background: #fff;
        color: #333;
        transition: border-color 0.2s;
        box-sizing: border-box;
        margin-bottom: 0;
    }
    .form-group input[type="text"]:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #7e57c2;
        outline: none;
    }
    .form-group .invalid-feedback {
        color: #d32f2f;
        font-size: 0.85rem;
        margin-top: 4px;
    }

    .btn {
        padding: 0.55rem 1.4rem;
        background-color: #7e57c2;
        color: #fff;
        font-size: 0.95rem;
        font-weight: 600;
        border-radius: 999px;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0,0,0,0.12);
        transition: background 0.2s;
        font-family: 'Poppins', sans-serif;
        margin-top: 2px;
    }
    .btn:hover {
        background-color: #6a48a8;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">

    <h2 class="table-header">Manajemen Aturan</h2>

    <!-- Form to add new rules -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Aturan Baru</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pakar.aturan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="id_diagnosa">Diagnosa</label>
                                    <select class="form-control @error('id_diagnosa') is-invalid @enderror" id="id_diagnosa" name="id_diagnosa" required>
                                        <option value="">-- Pilih Diagnosa --</option>
                                        @foreach($diagnosas as $diagnosa)
                                            <option value="{{ $diagnosa->id_diagnosa }}">{{ $diagnosa->nama_diagnosa }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_diagnosa')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="id_gejala">Gejala</label>
                                    <select class="form-control @error('id_gejala') is-invalid @enderror" id="id_gejala" name="id_gejala" required>
                                        <option value="">-- Pilih Gejala --</option>
                                        @foreach($gejalas as $gejala)
                                            <option value="{{ $gejala->id_gejala }}">{{ $gejala->nama_gejala }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_gejala')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="d-block">&nbsp;</label>
                                    <button type="submit" class="btn">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Existing rules table -->
    <div class="diagnosa-container">
        <table id="aturanTable" class="diagnosa-table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Gejala</th>
                    <th>Diagnosa</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($aturans as $index => $aturan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $aturan->gejala->nama_gejala ?? 'Gejala tidak ditemukan' }}</td>
                    <td>{{ $aturan->diagnosa->nama_diagnosa ?? 'Diagnosa tidak ditemukan' }}</td>
                    <td class="aksi-icons">
                        <form action="{{ route('pakar.aturan.destroy', $aturan->id_aturan) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-btn reject-btn" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus">
                                <span>❌</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada aturan yang ditambahkan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $("#aturanTable").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            ordering: true,
            pageLength: 10,
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            columnDefs: [
                { orderable: false, targets: -1 }
            ]
        }).buttons().container().appendTo('#aturanTable_wrapper .col-md-6:eq(0)');
    });
</script>

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 4000
    });
</script>
@endif
@endpush