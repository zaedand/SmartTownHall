@extends('user')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<div class="secondbody">
    <div class="container" style="margin-top:4em;">
        <h1 class="judul" style="font-family: 'comic sans ms'; margin-left:13em;">E-KTP</h1>

        <form method="POST" action="{{ route('ktp-submit') }}" enctype="multipart/form-data">
            @csrf
            <div style="margin-left:22em;">
                <label for="NIK" style="font-weight:bold;">NIK</label>
                @if ($errors->has('No_NIK'))
                <small class="text-danger">{{ $errors->first('No_NIK') }}</small>
                @endif
                <input type="text" id="NIK" class="form-control" style="width:30em;" name="No_NIK" oninput="updateNIKCount()" value="{{ old('No_NIK') }}">
                <small id="NIKCount" style="color: grey; font-size: 0.9em;">Jumlah digit(0/16)</small>
                <br>

                <label for="KK" style="font-weight:bold;">No. KK</label>
                @if ($errors->has('No_KK'))
                <small class="text-danger">{{ $errors->first('No_KK') }}</small>
                @endif
                <input type="text" id="KK" class="form-control" style="width:30em;" name="No_KK" oninput="updateKKCount()" value="{{ old('No_KK') }}">
                <small id="KKCount" style="color: grey; font-size: 0.9em;">Jumlah digit(0/16)</small>
                <br>

                <label for="Foto KK" style="font-weight:bold;">Foto KK <span style="color:grey; font-size:0.9em;">(.jpeg, .jpg, .png)</span></label>
                @if ($errors->has('Foto_KK'))
                <small class="text-danger">{{ $errors->first('Foto_KK') }}</small>
                @endif
                <input type="file" id="Foto" class="form-control" style="width:30em;" name="Foto_KK">

                <br>
                <button class="btn btn-success" style="font-family:comic sans ms">Konfirmasi</button>
            </div>
        </form>
    </div>
</div>

@php
    $ktp_id = session('ktp_id');
@endphp

@if($ktp_id)
<script>
    function showCustomNotification(message) {
        var notification = document.createElement('div');
        notification.className = 'custom-notification';
        notification.innerHTML = '<img src="{{asset('img/success.png')}}" alt="icon" style="width:20px; height:20px; margin-right:10px;">' + message;

        var h1Element = document.querySelector('.judul');
        h1Element.parentNode.insertBefore(notification, h1Element);

        setTimeout(function() {
            notification.style.display = 'none';
        }, 10000);
    }

    showCustomNotification("Data anda telah kami terima, silahkan menuju dukcapil terdekat dengan no antrian {{$ktp_id}}!");
</script>
@endif

<script>
    function updateNIKCount() {
        const digits = 16;
        const inputArea = document.getElementById('NIK');
        const NIKCount = document.getElementById('NIKCount');
        const currentLengthNIK = inputArea.value.length;

        if (currentLengthNIK != digits) {
            NIKCount.innerHTML = `Harap inputkan NIK sebanyak ${digits} digit(${currentLengthNIK}/${digits})`;
            NIKCount.style.color = 'red';
        } else {
            NIKCount.innerHTML = `Jumlah digit(${currentLengthNIK}/${digits})`;
            NIKCount.style.color = 'grey';
        }
    }

    function updateKKCount() {
        const digits = 16;
        const inputArea = document.getElementById('KK');
        const KKCount = document.getElementById('KKCount');
        const currentLengthKK = inputArea.value.length;

        if (currentLengthKK != digits) {
            KKCount.innerHTML = `Harap inputkan KK sebanyak ${digits} digit(${currentLengthKK}/${digits})`;
            KKCount.style.color = 'red';
        } else {
            KKCount.innerHTML = `Jumlah digit(${currentLengthKK}/${digits})`;
            KKCount.style.color = 'grey';
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateNIKCount();
        updateKKCount();
    });
</script>
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

@endsection
