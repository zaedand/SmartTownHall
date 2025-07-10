@extends('panel')
@section('content')
<br>
<br>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1>Form Tambah Laporan</h1>
        </div>
        <div class="table-responsive">
            <form method="" action="">
                <div class="container">
                <div class>
                    <label for="nama">Nama Amil:</label>
                    <input type="text" id="nama" class="form-control">
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control">
                </div>

                <div>
                    <label for="tanggal">Tanggal Penerimaan</label>
                    <input type="date" id="tanggal" class="form-control">
                </div>

                <div>
                    <label for="masjid">Masjid</label>
                    <input type="texr" id="masjid" class="form-control">
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
