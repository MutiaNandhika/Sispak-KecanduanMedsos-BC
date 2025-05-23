@extends('layouts.admin')

@section('title', 'Data Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/diagnosa.css') }}">
@endpush

@section('content')
<div class="diagnosa-container">
    <h1 class="diagnosa-title">Data Diagnosa</h1>

    <div class="diagnosa-actions">
        <a href="#" class="tambah-btn">Tambah Diagnosa +</a>
    </div>

    <div class="table-wrapper">
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
                    <td>Tidak Kecanduan</td>
                    <td>xxxxxxxxxx</td>
                    <td class="action-icons">
                        <a href="#" class="edit-icon">✏️</a>
                        <a href="#" class="delete-icon">🗑️</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Tidak Kecanduan</td>
                    <td>xxxxxxxxxx</td>
                    <td class="action-icons">
                        <a href="#" class="edit-icon">✏️</a>
                        <a href="#" class="delete-icon">🗑️</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Tidak Kecanduan</td>
                    <td>xxxxxxxxxx</td>
                    <td class="action-icons">
                        <a href="#" class="edit-icon">✏️</a>
                        <a href="#" class="delete-icon">🗑️</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Tidak Kecanduan</td>
                    <td>xxxxxxxxxx</td>
                    <td class="action-icons">
                        <a href="#" class="edit-icon">✏️</a>
                        <a href="#" class="delete-icon">🗑️</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Tidak Kecanduan</td>
                    <td>xxxxxxxxxx</td>
                    <td class="action-icons">
                        <a href="#" class="edit-icon">✏️</a>
                        <a href="#" class="delete-icon">🗑️</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Tidak Kecanduan</td>
                    <td>xxxxxxxxxx</td>
                    <td class="action-icons">
                        <a href="#" class="edit-icon">✏️</a>
                        <a href="#" class="delete-icon">🗑️</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Tidak Kecanduan</td>
                    <td>xxxxxxxxxx</td>
                    <td class="action-icons">
                        <a href="#" class="edit-icon">✏️</a>
                        <a href="#" class="delete-icon">🗑️</a>
                    </td>
                </tr>
                <!-- Tambah baris data lain jika perlu -->
            </tbody>
        </table>
    </div>
</div>
@endsection
