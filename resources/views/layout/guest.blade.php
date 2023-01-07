<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Klinik - Clinic Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap4-fullscreen-modal/bootstrap4-modal-fullscreen.min.css') }}"
        rel="stylesheet" />
    {{-- <link href="{{ asset('front/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/bootstrap-icons.css') }}" rel="stylesheet"> --}}

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-white p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>JL. May. Jend. Soengkono KM.1, JL. Soekarno-Hatta No.2</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Mon - Fri : 09.00 AM - 09.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>Telp. (0281) 892222 / 892277 </small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href=""><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            {{-- <h1 class="m-0 text-primary">

                <i class="far fa-hospital me-3"></i>
                RSU - HI
            </h1> --}}
            <img src="https://www.rsuharapanibu.co.id/wp-content/uploads/2022/06/header-logo-setting-1.png"
                alt="" srcset="" style="width:60%">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link  {{ active_class(['/']) }}">
                    {{-- <i class="fa fa-home"></i> --}}
                    Home</a>
                <a href="{{ url('lowongan') }}" class="nav-item nav-link  {{ active_class(['lowongan']) }}">Lowongan</a>
                <a href="{{ url('announcement') }}"
                    class="nav-item nav-link  {{ active_class(['announcement']) }}">Pengumuman</a>
                <a href="{{ url('guide') }}" class="nav-item nav-link  {{ active_class(['guide']) }}">Panduan</a>
                @if (\Auth::check() == true)
                    <a href="{{ route('home') }}"
                        class="nav-item nav-link {{ active_class(['/home']) }} ">DASHBOARD</a>
                @else
                    <a href="{{ route('register') }}"
                        class="nav-item nav-link  {{ active_class(['registration']) }}">Registrasi</a>
                    @if (\Auth::check() == false)
                        <a href="{{ route('login') }}" class="nav-item nav-link  {{ active_class(['register']) }}">
                            Masuk</a>
                        {{-- <a href="{{ url('/login') }}"
                        class="btn {{ active_class(['/login']) }} btn-dark text-white rounded-0 py-4 px-lg-5 d-none d-lg-block">LOGIN<i
                            class="fa fa-arrow-right ms-3"></i></a> --}}
                    @else
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link {{ active_class(['/home']) }} ">DASHBOARD</a>
                    @endif
                @endif
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">RSU - Harapan Ibu</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Made With &hearts; By <a class="border-bottom" href="https://htmlcodex.com">IT RSU-HI</a></br>
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com"
                            target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-danger text-white btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <script src="{{ asset('front/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('front/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('front/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front/js/main.js') }}"></script>

    @stack('js')
</body>

</html>
