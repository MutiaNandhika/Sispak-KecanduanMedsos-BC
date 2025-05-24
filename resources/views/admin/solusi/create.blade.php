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
            <label for="diagnosa_id">Diagnosa</label>
            <select name="diagnosa_id" id="diagnosa_id" required>
                <option value="">-- Pilih Diagnosa --</option>
                @foreach ($diagnosas as $diagnosa)
                    <option value="{{ $diagnosa->id }}">{{ $diagnosa->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="solusi">Solusi</label>
            <textarea name="solusi" id="solusi" rows="4" required></textarea>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="{{ route('admin.solusi.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
