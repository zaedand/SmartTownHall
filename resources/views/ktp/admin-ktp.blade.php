@extends('panel')
@section('title', 'KTP')
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
                    <h1>Data E-KTP</h1>
                </div>
                <div class="card-body">
                    <!-- Success and Error Messages -->
                    @if(session('success'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('success') }}

                    </div>
                    @endif

                @if(session('updated'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updated') }}

                </div>
                @endif
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>No Antrian</th>
                                <th>Tanggal</th>
                                <th>No NIK</th>
                                <th>No KK</th>
                                <th>Foto KK</th>
                                <th>Status Validasi</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach($ktp as $KTP)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{$KTP->id}}</td>
                                    <td>{{ $KTP->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $KTP->No_NIK }}</td>
                                    <td>{{ $KTP->No_KK }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buktiPembayaranModal{{ $KTP->id }}">
                                            Lihat
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="buktiPembayaranModal{{ $KTP->id }}" tabindex="-1" role="dialog" aria-labelledby="buktiPembayaranModalLabel{{ $KTP->id }}" aria-hidden="false">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="buktiPembayaranModalLabel{{ $KTP->id }}">Foto KTP</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src= "{{ asset('storage/images/' . $KTP->Foto_KK) }}" alt="notfound" style="max-width: 100%; max-height: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <button type="button" class="btn {{ getStatusButtonClass($KTP->status_validasi) }}" data-toggle="modal" data-target="#statusValidationModal{{ $KTP->id }}">
                                            {{ $statusLabels[$KTP->status_validasi] }}
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="statusValidationModal{{ $KTP->id }}" tabindex="-1" role="dialog" aria-labelledby="statusValidationModalLabel{{ $KTP->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="statusValidationModalLabel{{ $KTP->id }}">Update Status Validasi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Status saat ini: {{ $statusLabels[$KTP->status_validasi] }}</p>

                                                        <form method="post" action="{{ route('update-status-ktp', ['id' => $KTP->id]) }}">
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
                                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapusModal{{$KTP->id}}">
                                            Hapus
                                        </button>

                                        <div class="modal fade" id="hapusModal{{$KTP->id}}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$KTP->id}}" aria-hidden="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="hapusModalLabel{{$KTP->id}}">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data ke <b>{{ $loop->iteration }}</b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <form method="post" action="{{ route('hapus-ktp', ['id' => $KTP->id]) }}">
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Use Bootstrap's event listeners
        $('.status-validation-select').on('click', function (e) {
            e.preventDefault();
            var status = $(this).data('status');
            var KTPId = $(this).data('KTP-id');
            var dropdownButton = $('#statusValidationDropdown' + KTPId);

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
