@extends('layouts.admin')

@section('title', 'Tambah Solusi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Tambah Solusi</h2>

    <form action="{{ route('admin.solusi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_diagnosa">Diagnosa</label>
            <select name="id_diagnosa" id="id_diagnosa" required>
                <option value="">-- Pilih Diagnosa --</option>
                @foreach ($diagnosas as $diagnosa)
                    <option value="{{ $diagnosa->id_diagnosa }}">{{ $diagnosa->nama_diagnosa }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="solusi_diagnosa">Solusi</label>
            <textarea name="solusi_diagnosa" id="solusi_diagnosa" rows="4" required></textarea>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.solusi.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
