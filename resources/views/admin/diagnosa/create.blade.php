@extends('layouts.admin')

@section('title', 'Tambah Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    
    <h2 class="form-title">Tambah Diagnosa</h2>

    <form action="{{ route('admin.diagnosa.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama Diagnosa</label>
        <input type="text" name="nama" id="nama" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" required></textarea>
    </div>

    <div class="form-buttons">
        <button type="submit" class="btn-simpan">Simpan</button>
        <a href="{{ route('admin.diagnosa.index') }}" class="btn-batal">Batal</a>
    </div>
</form>

</div>
@endsection
