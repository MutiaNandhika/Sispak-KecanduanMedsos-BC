@extends('layouts.admin')

@section('title', 'Edit Gejala')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Edit Gejala</h2>

    <form action="{{ route('admin.gejala.update', $gejala->id_gejala) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_gejala">Nama Gejala</label>
            <input type="text" name="nama_gejala" id="nama_gejala" value="{{ $gejala->nama_gejala }}" required>
        </div>

        <!-- <div class="form-group">
            <label for="status_verifikasi">Status Verifikasi</label>
            <select name="status_verifikasi" id="status_verifikasi" required>
                <option value="menunggu" {{ $gejala->status_verifikasi == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="diterima" {{ $gejala->status_verifikasi == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ $gejala->status_verifikasi == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div> -->

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Update</button>
            <a href="{{ route('admin.gejala.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
