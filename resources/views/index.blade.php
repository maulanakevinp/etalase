@extends('layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
<style>
    img.zoom {
        width: 100%;
        height: 200px;
        border-radius: 5px;
        object-fit: cover;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
    }

    .thumb {
        margin-bottom: 30px;
    }

    img.zoom:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>
@endsection

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
<section id="home" class="hero-wrap js-fullheight" style="background-image:url({{ url('/') }}/img/0.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-lg-7 ftco-animate d-flex align-items-center">
                <div class="text text-center">
                    <img src="{{ asset(Storage::url(\App\Profile::find(1)->logo)) }}" style="width: 10%; margin-bottom: 60pt">
                    <!-- <h1 class="logo"><a href="index.html"><span class="flaticon-camera-shutter"></span>Snapshot<small>Photographer / San Francisco</small></a></h1> -->
                    <h1 class="mb-4">{{ \App\Profile::find(1)->judul }}</h1>
                    <p class="mb-4">{{ \App\Profile::find(1)->kalimat_pembuka }}</p>
                    <p class="mt-5"><a href="#about" class="btn-custom">Find More <span class="ion-ios-arrow-round-forward"></span></a></p>
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
                    <div class="img d-flex align-self-stretch align-items-center" style="background-image:url({{ url('/') }}/img/4.jpg);">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 pl-md-5">
                <div class="heading-section ftco-animate">
                    <h2 class="mb-4">{{ \App\Profile::find(1)->judul }}<br></h2>
                    <p>{{ \App\Profile::find(1)->deskripsi }}</p>
                    <div class="d-flex w-100">
                        <div class="img img-about-2 ml-2" style="background-image:url({{ url('/') }}/img/2.jpg);"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 ml-2">
                            <a id="demo02" href="#animatedModal">
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
<!-- modal start -->

<!-- modal end -->
<!-- End About Me Section -->

<!-- Start Services Section -->
<section id="services" class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-5 heading-section ftco-animate pb-5">
                        <h2 class="mb-4" style="font-size: 25pt">Bidang di Etalase</h2>
                        <p>{{ \App\Profile::find(1)->bidang }}</p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($arts as $art)
                    <div class="col-md-4">
                        <div class="media block-6 services d-block ftco-animate">
                            <div class="icon"><span class="{{ $art->ikon }}"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">{{ $art->nama }}</h3>
                                <p>{{ $art->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch">
                <div class="img w-100" style="background-image:url({{ url('/') }}/img/3.jpg);"></div>
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
                <p>{{ \App\Profile::find(1)->gallery }}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if (count($galleries) > 0)
            @for ($i = 0; $i < 9; $i++) @if ($galleries[$i]['jenis']==1) <div class="col-md-4 col-sm-6 thumb">
                <a href="{{ asset(Storage::url($galleries[$i]['gambar'])) }}" data-fancybox="images">
                    <img src="{{ asset(Storage::url($galleries[$i]['gambar'])) }}" class="zoom img-fluid" alt="{{ asset(Storage::url($galleries[$i]['caption'])) }}">
                </a>
        </div>
        @else
        <div class="col-md-4 col-sm-6 thumb">
            <a href="https://www.youtube.com/watch?v={{ $galleries[$i]['id'] }}" data-fancybox="images" data-caption="{{ $galleries[$i]['caption'] }}">
                <img src="{{ $galleries[$i]['gambar'] }}" class="zoom img-fluid" alt="{{ $galleries[$i]['caption'] }}">
            </a>
        </div>
        @endif
        @endfor
        <div class="col-12 text-center ftco-animate">
            <a href="{{ route('gallery') }}" class="btn btn-primary mt-4">Load More</a>
        </div>
        @else
        <div class="col-12 text-center ftco-animate">
            <div class="card bg-secondary">
                <div class="card-body">
                    <h4>Data Tidak Tersedia</h4>
                </div>
            </div>
        </div>
        @endif
    </div>
    </div>
</section>
<!-- End Project Section -->

<section class="ftco-section testimony-section" id="testimonial">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-4 heading-section ftco-animate text-center">
                <span class="subheading">Struktur Organisasi</span>
                <h2 class="mb-4">PENGURUS UKMK ETALASE</h2>
                <p>{{ \App\Profile::find(1)->pengurus }}</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    @foreach ($structures as $structure)
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-4" style="background-image:url({{ asset(Storage::url($structure->image)) }})">
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
                <div class="col-md-5 ftco-animate text-center mx-auto" style="padding: 1.5rem">
                    <a href="{{ route('structure') }}">
                        <p class="btn-kotak">Lihat Selengkapnya <span class="ion-ios-arrow-round-forward"></span></p>
                    </a>
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
                <p>{{ \App\Profile::find(1)->contact }}</p>
            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-6 ftco-animate">
                <div class="row col-md-12">
                    @if (\App\Profile::find(1)->alamat)
                    <div class="col-md-6 d-flex mb-5 ftco-animate">
                        <div class="align-self-stretch box text-center p-4">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-map-signs"></span>
                            </div>
                            <div>
                                <h3 class="mb-4">Address</h3>
                                <p>{{ \App\Profile::find(1)->alamat }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (\App\Profile::find(1)->kontak)
                    <div class="col-md-6 d-flex mb-5  ftco-animate">
                        <div class="align-self-stretch box text-center p-4">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-phone2"></span>
                            </div>
                            <div>
                                <h3 class="mb-4">Contact Number</h3>
                                <p><a href="tel://{{ \App\Profile::find(1)->kontak }}">{{ \App\Profile::find(1)->kontak }}</a></p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (\App\Profile::find(1)->email)
                    <div class="col-md-6 d-flex    ftco-animate">
                        <div class="align-self-stretch box text-center py-5 p-4">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-paper-plane"></span>
                            </div>
                            <div>
                                <h3 class="mb-4">Email Address</h3>
                                <p><a href="mailto:{{ \App\Profile::find(1)->email }}">{{ \App\Profile::find(1)->email }}</a></p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (\App\Profile::find(1)->website)
                    <div class="col-md-6 d-flex   ftco-animate">
                        <div class="align-self-stretch box text-center py-5 p-4">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="icon-globe"></span>
                            </div>
                            <div>
                                <h3 class="mb-4">Website</h3>
                                <p><a href="{{ \App\Profile::find(1)->website }}">{{ \App\Profile::find(1)->judul }}</a></p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-md-6 d-flex align-items-stretch ftco-animate">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->
@endsection

@push('scripts')
<div id="animatedModal">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
    <div class="close-animatedModal text-center mt-3">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
    </div>

    <div class="modal-content container mt-2" style="background-color: transparent;color:white;border:none;">
        <div class="modal-dialog container text-center">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-4 heading-section ftco-animate">
                    <img src="{{ asset(Storage::url(\App\Profile::find(1)->logo)) }}" style="width: 20%; margin-bottom: 30pt">
                    <span class="subheading d-block">Sejarah Organisasi</span>
                    <h2 class="mb-4">UKMK ETALASE</h2>
                    <p>Berikut adalah terbentuknya UKMK ETALASE </p>
                </div>
            </div>

            <div class="col heading-section ftco-animate ">
                <span class="subheading"></span>
                @foreach($profile as $profile)
                <p>{{$profile->sejarah}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/snapshot/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js//animatedModal.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#demo02").animatedModal({
            animatedIn: 'lightSpeedIn',
            animatedOut: 'bounceOutDown',
            color: 'rgba(25,26,28,0.9)',
        });
    });
</script>
@endpush