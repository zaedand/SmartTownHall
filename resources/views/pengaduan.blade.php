@extends('user')
@section('content')

<body class="secondbody">
    <div class="container" style="margin-top:2em;">
        <a class="col-md-6 col-sm-12" href="{{ route('notif-pengaduan') }}" id="notificationDropdown" role="button" aria-haspopup="true" aria-expanded="false">
            @php
                $notifImage = session('hasNotification') ? 'notifbell.png' : 'bell.png';
            @endphp
            <img src="{{ asset('image/' . $notifImage) }}" alt="Notifikasi" style="width: 30px; height: 30px;">
        </a>
        <br>
        <h1 class="judul text-center" style="font-family: comic sans ms;">Pengaduan</h1>

        <form action="{{ route('pengaduan-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="nama" style="font-weight: bold;">Nama (sesuai KTP)</label>
                        @if ($errors->has('nama'))
                        <small class="text-danger">{{ $errors->first('nama') }}</small>
                        @endif
                        <input type="text" id="nama" class="form-control" name="nama" value="{{ old('nama') }}">
                    </div>

                    <div class="form-group">
                        <label for="no_telepon" style="font-weight: bold;">Nomor Telepon</label>
                        @if ($errors->has('no_telepon'))
                        <small class="text-danger">{{ $errors->first('no_telepon') }}</small>
                        @endif
                        <input type="text" id="no_telepon" class="form-control" name="no_telepon" value="{{ old('no_telepon') }}" oninput="updateTeleponCount()">
                        <small id="teleponCount" style="color: grey; font-size: 0.9em;">Jumlah digit(0/12)</small>
                    </div>

                    <div class="form-group">
                        <label for="alamat" style="font-weight: bold;">Alamat (sesuai KTP)</label>
                        @if ($errors->has('alamat'))
                        <small class="text-danger">{{ $errors->first('alamat') }}</small>
                        @endif
                        <input type="text" id="alamat" class="form-control" name="alamat" value="{{ old('alamat') }}">
                    </div>

                    <label for="jenis" style="font-weight:bold;">Kategori Pengaduan</label>
                    @if ($errors->has('jenis'))
                    <small class="text-danger">{{ $errors->first('jenis') }}</small>
                    @endif
                    <select id="jenis" class="form-select" style="width:30em;" name="jenis" default="ktp">
                        <option value="KTP" {{ old('jenis') == 'ktp' ? 'selected' : '' }}>KTP</option>
                        <option value="KK" {{ old('jenis') == 'kk' ? 'selected' : '' }}>KK</option>
                    </select>

                    <div class="form-group">
                        <label for="keterangan" style="font-weight: bold;">Keterangan</label>
                        @if ($errors->has('keterangan'))
                        <small class="text-danger">{{ $errors->first('keterangan') }}</small>
                        @endif
                        <textarea id="keterangan" cols="20" rows="10" class="form-control" name="keterangan" oninput="updateCharacterCount()">{{ old('keterangan') }}</textarea>
                        <small id="charCount" style="color: grey; font-size: 0.9em;">Jumlah Karakter(0/255)</small>
                    </div>

                    <div class="form-group">
                        <label for="pengaduan" style="font-weight: bold;">Surat Pengaduan <span style="color:grey; font-size:0.9em;">(.doc, .docx, .pdf)</span></label>
                        @if ($errors->has('surat'))
                        <small class="text-danger">{{ $errors->first('surat') }}</small>
                        @endif
                        <input type="file" class="form-control" id="pengaduan" name="surat">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success" style="font-family: comic sans ms; margin-bottom: 2em;">Konfirmasi</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function updateCharacterCount() {
            const maxChars = 255;
            const textArea = document.getElementById('keterangan');
            const charCount = document.getElementById('charCount');
            const currentLength = textArea.value.length;

            if (currentLength > maxChars) {
                charCount.innerHTML = `Harap masukkan ${maxChars} karakter atau kurang(${currentLength}/${maxChars})`;
                charCount.style.color = 'red';
            } else {
                charCount.innerHTML = `Jumlah karakter(${currentLength}/${maxChars})`;
                charCount.style.color = 'grey';
            }
        }

        function updateTeleponCount(){
            const maxTelp = 12;
            const minTelp = 9;
            const inputTelp = document.getElementById('no_telepon');
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

        // Initialize character count on page load
        document.addEventListener("DOMContentLoaded", function() {
            updateCharacterCount();
            updateTeleponCount();
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

        showCustomNotification('Pengaduan anda telah kami terima, Silahkan menunggu info validasi!');
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
</body>
@endsection
