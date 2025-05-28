{{-- resources/views/admin/pengguna/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Tambah Pengguna</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>
            <input 
                type="text" 
                name="nama" 
                id="nama" 
                value="{{ old('nama') }}" 
                required
            >
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                value="{{ old('email') }}" 
                required
            >
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                required
            >
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ old('role')=='admin' ? 'selected':'' }}>Admin</option>
                <option value="pakar" {{ old('role')=='pakar' ? 'selected':'' }}>Pakar</option>
                <option value="user"  {{ old('role')=='user'  ? 'selected':'' }}>User</option>
            </select>
            @error('role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.user.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
