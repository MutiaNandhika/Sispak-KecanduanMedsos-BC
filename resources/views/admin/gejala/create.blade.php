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
            <label for="nama_gejala">Nama Gejala</label>
            <input type="text" name="nama_gejala" id="nama_gejala" required value="{{ old('nama_gejala') }}">
            @error('nama_gejala')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Field status_verifikasi diset otomatis di controller, tidak ditampilkan di form admin --}}
        {{-- <div class="form-group">
            <label for="status_verifikasi">Status Verifikasi</label>
            <select name="status_verifikasi" id="status_verifikasi" required>
                <option value="menunggu" {{ old('status_verifikasi') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="diterima" {{ old('status_verifikasi') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ old('status_verifikasi') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div> --}}

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.gejala.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
