<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="icon" type="image/png" href="image/th_remove.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style-baru.css')}}" rel="stylesheet">


</head>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Memuat...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><i><img src="{{asset('image/th_remove.png')}}" alt="" style="width:1.4em;"></i>STOWN</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('pengaduan') }}" class="nav-item nav-link {{ Request::routeIs('pengaduan') ? 'active' : '' }}">Pengaduan</a>
            <a href="{{ route('ktp') }}" class="nav-item nav-link {{ Request::routeIs('ktp') ? 'active' : '' }}">E-KTP</a>
            <a href="{{ route('kritik') }}" class="nav-item nav-link {{ Request::routeIs('kritik') ? 'active' : '' }}">Kritik & Saran</a>
            <a href="{{ route('pengajuan') }}" class="nav-item nav-link {{ Request::routeIs('pengajuan') ? 'active' : '' }}">Pengajuan Surat</a>
            <a href="{{ route('pajak') }}" class="nav-item nav-link {{ Request::routeIs('pajak') ? 'active' : '' }}">Pajak</a>
            <a href="https://www.instagram.com/didan__akmal/" target="_blank" class="nav-item nav-link">Hubungi Kami</a>
            <a href="{{ route('logout') }}" class="nav-item nav-link {{ Request::routeIs('signout') ? 'active' : '' }}">Sign out</a>
        </div>

    </div>
</nav>


    @yield('content')

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Quick Link</h4>
                <a class="btn btn-link" href="{{ route('pengaduan') }}">Pengaduan</a>
                <a class="btn btn-link" href="{{ route('ktp') }}">E-KTP</a>
                <a class="btn btn-link" href="{{ route('kritik') }}">Kritik</a>
                <a class="btn btn-link" href="{{ route('pengajuan') }}">Pengajuan</a>
                <a class="btn btn-link" href="{{ route('pajak') }}">Pajak</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl.Ikan Sepat No.54</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>082134568765</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>Stown@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Location</h4>
                <div class="overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.456353468717!2d112.62712387467648!3d-7.981600994238138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6282794a4a74b%3A0x634b8f8bb9437dc7!2sBalai%20Kota%20Malang!5e0!3m2!1sen!2sid!4v1623643705072!5m2!1sen!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Powered By</h4>
                <div class="overflow-hidden">
                    <a href="https://um.ac.id/">
                        <img class="img-fluid" src="{{ asset('image/lambangum.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->





    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <script src="{{asset('js/main.js')}}"></script>

</body>
