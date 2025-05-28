@extends('layouts.pakar')

@section('title', 'Data Pengguna')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pakar/pengguna.css') }}">
@endpush

@section('content')
<div class="pengguna-container">
    <h2 class="table-header">Data Pengguna</h2>

    <table class="pengguna-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th> <!-- Kolom Aksi -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Naruto</td>
                <td>naruto@gmail.com</td>
                <td>pakar</td>
                <td class="aksi-icons">
                    <button class="icon-btn" title="Validasi"><span>✔️</span></button>
                    <button class="icon-btn" title="Tolak"><span>❌</span></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
