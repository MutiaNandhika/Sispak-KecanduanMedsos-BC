@extends('layouts.admin')

@section('title', 'Data Pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/pengguna.css') }}">
@endpush

@section('content')
<div class="pengguna-container"> {{-- disamakan dengan pengguna --}}
    <h1 class="pengguna-title">Data Pengguna</h1>

    <div class="pengguna-actions"> {{-- disamakan --}}
        <a href="{{ route('admin.user.create') }}" class="tambah-btn">Tambah Pengguna +</a>
    </div>

    <div class="table-wrapper">
        <table class="pengguna-table"> {{-- disamakan --}}
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Peran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id_user }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td class="action-icons"> {{-- disamakan --}}
                        <a href="{{ route('admin.user.edit', $user->id_user) }}" class="edit-icon" title="Ubah">✏️</a>
                        <form action="{{ route('admin.user.destroy', $user->id_user) }}"
                              method="POST"
                              class="form-hapus"
                              style="display:inline">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.form-hapus button').forEach(btn => {
        btn.addEventListener('click', () => {
            Swal.fire({
                title: 'Hapus Data?',
                text: 'Apakah Anda yakin ingin menghapus pengguna ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e53935',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then(result => {
                if (result.isConfirmed) {
                    btn.closest('form').submit();
                }
            });
        });
    });
});
</script>
@endpush
