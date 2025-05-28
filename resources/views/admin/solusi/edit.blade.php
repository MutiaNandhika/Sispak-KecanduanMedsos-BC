@extends('layouts.admin')

@section('title', 'Edit Solusi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Edit Solusi</h2>

    <form action="{{ route('admin.solusi.update', $solusi->id_solusi) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_diagnosa">Diagnosa</label>
            <select name="id_diagnosa" id="id_diagnosa" required>
                <option value="">-- Pilih Diagnosa --</option>
                @foreach ($diagnosas as $diagnosa)
                    <option value="{{ $diagnosa->id_diagnosa }}" {{ $diagnosa->id_diagnosa == $solusi->id_diagnosa ? 'selected' : '' }}>
                        {{ $diagnosa->nama_diagnosa }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="solusi_diagnosa">Solusi</label>
            <textarea name="solusi_diagnosa" id="solusi_diagnosa" rows="4" required>{{ $solusi->solusi_diagnosa }}</textarea>
        </div>

        <!-- <div class="form-group">
            <label for="status_verifikasi">Status Verifikasi</label>
            <select name="status_verifikasi" id="status_verifikasi" required>
                <option value="pending" {{ $solusi->status_verifikasi == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="diterima" {{ $solusi->status_verifikasi == 'diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="ditolak" {{ $solusi->status_verifikasi == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div> -->

        <!-- <div class="form-group">
            <label for="catatan_pakar">Catatan Pakar (Opsional)</label>
            <textarea name="catatan_pakar" id="catatan_pakar" rows="3">{{ $solusi->catatan_pakar }}</textarea>
        </div> -->

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Update</button>
            <a href="{{ route('admin.solusi.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
