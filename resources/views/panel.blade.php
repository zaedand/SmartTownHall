<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image/png" href="image/th_remove.png">
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Memuat...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <!-- =============== Navigation ================ -->

    <div class="kontainer">
        <div class="navigation">
            <ul id="navList">
                <li>
                    <a href="{{ route('home-admin') }}">
                        <span class="icon">
                            <img src= "{{ asset('image/th_remove.png') }}" alt="S-Town" style="width:50px;">
                        </span>
                        <span class="title">Smart-Town</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('home-admin') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'complaint')
                <li>
                    <a href="{{ route('admin-pengaduan') }}">
                        <span class="icon">
                            <img src="{{ asset('image/Speaker.png') }}" alt="Customers Logo" style="width:30px;">
                        </span>
                        <span class="title">Pengaduan</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'ktp')
                <li>
                    <a href="{{ route('admin-ktp') }}">
                        <span class="icon">
                            <img src="{{ asset('image/KTP.png') }}" alt="Customers Logo" style="width:30px;">
                        </span>
                        <span class="title">E-KTP</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'submission')
                <li>
                    <a href="{{ route('admin-pengajuan') }}">
                        <span class="icon">
                            <img src="{{ asset('image/Writing.png') }}" alt="Customers Logo" style="width:30px;">
                        </span>
                        <span class="title">Surat Pengajuan</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->level == 'admin')
                <li>
                    <a href="{{ route('admin-berita') }}">
                        <span class="icon">
                            <img src="{{ asset('image/News.png') }}" alt="Customers Logo" style="width:30px;">
                        </span>
                        <span class="title">Berita</span>
                    </a>
                </li>
                @endif

                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'tax')
                <li>
                    <a href="{{ route('admin-pajak') }}">
                        <span class="icon">
                            <img src="{{ asset('image/Coin.png') }}" alt="Customers Logo" style="width:30px;">
                        </span>
                        <span class="title">Pajak</span>
                    </a>
                </li>
                @endif

                <li>
                    <a href="{{ route('admin-kritik') }}">
                        <span class="icon">
                            <img src="{{ asset('image/Edit.png') }}" alt="Customers Logo" style="width:30px;">
                        </span>
                        <span class="title">Kritik & Saran</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>

            <!-- Content section -->
            @yield('content')
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('js/stown.js') }}">document.addEventListener("DOMContentLoaded", function () {
        let navList = document.getElementById("navList");
        let listItems = navList.querySelectorAll("li");

        function removeActive() {
            listItems.forEach((item) => {
                item.classList.remove("hovered");
            });
        }

        function setActive() {
            removeActive();
            this.classList.add("hovered");
        }

        listItems.forEach((item) => {
            item.addEventListener("click", setActive);
        });

        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");

        toggle.addEventListener("click", function () {
            navigation.classList.toggle("active");
            main.classList.toggle("active");
            removeActive();
        });
    });</script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
