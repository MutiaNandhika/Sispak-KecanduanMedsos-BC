@extends('layouts.admin')

@section('title', 'Data Pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/user.css') }}">
@endpush

@section('content')
<div class="data-container">
    <h1 class="data-title">Data Pengguna</h1>

    <div class="data-actions">
        <a href="{{ route('admin.user.create') }}" class="btn tambah-btn">Tambah Pengguna +</a>
    </div>

    <div class="table-wrapper">
        <table class="data-table">
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
                    <td class="action-icons">
                        <a href="{{ route('admin.user.edit', $user->id_user) }}" title="Ubah">✏️</a>
                        <form class="form-hapus" action="{{ route('admin.user.destroy', $user->id_user) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" title="Hapus">🗑️</button>
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
        title: 'Hapus Pengguna?',
        text: 'Data pengguna akan dihapus permanen',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e53935',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
      }).then(res => {
        if (res.isConfirmed) {
          btn.closest('form').submit();
        }
      });
    });
  });
});
</script>
@endpush
