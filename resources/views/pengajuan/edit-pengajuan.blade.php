@extends('panel')
@section('title','edit-partner')
@section('content')
<br>
<br>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1>Form Edit Partner</h1>
        </div>
        <div class="table-responsive">
            <form method="POST" action="{{ route('update-partner', ['id' => $partner->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div>
                        <label for="mesjid">Masjid</label>
                        <input type="text" id="mesjid" class="form-control" name="mesjid" value="{{ $partner->mesjid }}">
                    </div>

                    <div>
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" class="form-control" name="alamat" value="{{ $partner->alamat }}">
                    </div>

                    <div>

                        <img src="{{ asset('storage/images/'.$partner->gambar) }}" name = "current_image" alt="Current Image" style="max-width: 200px;">
                    </div>

                    <div>
                        <label for="gambar">Ganti Gambar</label>
                        <input type="file" id="gambar" class="form-control" name="gambar">
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
