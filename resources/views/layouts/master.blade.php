<!DOCTYPE html>
<html lang="en">

<head>
    <title>UKMK Etalase</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset(Storage::url(\App\Profile::find(1)->logo)) }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/animate.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/aos.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/jquery.timepicker.css">


    <!-- <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/flaticon.css"> -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/flaticonBidang.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/icomoon.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/style.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    @yield('styles')
</head>

<body>
    @yield('content')


    <!-- Start Footer Section -->
    <footer class="ftco-footer py-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());

                        </script> All rights reserved | This template is made with <i class="icon-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                    <ul class="ftco-footer-social p-0">
                        @if (\App\Profile::find(1)->twitter)
                            <li class="ftco-animate"><a target="_blank" href="{{ \App\Profile::find(1)->twitter }}"><span class="icon-twitter"></span></a></li>
                        @endif
                        @if (\App\Profile::find(1)->facebook)
                            <li class="ftco-animate"><a target="_blank" href="{{ \App\Profile::find(1)->facebook }}"><span class="icon-facebook"></span></a></li>
                        @endif
                        @if (\App\Profile::find(1)->instagram)
                            <li class="ftco-animate"><a target="_blank" href="{{ \App\Profile::find(1)->instagram }}"><span class="icon-instagram"></span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>


    <script src="{{ url('/') }}/assets/snapshot/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/popper.min.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/jquery.easing.1.3.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/jquery.waypoints.min.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/jquery.stellar.min.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/owl.carousel.min.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/aos.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/jquery.animateNumber.min.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/scrollax.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <script src="{{ url('/') }}/assets/snapshot/js/leaflet.js"></script>
    <script src="{{ url('/') }}/assets/snapshot/js/main.js"></script>
    @stack('scripts')
</body>

</html>
