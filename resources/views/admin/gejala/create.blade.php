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
            <input type="text" name="nama_gejala" id="nama_gejala" required>
        </div>

        <!-- <div class="form-group">
            <label for="status_verifikasi">Status Verifikasi</label>
            <select name="status_verifikasi" id="status_verifikasi" required>
                <option value="menunggu">Menunggu</option>
                <option value="diterima">Diterima</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div> -->

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.gejala.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
