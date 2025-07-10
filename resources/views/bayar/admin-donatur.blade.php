@extends('panel')
@section('title', 'Admin Donatur')
@section('content')

<style>
    .center {
        text-align: center;
        align-content: center;
    }
</style>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<br>

<div class="details">
    <div class="recentOrders">
        <div class="container-fluid mt-4 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1>Data Donatur</h1>
                </div>
                <div class="card-body">
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Donasi</th>
                                    <th>Nama</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Nominal</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status Validasi</th>
                                    <th colspan="3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $statusLabels = [
                                        0 => 'Belum',
                                        1 => 'Diterima',
                                        2 => 'Ditolak',
                                    ];

                                    function getStatusButtonClass($status) {
                                        $classes = [
                                            0 => 'btn-secondary',
                                            1 => 'btn-success',
                                            2 => 'btn-danger',
                                        ];

                                        return $classes[$status] ?? 'btn-secondary';
                                    }

                                    $counter = 1;
                                @endphp
                                @foreach($allDonations as $donation)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $donation->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</td>
                                        <td>{{ $donation->nama }}</td>
                                        <td>{{ $donation->no_hp }}</td>
                                        <td>{{ $donation->email }}</td>
                                        <td>Rp.{{ number_format($donation->nominal, 0, ',', '.') }}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buktiPembayaranModal{{ $donation->id }}">
                                                Lihat
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="buktiPembayaranModal{{ $donation->id }}" tabindex="-1" role="dialog" aria-labelledby="buktiPembayaranModalLabel{{ $donation->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="buktiPembayaranModalLabel{{ $donation->id }}">Bukti Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('storage/images/'.$donation->bukti_pembayaran) }}" alt="buktipembayaran" style="max-width: 100%; max-height: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn {{ getStatusButtonClass($donation->status_validasi) }}" data-toggle="modal" data-target="#statusValidationModal{{ $donation->id }}">
                                                {{ $statusLabels[$donation->status_validasi] }}
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="statusValidationModal{{ $donation->id }}" tabindex="-1" role="dialog" aria-labelledby="statusValidationModalLabel{{ $donation->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="statusValidationModalLabel{{ $donation->id }}">Update Status Validasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p> Status saat ini: {{ $statusLabels[$donation->status_validasi] }}</p>

                                                            <form method="post" action="{{ route('update-status', ['id' => $donation->id]) }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="newStatus">Perbarui Status:</label>
                                                                    <select class="form-control" id="newStatus" name="status">
                                                                        <option value="0">Belum</option>
                                                                        <option value="1">Diterima</option>
                                                                        <option value="2">Ditolak</option>
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
                                            <a href="{{ route('edit-donatur', ['id' => $donation->id]) }}" class="btn btn-warning">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapusDonaturModal{{ $donation->id }}">
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Konfirmasi Hapus -->
                                    <div class="modal fade" id="hapusDonaturModal{{ $donation->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusDonaturModalLabel{{ $donation->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusDonaturModalLabel{{ $donation->id }}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menghapus donatur <b>{{ $donation->nama }}</b>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <form method="post" action="{{ route('hapus-donatur', ['id' => $donation->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Akhir Modal Konfirmasi Hapus -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Use Bootstrap's event listeners
        $('.status-validation-select').on('click', function (e) {
            e.preventDefault();
            var status = $(this).data('status');
            var donationId = $(this).data('donation-id');
            var dropdownButton = $('#statusValidationDropdown' + donationId);

            // Update the button text and style
            dropdownButton.text(status);
            dropdownButton.removeClass().addClass('btn btn-secondary dropdown-toggle');

            // Manually close the dropdown after updating the selection
            dropdownButton.dropdown('hide');

            // Here you can perform an AJAX request to update the status in the database
            // and handle the response accordingly
        });
    });
</script>

@endsection
