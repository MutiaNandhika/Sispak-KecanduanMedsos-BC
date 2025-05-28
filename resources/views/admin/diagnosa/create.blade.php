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
            <label for="nama_diagnosa">Nama Diagnosa</label>
            <input type="text" name="nama_diagnosa" id="nama_diagnosa" required value="{{ old('nama_diagnosa') }}">
            @error('nama_diagnosa')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
         <!-- BUAT DI PAKAR -->
        <!-- <div class="form-group">
            <label for="status_verifikasi">Status Verifikasi</label>
            <select name="status_verifikasi" id="status_verifikasi" required>
                <option value="pending" {{ old('status_verifikasi') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diterima" {{ old('status_verifikasi') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ old('status_verifikasi') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
            @error('status_verifikasi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="catatan_pakar">Catatan Pakar</label>
            <textarea name="catatan_pakar" id="catatan_pakar" rows="3">{{ old('catatan_pakar') }}</textarea>
            @error('catatan_pakar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div> -->

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.diagnosa.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
