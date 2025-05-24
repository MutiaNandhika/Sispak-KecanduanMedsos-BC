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
            <label for="diagnosa_id">Diagnosa</label>
            <select name="diagnosa_id" id="diagnosa_id" required>
                <option value="">-- Pilih Diagnosa --</option>
                @foreach ($diagnosas as $diagnosa)
                    <option value="{{ $diagnosa->id }}">{{ $diagnosa->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="pertanyaan">Pertanyaan</label>
            <textarea name="pertanyaan" id="pertanyaan" rows="4" required></textarea>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.pertanyaan.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
