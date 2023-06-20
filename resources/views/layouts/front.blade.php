<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('front-assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('front-assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('front-assets/css/style1.css') }}" rel="stylesheet">


    @livewireStyles
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light fixed-top shadow py-lg-0 px-4 px-lg-5"
        style="display: flex !important">
        <a href="{{ route("home") }}" class="navbar-brand d-block d-lg-none">
            <h1 class="text-primary">{{ config('app.name') }}</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between py-4 py-lg-0" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}"
                    class="nav-item nav-link {{ request()->segment(1) == '' ? ' active' : '' }}">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>

                <a href="{{ route('events.index') }}" class="nav-item nav-link">Events</a>

                @if (Auth::check())
                    <a href="{{ route('images.index') }}"
                        class=" nav-item nav-link {{ request()->segment(1) == 'images' ? ' active' : '' }}">Images</a>
                @endif

            </div>
            <a href="{{ route("home") }}" class="navbar-brand bg-primary py-2 px-4 mx-3 d-none d-lg-block">
                <h1 class="text-white">{{ config('app.name') }}</h1>
            </a>
            <div class="navbar-nav me-auto py-0">

                <a href="{{ route("contact-us.index") }}" class="nav-item nav-link">Contact</a>


                @if (Auth::check())
                    <a href="{{ route('profile.index') }}"
                        class=" nav-item nav-link {{ request()->segment(1) == 'profile' ? ' active' : '' }}">Profile</a>
                @else
                    <a href="{{ route('login') }}"
                        class=" nav-item nav-link {{ request()->segment(1) == 'login' ? ' active' : '' }}">Login</a>
                    <a href="{{ route('register') }}"
                        class=" nav-item nav-link {{ request()->segment(1) == 'register' ? ' active' : '' }}">Register</a>
                @endif
                @if (Auth::check())
                    <a class="nav-item nav-link" style="cursor: pointer"
                        onclick="document.getElementById('logout-form').submit()">Logout</a>

                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                        @csrf

                    </form>
                @endif


            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid footer position-relative bg-dark text-white-50 mt-5 py-5 px-4 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
        <div class="row g-5 py-5">
            <div class="col-lg-6 pe-lg-5">
                <a href="{{ route("home") }}" class="navbar-brand">
                    <h1 class="display-5 text-primary">{{ config('app.name') }}</h1>
                </a>
                <p>Aliquyam sed elitr elitr erat sed diam ipsum eirmod eos lorem nonumy. Tempor sea ipsum diam sed clita
                    dolore eos dolores magna erat dolore sed stet justo et dolor.
                </p>
                <p><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope me-2"></i>info@example.com</p>

            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="row g-5">
                    <div class="col-sm-6">
                        <h4 class="text-light mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="#about">About Us</a>
                        <a class="btn btn-link" href="{{ route("contact-us.index") }}">Contact Us</a>
                        <a class="btn btn-link" href="{{ route("events.index") }}">Events</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>

                    <div class="col-sm-12">
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-square btn-outline-primary rounded-circle me-2" href="#"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-dark text-white border-top border-secondary px-0">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="py-4 px-5 text-center text-md-start">
                <p class="mb-0">&copy; <a class="text-primary" href="#">{{ config('app.name') }}</a>. All
                    Rights
                    Reserved.</p>
            </div>

        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front-assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front-assets/lib/lightbox/js/lightbox.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('front-assets/js/main.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')


    @livewireScripts

    <script>
        window.addEventListener('show-status', event => {

            showStatus(event.detail.message, event.detail.type, event.detail.toast)
        })

        function showStatus(message, type = 'success', toast = true) {



            if (type == "success") {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                if (toast) {
                    Toast.fire({
                        icon: type,
                        title: message,
                    })
                } else {
                    Swal.fire({
                        icon: type,
                        title: message,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    })
                }
            } else if (type == "error") {

                Swal.fire({
                    icon: type,
                    title: message,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                })


            }

        }
    </script>


    @stack('scripts')

</body>

</html>
