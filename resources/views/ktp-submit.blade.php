<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/gaya.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Dancing+Script&family=Fjalla+One&family=Fredoka:wght@300..700&family=Kavoon&family=Lemon&family=Press+Start+2P&family=Righteous&family=Russo+One&display=swap" rel="stylesheet">
    <title>KTP</title>
</head>

<body class="secondbody">
    <nav class="navbar navbar-expand-lg bg-custom">

        <style>
            .bg-custom {
                background-color: #3EC2EC !important;
            }


        </style>
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}" style="color:white"><img src="{{asset('image/image/th_remove.png')}}" style="height:25px;" alt=""></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('pengaduan')}}"  style="color:white">Pengaduan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('ktp')}}"  style="color:white">E-KTP</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('kritik')}}"  style="color:white">Kritik & Saran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('pengajuan')}}"  style="color:white">Pengajuan Surat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('pajak')}}"  style="color:white">Pajak</a>
              </li>
            </ul>

            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

    <div class="container" style="margin-top:2em;">
        <div class="kotak">
        <h1 class="judul" style="font-family: fredoka; margin-left:13em;" >E-KTP</h1>

    </div>
        <form method = "" action="">
            <div style="margin-left:14em;">
            <h2 style="margin-right:4em;">Pengiriman sukses! Silahkan cek verifikasi data anda!</h2>
            <br>
            <div class="row">
                <div class="col">
            <button class="btn btn-success" style="font-family:comic sans ms">Kembali ke home</button>
        </div>

        <div class="col">
            <button class="btn btn-success" style="font-family:comic sans ms">Cek Verifikasi</button>
        </div>
        </div>

    </div>
</div>
        </form>


</div>
</body>
