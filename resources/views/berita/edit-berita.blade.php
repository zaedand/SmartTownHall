@extends('panel')
@section('title', 'edit-berita')
@section('content')
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h1>Form Edit Berita</h1>
            </div>
            <div class="table-responsive">
                <form method="POST" action="{{ route('update-berita', ['id' => $berita->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put') {{-- Tambahkan method 'put' untuk update --}}
                    <div class="container">
                        <div>
                            <label for="judul">Judul</label>
                            <input type="text" id="judul" class="form-control" name="judul" value="{{ $berita->judul }}">
                        </div>

                        <div>
                            <label for="paragraph">Paragraph</label>
                            <textarea id="paragraph" class="form-control" name="paragraph">{{ $berita->paragraph }}</textarea>
                        </div>

                        <div>
                            <label for="gambar">Ganti Gambar</label>
                            <input type="file" id="gambar" class="form-control" name="gambar">
                        </div>

                        <div>
                            <label for="jenis">Jenis Donasi</label>
                            <input type="text" id="jenis" class="form-control" name="jenis" value="{{ $berita->jenis }}">
                        </div>

                        <div>
                            <label for="waktu">Waktu</label>
                            <input type="date" id="waktu" class="form-control" name="waktu" value="{{ $berita->waktu }}">
                        </div>

                        <br>
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>

@endsection
