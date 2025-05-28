@extends('layouts.pakar')

@section('title', 'Data Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pakar/diagnosa.css') }}">
@endpush

@section('content')
<div class="diagnosa-container">
    <h2 class="table-header">Data Diagnosa</h2>

    <table class="diagnosa-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Diagnosa</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kecanduan Sedang</td>
                <td>Penggunaan media sosial secara berlebihan yang mengakibatkan stress berlebihan</td>
                <td class="aksi-icons">
                    <button class="icon-btn" title="Validasi"><span>✔️</span></button>
                    <button class="icon-btn" title="Tolak"><span>❌</span></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
