@extends('layouts.admin')

@section('title', 'Data Gejala')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/gejala.css') }}">
@endpush

@section('content')
<div class="gejala-container">
    <h1 class="gejala-title">Data Gejala</h1>

    <div class="gejala-actions">
        <a href="{{ route('admin.gejala.create') }}" class="tambah-btn">Tambah Gejala +</a>
    </div>

    <div class="table-wrapper">
        <table class="gejala-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Gejala</th>
                    <th>Status Verifikasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gejalas as $gejala)
                <tr>
                    <td>{{ $gejala->id_gejala }}</td>
                    <td>{{ $gejala->nama_gejala }}</td>
                    <td>{{ ucfirst($gejala->status_verifikasi) }}</td>
                    <td class="action-icons">
                        <a href="{{ route('admin.gejala.edit', $gejala->id_gejala) }}" class="edit-icon">✏️</a>
                        <form class="form-hapus" action="{{ route('admin.gejala.destroy', $gejala->id_gejala) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-icon" style="background: none; border: none; cursor: pointer;">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('.form-hapus');
        forms.forEach(form => {
            form.querySelector('button').addEventListener('click', function () {
                Swal.fire({
                    title: 'Hapus Data?',
                    text: 'Apakah Anda yakin ingin menghapus data ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e53935',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
