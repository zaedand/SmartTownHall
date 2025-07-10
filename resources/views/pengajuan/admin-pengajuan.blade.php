@extends('panel')
@section('content')
<style>
    .center {
        text-align: center;
        align-content: center;
    }
</style>

<br>
@php
    $statusLabels = [
        0 => 'Belum',
        1 => 'Diterima',
        2 => 'Ditolak',
    ];

    if (!function_exists('getStatusButtonClass')) {
    function getStatusButtonClass($status) {
        $classes = [
            0 => 'btn-secondary',
            1 => 'btn-success',
            2 => 'btn-danger',
        ];

        return $classes[$status] ?? 'btn-secondary';
    }
}

@endphp
<div class="details">
    <div class="recentOrders">
        <div class="container-fluid mt-4 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1>Pengajuan Masuk</h1>
                </div>
                <div class="card-body">

                    @if(session('success'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('updated'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('updated') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Jenis</th>
                                    <th>KTP</th>
                                    <th>Surat</th>
                                    <th>Status Validasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuans as $pengajuan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengajuan->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ $pengajuan->nama }}</td>
                                        <td>{{ $pengajuan->no_telepon }}</td>
                                        <td>{{ $pengajuan->jenis }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buktiPembayaranModal{{ $pengajuan->id }}">
                                                Lihat
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="buktiPembayaranModal{{ $pengajuan->id }}" tabindex="-1" role="dialog" aria-labelledby="buktiPembayaranModalLabel{{ $pengajuan->id }}" aria-hidden="false">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="buktiPembayaranModalLabel{{ $pengajuan->id }}">Foto KTP</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src= "{{ asset('storage/images/' . $pengajuan->ktp) }}" alt="notfound" style="max-width: 100%; max-height: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="{{ asset('storage/surat/' . $pengajuan->surat) }}" target="_blank">Lihat Surat</a></td>
                                        <td>
                                            <!-- Modal trigger button -->
                                            <button class="btn {{ getStatusButtonClass($pengajuan->status_validasi) }}" type="button" id="statusDropdown{{ $pengajuan->id }}" data-toggle="modal" data-target="#statusValidationModal{{ $pengajuan->id }}">
                                                {{ $statusLabels[$pengajuan->status_validasi] }}
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="statusValidationModal{{ $pengajuan->id }}" tabindex="-1" role="dialog" aria-labelledby="statusValidationModalLabel{{ $pengajuan->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="statusValidationModalLabel{{ $pengajuan->id }}">Update Status Validasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Status saat ini: {{ $statusLabels[$pengajuan->status_validasi] }}</p>
                                                            <form method="post" action="{{ route('update-status-pengajuan', ['id' => $pengajuan->id]) }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="newStatus">Perbarui Status:</label>
                                                                    <select class="form-control" id="newStatus{{ $pengajuan->id }}" name="status">
                                                                        @foreach ($statusLabels as $key => $label)
                                                                            <option value="{{ $key }}" {{ $pengajuan->status_validasi == $key ? 'selected' : '' }}>{{ $label }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary" style="margin-top:1em;">Update Status</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapusModal{{$pengajuan->id}}">
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="hapusModal{{ $pengajuan->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$pengajuan->id}}" aria-hidden="false">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusModalLabel{{$pengajuan->id}}">Konfirmasi Hapus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data ke <b>{{ $loop->iteration }}</b>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <form method="post" action="{{ route('hapus-pengajuan', ['id' => $pengajuan->id]) }}">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // No script adjustment needed
    });
</script>

@endsection
