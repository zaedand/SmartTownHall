@extends('layout.master')
@section('content')
<br>
<br>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1>Form Edit Laporan</h1>
        </div>
        <div class="table-responsive">
            <form method="" action="">
                <div class="container">
                <div class>
                    <label for="nama">Nama Amil:</label>
                    <input type="text" id="nama" class="form-control" value="Suryadi">
                </div>

                <div>
                    <label for="telepon">Email:</label>
                    <input type="text" id="email" class="form-control" value="suryadikocak@gmail.com">
                </div>

                <div>
                    <label for="email">Tanggal Penerimaan:</label>
                    <input type="date" id="tanggal" class="form-control" value="2023-12-05">
                </div>

                <div>
                    <label for="nominal">Masjid:</label>
                    <input type="text" id="Masjid" class="form-control" value="Al-Hikmah">
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
