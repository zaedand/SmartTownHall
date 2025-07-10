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
                <a href="" class="nav-item nav-link active">Home</a>
                <a href="{{route('pengaduan')}}" class="nav-item nav-link">Pengaduan</a>
                <a href="{{route('ktp')}}" class="nav-item nav-link">E-KTP</a>
                <a href="{{route('kritik')}}" class="nav-item nav-link">Kritik & Saran</a>
                <a href="{{route('pengajuan')}}" class="nav-item nav-link">Pengajuan Surat</a>
                <a href="{{route('pajak')}}" class="nav-item nav-link">Pajak</a>
                <a href="https://www.instagram.com/didan__akmal/" target="_blank" class="nav-item nav-link">Hubungi Kami</a>
                <a href="{{ route('logout') }}" class="nav-item nav-link {{ Request::routeIs('signout') ? 'active' : '' }}">Sign out</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('img/tugu-balaikota-malang.jpg')}}" alt="" style="max-height: 44.4em;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Pelayanan publik menjadi praktis dan efisien</h5>
                                <h1 class="display-3 text-white animated slideInDown">Melancarkan Komunikasi Masyarakat ke Pemerintah.</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Smart Town Hall memfasilitasi user untuk memberi pengaduan yang dapat mencakup pelaporan kriminalitas, kendala yang dapat disampaikan secara online.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('img/berkas.jpg')}}" alt="" style="max-height: 44.4em;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Pelayanan publik menjadi praktis dan efisien</h5>
                                <h1 class="display-3 text-white animated slideInDown">Menyediakan Pelayanan Publik Secara Online</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Smart Town Hall menyediakan pelayanan publik termasuk pembuatan surat perizinan, pembuatan KTP, pembayaran pajak secara online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-laptop text-primary mb-4"></i>
                            <h5 class="mb-3">Navigasi yang mudah</h5>
                            <p>Website Stown didesain agar pengguna dapat mudah dalam menavigasi keperluan pengguna</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5 class="mb-3">Memberikan Informasi Terkini</h5>
                            <p>Website Stown juga menyediakan berita terkini yang terjadi di sekitar kota malang kepada pengguna</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-key text-primary mb-4"></i>
                            <h5 class="mb-3">Keamanan Data tinggi</h5>
                            <p>Website Stown memiliki sistem keamanan data yang baik sehingga pengguna tidak perlu khawatir</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book-open text-primary mb-4"></i>
                            <h5 class="mb-3">Memberikan Tampilan yang Nyaman bagi pengguna</h5>
                            <p>Website Stown dirancang untuk meningkatkan kenyamanan pengguna dalam mengakses website</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="image/townhall.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About us</h6>
                    <h1 class="mb-4">Selamat datang di Smart Town Hall!</h1>
                    <p class="mb-4">Smart Townhall adalah sebuah website yang dapat memudahkan pengguna dalam urusan administrasi pemerintahan. Dengan adanya Stown maka diharapkan pengguna dapat mengurus administrasi dengan mudah, simple dan fleksibel
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Menyediakan pelayanan publik secara online</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Gratis</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Mudah digunakan</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Aman</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Terpercaya</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Pemrosesan Cepat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    {-- <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Penyusun</h6>
                <h1 class="mb-5">Cyber Ikhwan</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('image/rizwan.jpg')}}" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Rizwan Abdillah Putra Jatmiko</h5>
                            <small>Front end Engineer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('image/zidan.jpg')}}" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Zaidan Akmal Mauludi</h5>
                            <small>Back end Engineer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('image/zulfi.jpg')}}" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Zulfi Modana</h5>
                            <small>Fullstack Engineer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End --> --}


    <!-- News Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Berita</h6>
                <h1 class="mb-5">Berita Malang 2024</h1>
            </div>

            <div class="owl-carousel testimonial-carousel position-relative">
                @foreach ($Beritas as $data)
                <div class="testimonial-item text-center">
                    <img class="border rectangle p-8 mx-auto mb-9" src="{{ asset('storage/images/'.$data->gambar) }}" style="width: 200px; height: 150px;">
                    <p>{{$data->waktu}}</p>
                    <h5 class="mb-0">{{$data->judul}}</h5>
                    <p>{{$data->jenis}}</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">{{$data->paragraph}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- News End -->


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



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
