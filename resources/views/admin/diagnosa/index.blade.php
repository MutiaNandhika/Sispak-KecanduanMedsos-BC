@extends('layouts.admin')

@section('title', 'Data Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/diagnosa.css') }}">
@endpush

@section('content')
<div class="diagnosa-container">
    <h1 class="diagnosa-title">Data Diagnosa</h1>

    <div class="diagnosa-actions">
        <a href="{{ route('admin.diagnosa.create') }}" class="tambah-btn">Tambah Diagnosa +</a>
    </div>

    <div class="table-wrapper">
        <table class="diagnosa-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Diagnosa</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosas as $diagnosa)
                <tr>
                    <td>{{ $diagnosa->id_diagnosa }}</td>
                    <td>{{ $diagnosa->nama_diagnosa }}</td>
                    <td>{{ $diagnosa->deskripsi }}</td>
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
<script>
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
@endpush