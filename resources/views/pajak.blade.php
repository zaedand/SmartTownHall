@extends('user')
@section('content')
<div class="secondbody">
    <div class="container" style="margin-top:2em;">
        <h1 class="judul" style="font-family: comic sans ms; margin-left:13em;">Pajak</h1>
        <form action="{{ route('pajak-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-left:22em;">
                <label for="nama" style="font-weight:bold;">Nama</label>
                @if ($errors->has('nama'))
                <small class="text-danger">{{ $errors->first('nama') }}</small>
                @endif
                <input type="text" id="nama" class="form-control" style="width:30em;" name="nama" value="{{ old('nama') }}">

                <label for="telp" style="font-weight:bold;">No telepon</label>
                @if ($errors->has('telp'))
                <small class="text-danger">{{ $errors->first('telp') }}</small>
                 @endif
                <input type="text" id="telp" class="form-control" style="width:30em;" name="telp" value="{{ old('telp') }}" oninput="updateTeleponCount()">
                <small id="teleponCount" style="color: grey; font-size: 0.9em;">Jumlah digit(0/12)</small>
                <br>

                <label for="email" style="font-weight:bold;">Email</label>
                @if ($errors->has('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
                 @endif
                <input type="text" id="email" class="form-control" style="width:30em;" name="email" value="{{ old('email') }}">

                <label for="jenisPajak" style="font-weight:bold;">Jenis Pajak</label>
                @if ($errors->has('jenis'))
                <small class="text-danger">{{ $errors->first('jenis') }}</small>
                @endif
                <select id="jenisPajak" class="form-select" style="width:30em;" name="jenis">
                    <option value="kendaraan" {{ old('jenis') == 'kendaraan' ? 'selected' : '' }}>Kendaraan</option>
                    <option value="bumi" {{ old('jenis') == 'bumi' ? 'selected' : '' }}>Bumi & Bangunan</option>
                    <option value="air" {{ old('jenis') == 'air' ? 'selected' : '' }}>Air</option>
                </select>

                <label for="nominal" style="font-weight:bold;">Nominal</label>
                @if ($errors->has('nominal'))
                <small class="text-danger">{{ $errors->first('nominal') }}</small>
                @endif
                <input type="text" id="nominal" class="form-control" style="width:30em;" name="nominal" value="{{ old('nominal') }}" oninput="formatNumber(this)">

                <label for="ktp" style="font-weight:bold;">KTP<span style="color:grey; font-size:0.9em;"> (.jpeg, .png, .jpg)</span></label>
                @if ($errors->has('ktp'))
                <small class="text-danger">{{ $errors->first('ktp') }}</small>
                @endif
                <input type="file" id="ktp" class="form-control" style="width:30em;" name="ktp">

                <br>
                <button class="btn btn-success" style="font-family:comic sans ms">Konfirmasi</button>
            </div>
        </form>
    </div>
</div>

@php
$id = session('id');
@endphp

@section('scripts')
<script>
    function formatNumber(input) {
        // Remove all non-digit characters
        let num = input.value.replace(/\D/g, '');
        // Add thousand separators
        input.value = num.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
</script>
@endsection('scripts')

@if ($id)
<script>
    function showCustomNotification(message) {
        var notification = document.createElement('div');
        notification.className = 'custom-notification';
        notification.innerHTML = '<img src="{{ asset('img/success.png') }}" alt="icon" style="width:20px; height:20px; margin-right:10px;">' + message;

        var h1Element = document.querySelector('.judul');
        h1Element.parentNode.insertBefore(notification, h1Element);

        setTimeout(function() {
            notification.style.display = 'none';
        }, 10000);
    }

    showCustomNotification('Terimakasih telah membayar pajak!');
</script>
@endif

<style>
    .custom-notification {
        background-color: #f0f0f0;
        color: #333;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }
</style>

<script>
    function updateTeleponCount(){
        const maxTelp = 12;
        const minTelp = 9;
        const inputTelp = document.getElementById('telp');
        const teleponCount = document.getElementById('teleponCount');
        const currentLengthTelp = inputTelp.value.length;

        if(currentLengthTelp > maxTelp){
            teleponCount.innerHTML = `Harap inputkan nomor tidak lebih dari ${maxTelp} digit(${currentLengthTelp}/${maxTelp})`;
            teleponCount.style.color = 'red';
        } else if(currentLengthTelp < minTelp){
            teleponCount.innerHTML = `Harap inputkan nomor tidak kurang dari ${minTelp} digit(${currentLengthTelp}/${minTelp})`;
            teleponCount.style.color = 'red';
        } else {
            teleponCount.innerHTML = `Jumlah digit(${currentLengthTelp}/${maxTelp})`;
            teleponCount.style.color = 'grey';
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateTeleponCount();
    });
</script>
@endsection('content')
