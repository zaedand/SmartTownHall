@extends('user')
@section('content')
<body class="secondbody">

    <div class="container" style="margin-top:2em;">
        <h1 class="judul" style="font-family: comic sans ms; margin-left:9em;">Pengajuan Surat</h1>
        <div style="margin-left:20.6em; margin-top:2em;">

        <form action="{{ route('download-tanah') }}" method="POST">
            @csrf
            <button class="btn btn-success"><i><img src="{{asset('image/download.png')}}" alt="not found"></i>Template Surat</button>
        </form>
        <br>
        <form id="suratForm" method="POST" action="{{route('tambah-pengajuan')}}" enctype="multipart/form-data">
            @csrf <!-- Add this if you are using CSRF protection -->

            <label for="nama" style="font-weight:bold;">Nama</label>
            @if ($errors->has('nama'))
                <small class="text-danger">{{ $errors->first('nama') }}</small>
            @endif
            <input type="text" style="width:30em;" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">

            <label for="telp" style="font-weight:bold;">No. Telepon</label>
            @if ($errors->has('no_telepon'))
                <small class="text-danger">{{ $errors->first('no_telepon') }}</small>
            @endif
            <input type="text" style="width:30em;" class="form-control" id="telp" name="no_telepon" value="{{ old('no_telepon') }}" oninput="updateTeleponCount()">
            <small id="teleponCount" style="color: grey; font-size: 0.9em;">Jumlah digit(0/12)</small>
            <br>

            <label for="jenisSurat" style="font-weight:bold;">Jenis Surat</label>
            @if ($errors->has('jenis'))
                <small class="text-danger">{{ $errors->first('jenis') }}</small>
            @endif
            <select id="jenisSurat" class="form-select" style="width:30em;" name="jenis">
                <option value="surat tanah" {{ old('jenis') == 'surat tanah' ? 'selected' : '' }}>Surat Keterangan Tanah</option>
                <option value="surat domisili" {{ old('jenis') == 'surat domisili' ? 'selected' : '' }}>Surat Keterangan Domisili</option>
                <option value="surat skck" {{ old('jenis') == 'surat skck' ? 'selected' : '' }}>Surat Pengantar SKCK</option>
            </select>

            <label for="KTP" style="font-weight:bold;">KTP<span style="color:grey; font-size:0.9em;"> (.jpeg, .png, .jpg)</span></label>
            @if ($errors->has('ktp'))
                <small class="text-danger">{{ $errors->first('ktp') }}</small>
            @endif
            <input type="file" style="width:30em;" class="form-control" id="KTP" name="ktp">

            <label for="berkas" style="font-weight:bold;">Unggah Surat <span style="color:grey; font-size:0.9em;"> (.pdf, .docx, .doc)</span></label>
            @if ($errors->has('surat'))
                <small class="text-danger">{{ $errors->first('surat') }}</small>
            @endif
            <input type="file" style="width:30em;" class="form-control" id="berkas"  name="surat" value = "{{ old ('surat') }}">

            <br>
            <button class="btn btn-success" style="font-family:comic sans ms">Konfirmasi</button>
        </form>
    </div>
</div>

@php
$id = session('id');
@endphp


@if ($id)
<script>
    function showCustomNotification(message) {
        var notification = document.createElement('div');
        notification.className = 'custom-notification';
        notification.innerHTML = '<img src="{{asset('img/success.png')}}" alt="icon" style="width:20px; height:20px; margin-right:10px;">' + message;

        // Get the reference to the <h1> element
        var h1Element = document.querySelector('.judul');

        // Insert the notification before the <h1> element
        h1Element.parentNode.insertBefore(notification, h1Element);

        setTimeout(function() {
            // Remove the notification after 5 seconds
            notification.style.display = 'none';
        }, 10000);
    }

    showCustomNotification('Pengajuan surat anda telah kami terima, Silahkan menunggu info validasi!');
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
@endsection
