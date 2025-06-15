@extends('layouts.admin')

@section('title', 'Data Diagnosa')

@push('styles')
<!-- DataTables Core CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('css/admin/diagnosa.css') }}">
@endpush

@section('content')
<div class="diagnosa-container">
    <h1 class="diagnosa-title">Data Diagnosa</h1>

    <div class="diagnosa-actions">
        <a href="{{ route('admin.diagnosa.create') }}" class="tambah-btn">Tambah Diagnosa +</a>
    </div>

    <div class="table-wrapper">
        <table class="diagnosa-table" id="example1" style="width:100%"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Diagnosa</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Catatan Pakar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosas as $diagnosa)
                <tr>
                    <td>{{ $diagnosa->id_diagnosa }}</td>
                    <td>{{ $diagnosa->nama_diagnosa }}</td>
                    <td>{{ $diagnosa->deskripsi }}</td>
                    <td>
                        <span class="badge status-{{ $diagnosa->status_verifikasi }}">
                            {{ ucfirst($diagnosa->status_verifikasi) }}
                        </span>
                    </td>
                    <td>{{ $diagnosa->catatan_pakar }}</td>
                    <td class="action-icons">
                        <a href="{{ route('admin.diagnosa.edit', $diagnosa->id_diagnosa) }}" class="edit-icon">✏️</a>
                        <form class="form-hapus" action="{{ route('admin.diagnosa.destroy', $diagnosa->id_diagnosa) }}" method="POST" style="display: inline;">
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
