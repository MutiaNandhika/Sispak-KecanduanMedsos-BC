@extends('layouts.pakar')

@section('title', 'Data Pertanyaan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pakar/pertanyaan.css') }}">
@endpush

@section('content')
<div class="pertanyaan-container">
    <h2 class="table-header">Data Pertanyaan</h2>

    <table class="pertanyaan-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Diagnosa</th>
                <th>Pertanyaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Tidak Kecanduan</td>
                <td>Pertanyaan </td>
                <td class="aksi-icons">
                    <button class="icon-btn" title="Validasi"><span>✔️</span></button>
                    <button class="icon-btn" title="Tolak"><span>❌</span></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
