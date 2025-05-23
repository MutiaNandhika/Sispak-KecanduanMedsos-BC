@extends('layouts.admin')

@section('title', 'Tambah Pertanyaan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    
    <h2 class="form-title">Tambah pertanyaan</h2>

    <form action="{{ route('admin.pertanyaan.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Diagnosa</label>
        <input type="text" name="nama" id="nama" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Pertanyaan</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" required></textarea>
    </div>

    <div class="form-buttons">
        <button type="submit" class="btn-simpan">Simpan</button>
        <a href="{{ route('admin.pertanyaan.index') }}" class="btn-batal">Batal</a>
    </div>
</form>

</div>
@endsection
