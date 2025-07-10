@extends('panel')
@section('title','Admin Berita')
@section('content')

<style>
    .center {
        text-align: center;
        align-content: center;
    }
</style>

<div class="details">
    <div class="recentOrders">
        <div class="container-fluid" style="margin-top: 4em; margin-bottom: 4em;">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1>Berita</h1>
                </div>
                <div class="card-body">
                    <!-- Success notification -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif




                    <!-- Error notification -->
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <a href="{{ route('tambah-berita') }}">
                        <button type="button" class="btn btn-info">Tambah Berita</button>
                    </a>
                    <br><br>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Paragraph</th>
                                    <th>Gambar</th>
                                    <th>Jenis</th>
                                    <th>Waktu</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Beritas as $berita)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $berita->judul }}</td>
                                    <td>{{ $berita->paragraph }}</td>
                                    <td>
                                        <img src="{{ asset('storage/images/'.$berita->gambar) }}" alt="gambar" style="max-width: 100%; max-height: 100%;">
                                    </td>
                                    <td>{{ $berita->jenis }}</td>
                                    <td>{{ $berita->waktu }}</td>
                                    <td>
                                        <a href="{{ route('edit-berita', ['id' => $berita->id]) }}">
                                            <button type="button" class="btn btn-success">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#hapusModal{{$berita->id}}">
                                            Hapus
                                        </button>

                                        <div class="modal fade" id="hapusModal{{ $berita->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{$berita->id}}" aria-hidden="false">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="hapusModalLabel{{$berita->id}}">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data ke <b>{{ $loop->iteration }}</b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        <form method="post" action="{{ route('hapus-berita', ['id' => $berita->id]) }}">
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

<!-- JavaScript function to handle confirmation dialog -->
<script>
    function confirmDelete(id) {
        if (confirm("Apakah anda yakin ingin menghapus berita ini?")) {
            // Submit the form when user confirms
            document.getElementById('deleteForm' + id).submit();
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
