@extends('layouts.admin')

@section('title', 'Tambah Pertanyaan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Tambah Pertanyaan</h2>

    <form action="{{ route('admin.pertanyaan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_gejala">Gejala</label>
            <select name="id_gejala" id="id_gejala" required>
                <option value="">-- Pilih Gejala --</option>
                @foreach ($gejalas as $gejala)
                    <option value="{{ $gejala->id_gejala }}">{{ $gejala->nama_gejala }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="pertanyaan_gejala">Pertanyaan</label>
            <textarea name="pertanyaan_gejala" id="pertanyaan_gejala" rows="4" required></textarea>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.pertanyaan.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
