@extends('panel')
@section('title', 'tambah-berita')
@section('content')
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h1>Tambah Berita</h1>
            </div>
            <div class="table-responsive">
                <form method="POST" action="{{ route('tambahkan-berita') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="container">
                        <div>
                            <label for="judul">Judul</label>
                            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul') }}">
                            @if ($errors->has('judul'))
                                <span class="text-danger">{{ $errors->first('judul') }}</span>
                            @endif
                        </div>

                        <div>
                            <label for="paragraph">Paragraph</label>
                            <textarea id="paragraph" name="paragraph" class="form-control">{{ old('paragraph') }}</textarea>
                            @if ($errors->has('paragraph'))
                                <span class="text-danger">{{ $errors->first('paragraph') }}</span>
                            @endif
                        </div>

                        <div>
                            <label for="gambar">Gambar</label>
                            <input type="file" id="gambar" name="gambar" class="form-control">
                            @if ($errors->has('gambar'))
                                <span class="text-danger">{{ $errors->first('gambar') }}</span>
                            @endif
                        </div>

                        <div>
                            <label for="jenis">Jenis</label>
                            <input type="text" id="jenis" name="jenis" class="form-control" value="{{ old('jenis') }}">
                            @if ($errors->has('jenis'))
                                <span class="text-danger">{{ $errors->first('jenis') }}</span>
                            @endif
                        </div>

                        <div>
                            <label for="waktu">Waktu</label>
                            <input type="date" id="waktu" name="waktu" class="form-control" value="{{ old('waktu') }}">
                            @if ($errors->has('waktu'))
                                <span class="text-danger">{{ $errors->first('waktu') }}</span>
                            @endif
                        </div>

                        <br>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
@endsection

