@extends('user')
@section('content')
<div class="secondbody">
    <div class="container" style="margin-top:2em;">
        <h1 class="judul" style="font-family: comic sans ms; margin-left:11em;">Kritik dan Saran</h1>

        <form action="{{route('tambahkan-kritik')}}" method="POST">
            @csrf
            <div style="margin-left:22em;">
            <label for="kritik" style="font-weight:bold;">Kritik</label>
            @if ($errors->has('kritik'))
                <small class="text-danger">{{ $errors->first('kritik') }}</small>
            @endif
            <textarea id="kritik" class="form-control" style="height:10em; width:30em;" name="kritik" value="{{old('kritik')}}" oninput="updateKritikCount()"></textarea>
            <small id="charCountKritik" style="color: grey; font-size: 0.9em;">Jumlah Karakter(0/255)</small>

            <div>
            <label for="saran" style="font-weight:bold;">Saran</label>
            @if ($errors->has('saran'))
            <small class="text-danger">{{ $errors->first('saran') }}</small>
            @endif
            <textarea id="saran" class="form-control" style="height:10em; width:30em;" name="saran" value="{{old('saran')}}" oninput="updateSaranCount()"></textarea>
            <small id="charCountSaran" style="color: grey; font-size: 0.9em;">Jumlah Karakter(0/255)</small>
            <br>
            <button class="btn btn-success" style="font-family:comic sans ms; margin-bottom:2em;">Konfirmasi</button>
        </form>
    </div>
    </div>
</div>
</div>

<script>
function updateKritikCount() {
            const maxCharsKritik = 255;
            const textAreaKritik = document.getElementById('kritik');
            const charCountKritik = document.getElementById('charCountKritik');
            const currentLengthKritik = textAreaKritik.value.length;

            if (currentLengthKritik > maxCharsKritik) {
                charCountKritik.innerHTML = `Harap masukkan ${maxCharsKritik} karakter atau kurang(${currentLengthKritik}/${maxCharsKritik})`;
                charCountKritik.style.color = 'red';
            } else {
                charCountKritik.innerHTML = `Jumlah Karakter(${currentLengthKritik}/${maxCharsKritik})`;
                charCountKritik.style.color = 'grey';
            }

        }


        function updateSaranCount() {
            const maxCharsSaran = 255;
            const textAreaSaran = document.getElementById('saran');
            const charCountSaran = document.getElementById('charCountSaran');
            const currentLengthSaran = textAreaSaran.value.length;

            if (currentLengthSaran > maxCharsSaran) {
                charCountSaran.innerHTML = `Harap masukkan ${maxCharsSaran} karakter atau kurang(${currentLengthSaran}/${maxCharsSaran})`;
                charCountSaran.style.color = 'red';
            } else {
                charCountSaran.innerHTML = `Jumlah Karakter(${currentLengthSaran}/${maxCharsSaran})`;
                charCountSaran.style.color = 'grey';
            }

        }

        document.addEventListener("DOMContentLoaded", function() {
            updateKritikCount();
            updateSaranCount();

        });

</script>

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

    showCustomNotification('Terima kasih atas Kritik dan Saran anda');
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
@endif
@endsection
