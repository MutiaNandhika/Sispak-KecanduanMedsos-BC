@extends('layouts.admin')

@section('title', 'Data Hasil Gejala')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/hasil-gejala.css') }}">
@endpush

@section('content')
<div class="hasilgejala-container">
    <h1 class="hasilgejala-title">Data Hasil Gejala</h1>

    <div class="table-wrapper">
        <table class="hasilgejala-table">
            <thead>
                <tr>
                    <th>ID Hasil Gejala</th>
                    <th>ID Hasil</th>
                    <th>ID Gejala</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasils as $hasil)
                <tr>
                    <td>{{ $hasil->id_hasil_gejala }}</td>
                    <td>{{ $hasil->id_hasil }}</td>
                    <td>{{ $hasil->id_gejala }}</td>
                    <td class="action-icons">
                        <form 
                            class="form-hapus" 
                            action="{{ route('admin.hasilgejala.destroy', $hasil->id_hasil_gejala) }}" 
                            method="POST" 
                            style="display:inline;"
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
