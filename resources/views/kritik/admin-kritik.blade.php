@extends('panel')
@section('title','Admin Kritik & Saran')
@section('content')

<div class="details">
    <div class="recentOrders">
        <div class="container-fluid" style="margin-top: 4em; margin-bottom: 4em;">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1>Kritik & Saran</h1>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('success') }}

                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover center">
                            <tr>
                                <th>No</th>
                                <th>Kritik</th>
                                <th>Saran</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach($kritik as $kritik)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kritik->kritik }}</td>
                                <td>{{ $kritik->saran }}</td>
                                <td>{{ $kritik->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapusModal{{$kritik->id}}">
                                        Hapus
                                    </button>

                                    <div class="modal fade" id="hapusModal{{ $kritik->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$kritik->id}}" aria-hidden="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="hapusModalLabel{{$kritik->id}}">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data ke <b>{{ $loop->iteration }}</b>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    <form method="post" action="{{ route('hapus-kritik-saran', ['id' => $kritik->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <div>
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
