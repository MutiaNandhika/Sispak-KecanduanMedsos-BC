@extends('layouts.admin')

@section('title', 'Data Hasil Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/hasil-diagnosa.css') }}">
@endpush

@section('content')
<div class="hasildiagnosa-container">
    <h1 class="hasildiagnosa-title">Data Hasil Diagnosa</h1>

    <div class="table-wrapper">
        <table class="hasildiagnosa-table">
            <thead>
                <tr>
                    <th>ID Hasil</th>
                    <th>ID Diagnosa</th>
                    <th>ID User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasils as $hasil)
                <tr>
                    <td>{{ $hasil->id_hasil }}</td>
                    <td>{{ $hasil->id_diagnosa }}</td>
                    <td>{{ $hasil->id_user }}</td>
                    <td class="action-icons">
                        <form 
                            class="form-hapus" 
                            action="{{ route('admin.hasil.destroy', $hasil->id_hasil) }}" 
                            method="POST" 
                            style="display: inline;"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-icon" title="Hapus" style="background:none;border:none;cursor:pointer;">🗑️</button>
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
