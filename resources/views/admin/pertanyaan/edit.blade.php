@extends('layouts.admin')

@section('title', 'Edit pertanyaan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}"> {{-- gunakan CSS yang sama --}}
@endpush

@section('content')
<div class="form-container">
   
    <h2 class="form-title">Edit Pertanyaan</h2>

    <form action="{{ route('admin.pertanyaan.update', $pertanyaan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama">Diagnosa</label>
        <input type="text" name="nama" id="nama" value="{{ $pertanyaan->nama }}" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Pertanyaan</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" required>{{ $pertanyaan->deskripsi }}</textarea>
    </div>

    <div class="form-buttons">
        <button type="submit" class="btn-simpan">Update</button>
        <a href="{{ route('admin.pertanyaan.index') }}" class="btn-batal">Batal</a>
    </div>
</form>

</div>
@endsection
