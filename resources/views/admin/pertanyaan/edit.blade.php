@extends('layouts.admin')

@section('title', 'Edit Pertanyaan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Edit Pertanyaan</h2>

    <form action="{{ route('admin.pertanyaan.update', $pertanyaan->id_pertanyaan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_gejala">Gejala</label>
            <select name="id_gejala" id="id_gejala" required>
                <option value="">-- Pilih Gejala --</option>
                @foreach ($gejalas as $gejala)
                    <option value="{{ $gejala->id_gejala }}" 
                        {{ $gejala->id_gejala == $pertanyaan->id_gejala ? 'selected' : '' }}>
                        {{ $gejala->nama_gejala }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="pertanyaan_gejala">Pertanyaan</label>
            <textarea name="pertanyaan_gejala" id="pertanyaan_gejala" rows="4" required>{{ $pertanyaan->pertanyaan_gejala }}</textarea>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Update</button>
            <a href="{{ route('admin.pertanyaan.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
