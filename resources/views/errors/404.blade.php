<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ADMIN | RIASEC Test Admin Page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('css/core/libs.min.css') }}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ asset('vendor/aos/dist/aos.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('css/hope-ui.min.css') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/custom.min.css') }}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ asset('css/dark.min.css') }}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('css/customizer.min.css') }}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('css/rtl.min.css') }}" />

</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">

    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>

        <div class="gradient">
            <div class="container">
                <img src="{{ asset('images/error/404.png') }}" class="img-fluid mb-4 w-50" alt="">
                <h2 class="mb-0 mt-4 text-white">Oops! This Page is Not Found.</h2>
                <p class="mt-2 text-white">The requested page dose not exist.</p>
                @if (Auth::check())
                    <a class="btn bg-white text-primary d-inline-flex align-items-center"
                        href="{{ route('dashboard.index') }}">Go to
                        Dashboard</a>
                @else
                    <a class="btn bg-white text-primary d-inline-flex align-items-center"
                        href="{{ route('login') }}">Back</a>
                @endif
            </div>
            <div class="box">
                <div class="c xl-circle">
                    <div class="c lg-circle">
                        <div class="c md-circle">
                            <div class="c sm-circle">
                                <div class="c xs-circle">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Library Bundle Script -->
    <script src="{{ asset('js/core/libs.min.js') }}"></script>
    {{-- <script src="../assets/js/core/libs.min.js"></script> --}}

    <!-- External Library Bundle Script -->
    <script src="{{ asset('js/core/external.min.js') }}"></script>
    {{-- <script src="../assets/js/core/external.min.js"></script> --}}

    <!-- Widgetchart Script -->
    <script src="{{ asset('js/charts/widgetcharts.js') }}"></script>
    {{-- <script src="../assets/js/charts/widgetcharts.js"></script> --}}

    <!-- mapchart Script -->
    <script src="{{ asset('js/charts/vectore-chart.js') }}"></script>
    {{-- <script src="../assets/js/charts/vectore-chart.js"></script> --}}
    <script src="{{ asset('js/charts/dashboard.js') }}"></script>
    {{-- <script src="../assets/js/charts/dashboard.js" ></script> --}}

    <!-- fslightbox Script -->
    <script src="{{ asset('js/plugins/fslightbox.js') }}"></script>
    {{-- <script src="../assets/js/plugins/fslightbox.js"></script> --}}

    <!-- Settings Script -->
    <script src="{{ asset('js/plugins/setting.js') }}"></script>
    {{-- <script src="../assets/js/plugins/setting.js"></script> --}}

    <!-- Slider-tab Script -->
    <script src=".{{ asset('js/plugins/slider-tabs.js') }}"></script>
    {{-- <script src="../assets/js/plugins/slider-tabs.js"></script> --}}

    <!-- Form Wizard Script -->
    <script src=".{{ asset('js/plugins/form-wizard.js') }}"></script>
    {{-- <script src="../assets/js/plugins/form-wizard.js"></script> --}}

    <!-- AOS Animation Plugin-->
    <script src="{{ asset('vendor/aos/dist/aos.js') }}"></script>
    {{-- <script src="../assets/vendor/aos/dist/aos.js"></script> --}}

    <!-- App Script -->
    <script src="{{ asset('js/hope-ui.js') }}"></script>
    {{-- <script src="../assets/js/hope-ui.js" defer></script> --}}

</body>

</html>
