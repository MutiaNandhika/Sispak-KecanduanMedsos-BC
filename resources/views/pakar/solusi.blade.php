@extends('layouts.pakar')

@section('title', 'Data Solusi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pakar/solusi.css') }}">
@endpush

@section('content')
<div class="solusi-container">
    <h2 class="table-header">Data Solusi</h2>

    <table class="solusi-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Diagnosa</th>
                <th>Solusi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Tidak Kecanduan</td>
                <td>Solusi </td>
                <td class="aksi-icons">
                    <button class="icon-btn" title="Validasi"><span>✔️</span></button>
                    <button class="icon-btn" title="Tolak"><span>❌</span></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
