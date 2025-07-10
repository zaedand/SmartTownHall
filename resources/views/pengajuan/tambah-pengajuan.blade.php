@extends('panel')
@section('title','tambah-partner')
@section('content')
<br>
<br>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1>Tambah Partner</h1>
        </div>
        <div class="table-responsive">
            <form method="POST" action="{{ route('tambahkan-partner') }}" enctype="multipart/form-data">
                @csrf <!-- Add this line to include CSRF token -->

                <div class="container">
                    <div>
                        <label for="mesjid">Masjid</label>
                        <input type="text" id="mesjid" name="mesjid" class="form-control">
                    </div>

                    <div>
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control">
                    </div>

                    <div>
                        <label for="gambar">Gambar</label>
                        <input type="file" id="gambar" name="gambar" class="form-control">
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
