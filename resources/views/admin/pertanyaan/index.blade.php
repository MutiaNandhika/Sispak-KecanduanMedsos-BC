@extends('layouts.admin')

@section('title', 'Data Pertanyaan')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('css/admin/pertanyaan.css') }}">
@endpush

@section('content')
<div class="pertanyaan-container">
    <h1 class="pertanyaan-title">Data Pertanyaan</h1>

    <div class="pertanyaan-actions">
        <a href="{{ route('admin.pertanyaan.create') }}" class="tambah-btn">Tambah Pertanyaan +</a>
    </div>

    <div class="table-wrapper">
        <table class="pertanyaan-table" id="example2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gejala</th>
                    <th>Pertanyaan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pertanyaans as $pertanyaan)
                <tr>
                    <td>{{ $pertanyaan->id_pertanyaan }}</td>
                    <td>{{ $pertanyaan->gejala->nama_gejala }}</td>
                    <td>{{ $pertanyaan->pertanyaan_gejala }}</td>
                    <td>
                        <span class="badge status-{{ $pertanyaan->status_verifikasi }}">
                            {{ ucfirst($pertanyaan->status_verifikasi) }}
                        </span>
                    </td>
                    <td class="action-icons">
                        <a href="{{ route('admin.pertanyaan.edit', $pertanyaan->id_pertanyaan) }}" class="edit-icon" title="Edit">✏️</a>
                        <form class="form-hapus" action="{{ route('admin.pertanyaan.destroy', $pertanyaan->id_pertanyaan) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-icon" title="Hapus" style="background: none; border: none; cursor: pointer;">🗑️</button>
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
        const table = $("#example2").DataTable({
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

        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });

    document.querySelectorAll('.form-hapus').forEach(form => {
        form.querySelector('button').addEventListener('click', function () {
            Swal.fire({
                title: 'Hapus Pertanyaan?',
                text: 'Data ini akan dihapus secara permanen.',
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
