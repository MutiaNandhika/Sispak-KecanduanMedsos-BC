@extends('layouts.admin')

@section('title', 'Tambah Gejala')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Tambah Gejala</h2>

    <form action="{{ route('admin.gejala.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Gejala</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.gejala.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
