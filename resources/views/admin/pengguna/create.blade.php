@extends('layouts.admin')

@section('title', 'Tambah pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    
    <h2 class="form-title">Tambah pengguna</h2>

    <form action="{{ route('admin.pengguna.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama Pengguna</label>
        <input type="text" name="nama" id="nama" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Email</label>
        <input type="text" name="email" id="email" required>
    </div>
    <div class="form-group">
    <label for="role">Role</label>
    <select name="role" id="role" required>
        <option value="">-- Pilih Role --</option>
        <option value="pakar">Pakar</option>
        <option value="user">User</option>
    </select>
</div>

    <div class="form-buttons">
        <button type="submit" class="btn-simpan">Simpan</button>
        <a href="{{ route('admin.pengguna.index') }}" class="btn-batal">Batal</a>
    </div>
</form>

</div>
@endsection
