@extends('layouts.admin')

@section('title', 'Edit Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}"> {{-- gunakan CSS yang sama --}}
@endpush

@section('content')
<div class="form-container">
   
    <h2 class="form-title">Edit Diagnosa</h2>

    <form action="{{ route('admin.diagnosa.update', $diagnosa->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama">Nama Diagnosa</label>
        <input type="text" name="nama" id="nama" value="{{ $diagnosa->nama }}" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" required>{{ $diagnosa->deskripsi }}</textarea>
    </div>

    <div class="form-buttons">
        <button type="submit" class="btn-simpan">Update</button>
        <a href="{{ route('admin.diagnosa.index') }}" class="btn-batal">Batal</a>
    </div>
</form>

</div>
@endsection
