@extends('layouts.pakar')

@section('title', 'Data Diagnosa')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pakar/diagnosa.css') }}">
@endpush

@section('content')
<div class="diagnosa-container">
    <h2 class="table-header">Data Diagnosa</h2>

    <div class="table-wrapper">
        <table class="diagnosa-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Diagnosa</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosas as $diagnosa)
                <tr>
                    <td>{{ $diagnosa->id_diagnosa }}</td>
                    <td>{{ $diagnosa->nama_diagnosa }}</td>
                    <td>{{ $diagnosa->deskripsi }}</td>
                    <td>
                        <span class="status-badge status-{{ $diagnosa->status_verifikasi }}">
                            {{ ucfirst($diagnosa->status_verifikasi) }}
                        </span>
                    </td>
                    <td class="aksi-icons">
                        <button class="icon-btn accept-btn" data-id="{{ $diagnosa->id_diagnosa }}" title="Terima">
                            <span>✔️</span>
                        </button>
                        <button class="icon-btn reject-btn" data-id="{{ $diagnosa->id_diagnosa }}" title="Tolak">
                            <span>❌</span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for adding notes -->
    <div id="verificationModal" class="modal" style="display: none;">
    <div class="modal-content">
        <button class="close-modal" type="button">&times;</button>
        <h3 id="modal-title">Verifikasi Diagnosa</h3>
        <form id="verificationForm" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="status_verifikasi" name="status_verifikasi">
            <div class="form-group">
                <label for="catatan_pakar">Catatan (opsional):</label>
                <textarea id="catatan_pakar" name="catatan_pakar" rows="4" placeholder="Masukkan catatan jika diperlukan"></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="submit-btn">Simpan</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('verificationModal');
        const form = document.getElementById('verificationForm');
        const closeBtn = document.querySelector('.close-modal');
        const statusInput = document.getElementById('status_verifikasi');
        const modalTitle = document.getElementById('modal-title');
        
        // Accept button click
        document.querySelectorAll('.accept-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                statusInput.value = 'diterima';
                modalTitle.textContent = 'Terima Diagnosa';
                form.action = `/pakar/diagnosa/${id}/verify`;
                modal.style.display = 'block';
            });
        });
        
        // Reject button click
        document.querySelectorAll('.reject-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                statusInput.value = 'ditolak';
                modalTitle.textContent = 'Tolak Diagnosa';
                form.action = `/pakar/diagnosa/${id}/verify`;
                modal.style.display = 'block';
            });
        });
        
        // Close modal
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });
        
        // Close modal when clicking outside
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>
@endpush
