@extends('layouts.pakar')

@section('title', 'Data Gejala')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pakar/gejala.css') }}">
@endpush

@section('content')
<div class="gejala-container">
    <h2 class="table-header">Data Gejala</h2>

    <table class="gejala-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gejala</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kecanduan Sedang</td>
                <td class="aksi-icons">
                    <button class="icon-btn" title="Validasi"><span>✔️</span></button>
                    <button class="icon-btn" title="Tolak"><span>❌</span></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
