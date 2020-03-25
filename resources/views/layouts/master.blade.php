<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/animate.css">

    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/aos.css">

    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/flaticon.css">
    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/icomoon.css">
    <link rel="stylesheet" href="{{ url('/') }}/ionize/css/style.css">
</head>

<body>

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight img"
            style="background-image: url({{ url('/') }}/ionize/images/sidebar-bg.jpg);">
            <h1 id="colorlib-logo" class="mb-4"><a href="{{ url('/') }}">{{ config('app.name') }}</a></h1>
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li class="colorlib-active"><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="">Profil</a></li>
                    <li><a href="">Sejarah</a></li>
                    <li><a href="">Karya</a></li>
                    <li><a href="">Kegiatan</a></li>
                    <li><a href="">Struktur</a></li>
                    <li><a href="">Materi</a></li>
                </ul>
            </nav>

            <div class="colorlib-footer">
                <p class="pfooter">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());

                    </script> Etalase All rights reserved | This template is made with <i class="icon-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </aside> <!-- END COLORLIB-ASIDE -->

        <div id="colorlib-main">
            <section class="ftco-section ftco-no-pt ftco-no-pb bg-light">
                <div class="container px-0">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate active">
                                <div class="carousel-blog owl-carousel">
                                    <div class="item">
                                        <a href="single.html" class="img"
                                            style="background-image: url({{ url('/') }}/ionize/images/image_1.jpg);"></a>
                                    </div>
                                    <div class="item">
                                        <a href="single.html" class="img"
                                            style="background-image: url({{ url('/') }}/ionize/images/image_7.jpg);"></a>
                                    </div>
                                    <div class="item">
                                        <a href="single.html" class="img"
                                            style="background-image: url({{ url('/') }}/ionize/images/image_8.jpg);"></a>
                                    </div>
                                </div>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                            <span><a href="single.html"><i
                                                        class="icon-folder-o mr-2"></i>Travel</a></span>
                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                        </p>
                                    </div>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies</p>
                                    <p><a href="#" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 d-flex">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex align-items-center">
                                        <a href="https://vimeo.com/45830194"
                                            class="img img-2 popup-vimeo d-flex align-items-center justify-content-center"
                                            style="background-image: url({{ url('/') }}/ionize/images/image_2.jpg);">
                                            <div class="icon d-flex align-items-center justify-content-center">
                                                <span class="ion-ios-play"></span>
                                            </div>
                                        </a>
                                        <div class="text text-2 p-4">
                                            <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest
                                                    Wisdom</a></h3>
                                            <div class="meta-wrap">
                                                <p class="meta">
                                                    <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                                    <span><a href="single.html"><i
                                                                class="icon-folder-o mr-2"></i>Travel</a></span>
                                                    <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                                </p>
                                            </div>
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                            </p>
                                            <p><a href="#" class="btn-custom">Read More <span
                                                        class="ion-ios-arrow-forward"></span></a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex align-items-center">
                                        <a href="single.html" class="img img-2 order-md-last"
                                            style="background-image: url({{ url('/') }}/ionize/images/image_3.jpg);"></a>
                                        <div class="text text-2 text-md-right p-4">
                                            <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest
                                                    Wisdom</a></h3>
                                            <div class="meta-wrap">
                                                <p class="meta">
                                                    <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                                    <span><a href="single.html"><i
                                                                class="icon-folder-o mr-2"></i>Travel</a></span>
                                                    <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                                </p>
                                            </div>
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                            </p>
                                            <p><a href="#" class="btn-custom">Read More <span
                                                        class="ion-ios-arrow-forward"></span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="single.html" class="img"
                                    style="background-image: url({{ url('/') }}/ionize/images/image_4.jpg);"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                            <span><a href="single.html"><i
                                                        class="icon-folder-o mr-2"></i>Travel</a></span>
                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                        </p>
                                    </div>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies</p>
                                    <p><a href="#" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="single.html" class="img"
                                    style="background-image: url({{ url('/') }}/ionize/images/image_5.jpg);"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                            <span><a href="single.html"><i
                                                        class="icon-folder-o mr-2"></i>Travel</a></span>
                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                        </p>
                                    </div>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies</p>
                                    <p><a href="#" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="single.html" class="img"
                                    style="background-image: url({{ url('/') }}/ionize/images/image_6.jpg);"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                            <span><a href="single.html"><i
                                                        class="icon-folder-o mr-2"></i>Travel</a></span>
                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                        </p>
                                    </div>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies</p>
                                    <p><a href="#" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 d-flex">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex align-items-center">
                                        <a href="single.html" class="img img-2"
                                            style="background-image: url({{ url('/') }}/ionize/images/image_7.jpg);"></a>
                                        <div class="text text-2 p-4">
                                            <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest
                                                    Wisdom</a></h3>
                                            <div class="meta-wrap">
                                                <p class="meta">
                                                    <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                                    <span><a href="single.html"><i
                                                                class="icon-folder-o mr-2"></i>Travel</a></span>
                                                    <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                                </p>
                                            </div>
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                            </p>
                                            <p><a href="#" class="btn-custom">Read More <span
                                                        class="ion-ios-arrow-forward"></span></a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="blog-entry ftco-animate d-md-flex align-items-center">
                                        <a href="single.html" class="img img-2 order-md-last"
                                            style="background-image: url({{ url('/') }}/ionize/images/image_8.jpg);"></a>
                                        <div class="text text-2 p-4 text-md-right">
                                            <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest
                                                    Wisdom</a></h3>
                                            <div class="meta-wrap">
                                                <p class="meta">
                                                    <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                                    <span><a href="single.html"><i
                                                                class="icon-folder-o mr-2"></i>Travel</a></span>
                                                    <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                                </p>
                                            </div>
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                            </p>
                                            <p><a href="#" class="btn-custom">Read More <span
                                                        class="ion-ios-arrow-forward"></span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="single.html" class="img"
                                    style="background-image: url({{ url('/') }}/ionize/images/image_6.jpg);"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                            <span><a href="single.html"><i
                                                        class="icon-folder-o mr-2"></i>Travel</a></span>
                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                        </p>
                                    </div>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies</p>
                                    <p><a href="#" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="single.html" class="img"
                                    style="background-image: url({{ url('/') }}/ionize/images/image_4.jpg);"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                            <span><a href="single.html"><i
                                                        class="icon-folder-o mr-2"></i>Travel</a></span>
                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                        </p>
                                    </div>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies</p>
                                    <p><a href="#" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate d-flex flex-column-reverse">
                                <a href="single.html" class="img"
                                    style="background-image: url({{ url('/') }}/ionize/images/image_5.jpg);"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                            <span><a href="single.html"><i
                                                        class="icon-folder-o mr-2"></i>Travel</a></span>
                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                        </p>
                                    </div>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies</p>
                                    <p><a href="#" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="blog-entry ftco-animate">
                                <a href="single.html" class="img"
                                    style="background-image: url({{ url('/') }}/ionize/images/image_6.jpg);"></a>
                                <div class="text p-4">
                                    <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
                                    <div class="meta-wrap">
                                        <p class="meta">
                                            <span><i class="icon-calendar mr-2"></i>Sept. 10, 2019</span>
                                            <span><a href="single.html"><i
                                                        class="icon-folder-o mr-2"></i>Travel</a></span>
                                            <span><i class="icon-comment2 mr-2"></i>5 Comment</span>
                                        </p>
                                    </div>
                                    <p class="mb-4">A small river named Duden flows by their place and supplies</p>
                                    <p><a href="#" class="btn-custom">Read More <span
                                                class="ion-ios-arrow-forward"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- END COLORLIB-MAIN -->
    </div><!-- END COLORLIB-PAGE -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>


    <script src="{{ url('/') }}/ionize/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/ionize/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ url('/') }}/ionize/js/popper.min.js"></script>
    <script src="{{ url('/') }}/ionize/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/ionize/js/jquery.easing.1.3.js"></script>
    <script src="{{ url('/') }}/ionize/js/jquery.waypoints.min.js"></script>
    <script src="{{ url('/') }}/ionize/js/jquery.stellar.min.js"></script>
    <script src="{{ url('/') }}/ionize/js/owl.carousel.min.js"></script>
    <script src="{{ url('/') }}/ionize/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('/') }}/ionize/js/aos.js"></script>
    <script src="{{ url('/') }}/ionize/js/jquery.animateNumber.min.js"></script>
    <script src="{{ url('/') }}/ionize/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{ url('/') }}/ionize/js/google-map.js"></script>
    <script src="{{ url('/') }}/ionize/js/main.js"></script>

</body>

</html>
