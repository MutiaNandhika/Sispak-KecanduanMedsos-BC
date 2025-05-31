@extends('layouts.pakar')

@section('title', 'Data Gejala')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('css/pakar/gejala.css') }}">
@endpush

@section('content')
<h2 class="table-header">Data Gejala</h2>

<div class="gejala-container">

        <table class="gejala-table" id="example1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gejala</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gejalas as $gejala)
                <tr>
                    <td>{{ $gejala->id_gejala }}</td>
                    <td>{{ $gejala->nama_gejala }}</td>
                    <td>
                        <span class="status-badge status-{{ $gejala->status_verifikasi }}">
                            {{ ucfirst($gejala->status_verifikasi) }}
                        </span>
                    </td>
                    <td class="aksi-icons">
                        <button class="icon-btn accept-btn" data-id="{{ $gejala->id_gejala }}" title="Terima">
                            <span>✔️</span>
                        </button>
                        <button class="icon-btn reject-btn" data-id="{{ $gejala->id_gejala }}" title="Tolak">
                            <span>❌</span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    

    <!-- Modal for adding notes -->
    <div id="verificationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <button class="close-modal" type="button">&times;</button>
            <h3 id="modal-title">Verifikasi Gejala</h3>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            ordering: true,
            pageLength: 5,
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            columnDefs: [
            { orderable: false, targets: -1 }
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

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
                modalTitle.textContent = 'Terima Gejala';
                form.action = `/pakar/gejala/${id}/verify`;
                modal.style.display = 'block';
            });
        });
        
        // Reject button click
        document.querySelectorAll('.reject-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                statusInput.value = 'ditolak';
                modalTitle.textContent = 'Tolak Gejala';
                form.action = `/pakar/gejala/${id}/verify`;
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
