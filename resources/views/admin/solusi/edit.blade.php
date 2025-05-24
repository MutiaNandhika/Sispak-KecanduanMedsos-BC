@extends('layouts.admin')

@section('title', 'Edit Solusi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Edit Solusi</h2>

    <form action="{{ route('admin.solusi.update', $solusi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="diagnosa_id">Diagnosa</label>
            <select name="diagnosa_id" id="diagnosa_id" required>
                <option value="">-- Pilih Diagnosa --</option>
                @foreach ($diagnosas as $diagnosa)
                    <option value="{{ $diagnosa->id }}" {{ $diagnosa->id == $solusi->diagnosa_id ? 'selected' : '' }}>
                        {{ $diagnosa->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="solusi">Solusi</label>
            <textarea name="solusi" id="solusi" rows="4" required>{{ $solusi->solusi }}</textarea>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Update</button>
            <a href="{{ route('admin.solusi.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
