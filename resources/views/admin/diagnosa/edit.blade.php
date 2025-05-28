@extends('layouts.admin')

@section('title', 'Edit Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Edit Diagnosa</h2>

    <form action="{{ route('admin.diagnosa.update', $diagnosa->id_diagnosa) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_diagnosa">Nama Diagnosa</label>
            <input type="text" name="nama_diagnosa" id="nama_diagnosa" value="{{ $diagnosa->nama_diagnosa }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" required>{{ $diagnosa->deskripsi }}</textarea>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.diagnosa.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
