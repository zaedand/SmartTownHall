@extends('panel')
@section('content')
<br>
<br>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1>Form Tambah Muzakki </h1>
        </div>
        <div class="table-responsive">
            <form method="" action="">
                <div class="container">
                <div class>
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" class="form-control">
                </div>

                <div>
                    <label for="telepon">No Telpon:</label>
                    <input type="text" id="telepon" class="form-control">
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="text" id="email" class="form-control">
                </div>

                <div>
                    <label for="nominal">Nominal:</label>
                    <input type="text" id="nominal" class="form-control" oninput="formatNumber(this)" required>
                </div>
                    <br>
                    <button class="btn btn-success">Simpan</button>

            </div>
            </form>
            <br>
        </div>
    </div>
</div>

<script>
    function formatNumber(input) {
            // Menghapus semua karakter selain digit dari nilai input
            let num = input.value.replace(/\D/g, '');
            // Menambahkan tanda titik setiap 3 digit
            input.value = num.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
</script>
@endsection
