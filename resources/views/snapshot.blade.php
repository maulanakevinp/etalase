@extends('layouts.master')
@section('content')
    <nav id="navbar" class="navbar">
        <ul class="nav-menu">
            <li>
                <a data-scroll="home" href="#home" class="dot active">
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a data-scroll="about" href="#about" class="dot">
                    <span>About</span>
                </a>
            </li>
            <li>
                <a data-scroll="services" href="#services" class="dot">
                    <span>Bidang</span>
                </a>
            </li>
            <li>
                <a data-scroll="work" href="#work" class="dot">
                    <span>Gallery</span>
                </a>
            </li>
            <li>
                <a data-scroll="testimonial" href="#testimonial" class="dot">
                    <span>Structure</span>
                </a>
            </li>
            <li>
                <a data-scroll="contact" href="#contact" class="dot">
                    <span>Contact</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- End Nav Section -->

    <!-- Start Home Section -->
    <section id="home" class="hero-wrap js-fullheight"
        style="background-image:url({{ url('/') }}/assets/snapshot/images/bg-1.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-lg-7 ftco-animate d-flex align-items-center">
                    <div class="text text-center">
                        <img src="{{ url('/') }}/logo/logo etalase.png" style="width: 10%; margin-bottom: 60pt">
                        <!-- <h1 class="logo"><a href="index.html"><span class="flaticon-camera-shutter"></span>Snapshot<small>Photographer / San Francisco</small></a></h1> -->
                        <h1 class="mb-4">UKM KESENIAN <br>ETALASE</h1>
                        <p class="mb-4">A small river named Duden flows by their place and supplies it with the
                            necessary regelialia. It is a paradisematic country, in which roasted parts.</p>
                        <p class="mt-5"><a href="#" class="btn-custom">Find More <span class="ion-ios-arrow-round-forward"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Home Section -->

    <!-- Start About Me Section -->
    <section class="ftco-about img ftco-section" id="about">
        <div class="container">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 col-lg-6 d-flex">
                    <div class="img-about img d-flex align-items-stretch">
                        <div class="overlay"></div>
                        <div class="img img-video d-flex align-self-stretch align-items-center"
                            style="background-image:url({{ url('/') }}/assets/snapshot/images/about-2.jpg);">
                            <div class="video justify-content-center">
                                <a href="https://vimeo.com/45830194"
                                    class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-play"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 pl-md-5">
                    <div class="heading-section ftco-animate">
                        <h2 class="mb-4">Etalase... <br></h2>
                        <p>Etalase adalah Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque ipsam quia architecto ad illo odio sapiente perferendis esse amet, maxime, necessitatibus ducimus. Inventore quis magnam commodi voluptas culpa exercitationem molestiae!</p>
                        <div class="counter-wrap ftco-animate d-flex my-md-4">
                            <div class="text">
                                <p class="mb-4">
                                    <span class="number" data-number="120">0</span>
                                    <span>Project complete</span>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex w-100">
                            <div class="img img-about-2 mr-2"
                                style="background-image:url({{ url('/') }}/assets/snapshot/images/about.jpg);"></div>
                            <div class="img img-about-2 ml-2"
                                style="background-image:url({{ url('/') }}/assets/snapshot/images/about-3.jpg);"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6 pr-2">
                                <a href="#" class="">
                                    <p class="btn-kotak">Profil Etalase <span lass="ion-ios-arrow-round-forward"></span></p>
                                </a>
                            </div>
                            <div class="col-md-6 pl-2">
                                <a href="#">
                                    <p class="btn-kotak">Sejarah Etalase <span class="ion-ios-arrow-round-forward"></span></p>
                                </a>
                            </div>
                        </div>
                        <!-- <blockquote class="blockquote mt-5">
		          	<p class="mb-2">"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.."</p>
		          	<span>&mdash; Lucy Lee</span>
		          </blockquote> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Me Section -->

    <!-- Start Services Section -->
    <section id="services" class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-5 heading-section ftco-animate pb-5">
                            <h2 class="mb-4" style="font-size: 25pt">Bidang di Etalase</h2>
                            <p>Terdapat lima bidang seni di UKMK Etalase yang
                                sehingga anggota dapat berproses sesuai ketertarikannya masing-masing</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="media block-6 services d-block ftco-animate">
                                <div class="icon"><span class="flaticon-music"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Musik</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia. It is a paradisematic country, in which roasted parts of sentences.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="media block-6 services d-block ftco-animate">
                                <div class="icon"><span class="flaticon-belly-dance"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Tari</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia. It is a paradisematic country, in which roasted parts of sentences.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="media block-6 services d-block ftco-animate">
                                <div class="icon"><span class="flaticon-choir"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">PSM</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia. It is a paradisematic country, in which roasted parts of sentences.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="media block-6 services d-block ftco-animate">
                                <div class="icon"><span class="flaticon-camera"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Fotografi</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia. It is a paradisematic country, in which roasted parts of sentences.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="media block-6 services d-block ftco-animate">
                                <div class="icon"><span class="flaticon-theater"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Teater</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia. It is a paradisematic country, in which roasted parts of sentences.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-stretch">
                    <div class="img w-100"
                        style="background-image:url({{ url('/') }}/assets/snapshot/images/about.jpg);"></div>
                </div>
            </div>
            <div class="row progress-circle pt-md-5">
                <div class="col-md-7 order-md-last py-md-5">
                    <h2 class="ftco-animate text-center" style="margin-bottom: 50px">Pengurus Harian UKMK Etalase</h2>
                    <div class="row">
                        <div class="col-md-4 mb-md-0 mb-4 ftco-animate">
                            <div class="">
                                <h2 class="text-center mb-4">Ketua Umum</h2>

                                <!-- Progress bar 1 -->
                                <div class="progress mx-auto" data-value='90'>
                                    <!-- <span class="progress-left">
		                  <span class="progress-bar border-primary"></span>
					          </span>
					          <span class="progress-right">
		                  <span class="progress-bar border-primary"></span>
					          </span> -->
                                    <div
                                        class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                        <h1 style="font-size: 50pt"><i class="flaticonBidang-music"></i></h1>
                                    </div>
                                </div>
                                <!-- END -->
                            </div>
                        </div>

                        <div class="col-md-4 mb-md-0 mb-4 ftco-animate">
                            <div class="">
                                <h2 class="text-center mb-4">Sekretaris</h2>

                                <!-- Progress bar 1 -->
                                <div class="progress mx-auto" data-value='80'>
                                    <!-- <span class="progress-left">
		                  <span class="progress-bar border-primary"></span>
					          </span>
					          <span class="progress-right">
		                  <span class="progress-bar border-primary"></span>
					          </span> -->
                                    <div
                                        class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                        <div class="h5">80<sup class="small">%</sup></div>
                                    </div>
                                </div>
                                <!-- END -->
                            </div>
                        </div>

                        <div class="col-md-4 mb-md-0 mb-4 ftco-animate">
                            <div class="">
                                <h2 class="text-center mb-4">Bendahara</h2>

                                <!-- Progress bar 1 -->
                                <div class="progress mx-auto" data-value='75'>
                                    <!-- <span class="progress-left">
		                  <span class="progress-bar border-primary"></span>
					          </span>
					          <span class="progress-right">
		                  <span class="progress-bar border-primary"></span>
					          </span> -->
                                    <div
                                        class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                        <div class="h5">75<sup class="small">%</sup></div>
                                    </div>
                                </div>
                                <!-- END -->
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px">
                        <div class="col-md-3"></div>
                        <div class="col-md-5 ftco-animate text-center" style="padding: 1.5rem">
                            <a href="#">
                                <p class="btn-kotak">Lihat pengurus lengkap <span
                                        class="ion-ios-arrow-round-forward"></span></p>
                            </a>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
                <div class="col-md-5 d-flex align-items-stretch">
                    <div class="img w-100"
                        style="background-image:url({{ url('/') }}/assets/snapshot/images/about-2.jpg);"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Section -->

    <!-- Start Testimonials Section -->
    <section id="work" class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 heading-section text-center ftco-animate pb-5">
                    <h2 class="mb-4">Gallery</h2>
                    <p>Gallery Etalase adalah Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, laboriosam ut obcaecati officiis sequi earum perspiciatis nihil veritatis a amet?</p>
                </div>
            </div>
        </div>
        <div class="container-fluid px-md-0">
            <div class="row no-gutters">
                @foreach ($images as $image)
                    <div class="col-md-4 ftco-animate">
                        <div class="model img d-flex align-items-end" style="background-image:url({{ asset('img/gallery/'.$image->image) }});">
                            <a href="{{ asset('img/gallery/'.$image->image) }}" class="icon image-popup d-flex justify-content-center align-items-center">
                                <span class="icon-expand"></span>
                            </a>
                            <div class="desc w-100 px-4">
                                <div class="text w-100 mb-3">
                                    <span>Nature</span>
                                    <h2><a href="{{asset('assets/snapshot/work-single.html')}}">Beautiful Work</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4 text-center">
                    <a href="{{ route('gallery') }}" class="btn btn-primary mt-4">Load More</a>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </section>
    <!-- End Project Section -->

    <section class="ftco-section testimony-section" id="testimonial">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-4 heading-section ftco-animate">
                    <span class="subheading">Struktur Organisasi</span>
                    <h2 class="mb-4">PENGURUS UKMK ETALASE</h2>
                    <p>Berikut adalah susunan kepengurusan UKMK Etalase periode 2019 - 2020 </p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        @foreach ($structures as $structure)
                            <div class="item">
                                <div class="testimony-wrap p-4 pb-5">
                                    <div class="user-img mb-4"
                                        style="background-image:url({{ $structure->image == "noimage.jpg" ? asset('noimage.jpg') : asset('img/anggota/'.$structure->image) }})">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text">
                                        <p class="mb-5 pl-4 line">{{$structure->jabatan}}</p>
                                        <div class="pl-5">
                                            <p class="name">{{$structure->nama}}</p>
                                            <span class="position">{{$structure->nia}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Contact Section -->
    <section class="ftco-section contact-section" id="contact">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-4 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Contact</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                        is a paradisematic country.</p>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Address</h3>
                            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Contact Number</h3>
                            <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Email Address</h3>
                            <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Website</h3>
                            <p><a href="#">yoursite.com</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row block-9">
                <div class="col-md-6 ftco-animate">
                    <form action="#" class="contact-form p-4 p-md-5 py-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>

                <div class="col-md-6 d-flex align-items-stretch">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
@endsection
