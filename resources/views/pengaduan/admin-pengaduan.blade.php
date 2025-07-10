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
                    <h1>Pengaduan Masuk</h1>
                </div>
                <div class="card-body">
                    <br><br>
                    <div class="mb-4 text-center">
                        <button class="btn btn-primary filter-btn" data-filter="All">All</button>
                        <button class="btn btn-secondary filter-btn" data-filter="Belum">Belum</button>
                        <button class="btn btn-success filter-btn" data-filter="Diterima">Diterima</button>
                        <button class="btn btn-danger filter-btn" data-filter="Ditolak">Ditolak</button>
                    </div>
                    <!-- Display success message -->
                    @if (session('success'))
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

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Surat</th>
                                    <th>Status Validasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduans as $pengaduan)
                                    <tr data-status="{{ $statusLabels[$pengaduan->status_validasi] }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pengaduan->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ $pengaduan->nama }}</td>
                                        <td>{{ $pengaduan->no_telepon }}</td>
                                        <td>{{$pengaduan->alamat}}</td>
                                        <td>{{ $pengaduan->jenis }}</td>
                                        <td>{{ $pengaduan->keterangan }}</td>
                                        <td><a href="{{ asset('storage/surat/' . $pengaduan->surat) }}" target="_blank">Lihat Surat</a></td>
                                        <td>
                                            <!-- Modal trigger button -->
                                            <button class="btn {{ getStatusButtonClass($pengaduan->status_validasi) }}" type="button" id="statusDropdown{{ $pengaduan->id }}" data-toggle="modal" data-target="#statusValidationModal{{ $pengaduan->id }}">
                                                {{ $statusLabels[$pengaduan->status_validasi] }}
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="statusValidationModal{{ $pengaduan->id }}" tabindex="-1" role="dialog" aria-labelledby="statusValidationModalLabel{{ $pengaduan->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="statusValidationModalLabel{{ $pengaduan->id }}">Update Status Validasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Status saat ini: {{ $statusLabels[$pengaduan->status_validasi] }}</p>
                                                            <form method="post" action="{{ route('update-status-pengaduan', ['id' => $pengaduan->id]) }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="newStatus">Perbarui Status:</label>
                                                                    <select class="form-control" id="newStatus{{ $pengaduan->id }}" name="status">
                                                                        <option value="0" {{ $pengaduan->status_validasi == 0 ? 'selected' : '' }}>Belum</option>
                                                                        <option value="1" {{ $pengaduan->status_validasi == 1 ? 'selected' : '' }}>Diterima</option>
                                                                        <option value="2" {{ $pengaduan->status_validasi == 2 ? 'selected' : '' }}>Ditolak</option>
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
                                            <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapusModal{{$pengaduan->id}}">
                                                Hapus
                                            </button>

                                            <div class="modal fade" id="hapusModal{{ $pengaduan->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$pengaduan->id}}" aria-hidden="false">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusModalLabel{{$pengaduan->id}}">Konfirmasi Hapus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data ke <b>{{ $loop->iteration }}</b>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <form method="post" action="{{ route('hapus-pengaduan', ['id' => $pengaduan->id]) }}">
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
        // Filter table rows based on status
        $('.filter-btn').on('click', function () {
            var status = $(this).data('filter');
            if (status === 'All') {
                $('tbody tr').show();
            } else {
                $('tbody tr').each(function () {
                    if ($(this).data('status') === status) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });

        // Show all rows on initial load
        $('tbody tr').show();
    });
</script>

<script>
    function confirmDelete(id) {
        if (confirm("Apakah anda yakin ingin menghapus berita ini?")) {
            // Submit the form when user confirms
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>
@endsection
