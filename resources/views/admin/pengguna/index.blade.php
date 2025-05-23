@extends('layouts.admin')

@section('title', 'Data Pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/pengguna.css') }}">
@endpush

@section('content')
<div class="pengguna-container">
    <h1 class="pengguna-title">Data Pengguna</h1>

    <div class="pengguna-actions">
        <a href="{{ route('admin.pengguna.create') }}" class="tambah-btn">Tambah Pengguna +</a>
    </div>

    <div class="table-wrapper">
        <table class="pengguna-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penggunas as $pengguna)
                <tr>
                    <td>{{ $pengguna->id }}</td>
                    <td>{{ $pengguna->nama }}</td>
                    <td>{{ $pengguna->email }}</td>
                    <td>{{ ucfirst($pengguna->role) }}</td>
                    <td class="action-icons">
                        <a href="{{ route('admin.pengguna.edit', $pengguna->id) }}" class="edit-icon">✏️</a>
                        <form class="form-hapus" action="{{ route('admin.pengguna.destroy', $pengguna->id) }}" method="POST" style="display: inline;">
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
