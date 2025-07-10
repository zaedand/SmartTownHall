@extends('panel')
@section('content')

<div class="container-fluid" style="margin-top:4em;">
    <div class="card">
        <div class="card-header">
            <h1>Form Edit Donatur</h1>
        </div>
        <div class="table-responsive">
            <form  action="{{ route('update-donatur', ['id' => $donation->id]) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="container">
                    @isset($donation)
                        <div>
                            <label for="Nama">Nama:</label>
                            <input type="text" id="Nama" class="form-control" name="nama" required value="{{ $donation->nama }}">
                        </div>

                        <div>
                            <label for="telepon">No Telpon:</label>
                            <input type="text" id="Telepon" class="form-control" name="no_hp"  required value="{{ $donation->no_hp }}">
                        </div>

                        <div>
                            <label for="email">Email:</label>
                            <input type="text" id="Email" class="form-control" name="email" required value="{{ $donation->email }}">
                        </div>

                        <div>
                            <label for="nominal">Nominal:</label>
                            <input type="text" id="Nominal" class="form-control" name="nominal" oninput="formatNumber(this)" required value="{{ $donation->nominal }}">
                        </div>

                    @endisset
                    <br>
                    <button class="btn btn-success" type="submit" value="submit">Simpan</button>
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
