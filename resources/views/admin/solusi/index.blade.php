@extends('layouts.admin')

@section('title', 'Data Solusi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/solusi.css') }}">
@endpush

@section('content')
<div class="solusi-container">
    <h1 class="solusi-title">Data Solusi</h1>

    <div class="solusi-actions">
        <a href="{{ route('admin.solusi.create') }}" class="tambah-btn">Tambah Solusi +</a>
    </div>

    <div class="table-wrapper">
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
                @foreach ($solusis as $solusi)
                <tr>
                    <td>{{ $solusi->id }}</td>
                    <td>{{ $solusi->diagnosa->nama ?? '-' }}</td>
                    <td>{{ $solusi->solusi }}</td>
                    <td class="action-icons">
                        <a href="{{ route('admin.solusi.edit', $solusi->id) }}" class="edit-icon">✏️</a>
                        <form class="form-hapus" action="{{ route('admin.solusi.destroy', $solusi->id) }}" method="POST" style="display: inline;">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
