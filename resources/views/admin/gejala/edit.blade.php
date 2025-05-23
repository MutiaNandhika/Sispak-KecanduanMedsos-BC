@extends('layouts.admin')

@section('title', 'Edit Gejala')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endpush

@section('content')
<div class="form-container">
    <h2 class="form-title">Edit Gejala</h2>

    <form action="{{ route('admin.gejala.update', $gejala->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Gejala</label>
            <input type="text" name="nama" id="nama" value="{{ $gejala->nama }}" required>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-simpan">Update</button>
            <a href="{{ route('admin.gejala.index') }}" class="btn-batal">Batal</a>
        </div>
    </form>
</div>
@endsection
