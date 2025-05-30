{{-- resources/views/admin/pengguna/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Edit Pengguna</h2>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="form-group">
            <label for="nama">Nama</label>
            <input 
                type="text" 
                name="nama" 
                id="nama" 
                required 
                value="{{ old('nama', $user->nama) }}"
            >
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type="text" 
                name="email" 
                id="email" 
                required 
                value="{{ old('email', $user->email) }}"
            >
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Password (jika ingin diubah) --}}
        <div class="form-group">
            <label for="password">Password <small>(kosongkan jika tidak diubah)</small></label>
            <input 
                type="text" 
                name="password" 
                id="password"
            >
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Role --}}
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="admin" {{ old('role', $user->role)=='admin' ? 'selected':'' }}>Admin</option>
                <option value="pakar" {{ old('role', $user->role)=='pakar' ? 'selected':'' }}>Pakar</option>
                <option value="user"  {{ old('role', $user->role)=='user'  ? 'selected':'' }}>User</option>
            </select>
            @error('role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Update</button>
            <a href="{{ route('admin.user.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
