@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">

    <h2 class="form-title">Edit Pengguna</h2>

    <form action="{{ route('admin.pengguna.update', $pengguna->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Pengguna</label>
            <input type="text" name="nama" id="nama" value="{{ $pengguna->nama }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ $pengguna->email }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="user" {{ $pengguna->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="pakar" {{ $pengguna->role == 'pakar' ? 'selected' : '' }}>Pakar</option>
            </select>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Update</button>
            <a href="{{ route('admin.pengguna.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>

</div>
@endsection
