@extends('layouts.admin')

@section('title', 'Data Solusi')

@push('styles')
<!-- DataTables Core CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/admin/solusi.css') }}">
@endpush

@section('content')
<div class="solusi-container">
    <h1 class="solusi-title">Data Solusi</h1>

    <div class="solusi-actions">
        <a href="{{ route('admin.solusi.create') }}" class="tambah-btn">Tambah Solusi +</a>
    </div>

    <div class="table-wrapper">
        <table class="solusi-table" id="example1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Diagnosa</th>
                    <th>Solusi</th>
                    <th>Status</th>
                    <th>Catatan Pakar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solusis as $solusi)
                <tr>
                    <td>{{ $solusi->id_solusi }}</td>
                    <td>{{ $solusi->diagnosa->nama_diagnosa ?? '-' }}</td>
                    <td>{{ $solusi->solusi_diagnosa }}</td>
                    <td>
                        <span class="badge status-{{ $solusi->status_verifikasi }}">
                            {{ ucfirst($solusi->status_verifikasi) }}
                        </span>
                    </td>
                    <td>{{ $solusi->catatan_pakar ?? '-' }}</td>
                    <td class="action-icons">
                        <a href="{{ route('admin.solusi.edit', $solusi->id_solusi) }}" class="edit-icon">✏️</a>
                        <form class="form-hapus" action="{{ route('admin.solusi.destroy', $solusi->id_solusi) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-icon" style="background: none; border: none; cursor: pointer;">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        const table = $("#example1").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            ordering: true,
            pageLength: 5,
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            columnDefs: [
                { orderable: false, targets: -1 }
            ]
        });

        table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.form-hapus');
        forms.forEach(form => {
            form.querySelector('button').addEventListener('click', function () {
                Swal.fire({
                    title: 'Hapus Data?',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e53935',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
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
