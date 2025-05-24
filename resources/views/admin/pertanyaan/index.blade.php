@extends('layouts.admin')

@section('title', 'Data Pertanyaan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/pertanyaan.css') }}">
@endpush

@section('content')
<div class="pertanyaan-container">
    <h1 class="pertanyaan-title">Data Pertanyaan</h1>

    <div class="pertanyaan-actions">
        <a href="{{ route('admin.pertanyaan.create') }}" class="tambah-btn">Tambah pertanyaan +</a>
    </div>

    <div class="table-wrapper">
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
                @foreach ($pertanyaans as $pertanyaan)
                <tr>
                    <td>{{ $pertanyaan->id }}</td>
                    <td>{{ $pertanyaan->diagnosa->nama ?? '-' }}</td>
                    <td>{{ $pertanyaan->pertanyaan }}</td>
                    <td class="action-icons">
                        <a href="{{ route('admin.pertanyaan.edit', $pertanyaan->id) }}" class="edit-icon">✏️</a>
                        <form class="form-hapus" data-id="{{ $pertanyaan->id }}" style="display: inline;">
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

