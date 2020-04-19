<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Autoplay usage demo">
    <meta name="author" content="David Deutsch">
    <title>{{ config('app.name') }}</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic,300italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/docs.theme.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('/') }}/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="{{ asset('logo/logo etalase.png') }}" type="image/x-icon">
    <script src="{{ url('/') }}/assets/vendors/jquery.min.js"></script>
    <script src="{{ url('/') }}/assets/owlcarousel/owl.carousel.js"></script>
</head>

<body style="padding:0;">
    <section id="demos">
        <div class="title">
            <h1 class="font-title">GALLERY UKMK ETALASE</h1>
        </div>
        <div class="image-camera">
            <img src="{{ url('/') }}/assets/images/3.png" alt="">
            <div class="content-camera">
                @php
                    $i = 1;
                @endphp
                <img src="{{ asset('img/gallery/'.$images[0]->image) }}" alt="" class="camera in-camera j" id="{{ $i }}">
                @foreach ($images as $image)
                    @if ($image->image != $images[0]->image)
                        @php
                            $i++;
                        @endphp
                <img src="{{ asset('img/gallery/'.$image->image) }}" alt="" class="camera in-camera" id="{{ $i }}">
                    @endif
                @endforeach
            </div>
            <a href="{{ route('home.index') }}" class="btn-view animated infinite bounce delay-2s">View All</a>
        </div>
        <div class="owl-carousel owl-theme" style="margin:0;">
            @foreach ($images as $image)
                <div class="item" style="margin: 0;padding: 0;">
                    <img src="{{ asset('img/gallery/'.$image->image) }}" alt="">
                </div>
            @endforeach
        </div>
    </section>
    <script>
        $(document).ready(function () {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 6000,
                center: true,
                animateOut: 'zoomOutLeft',
                animateIn: 'zoomInRight',
                responsive: {
                    0: {
                        autoplayHoverPause: true,
                        autoWidth: true
                    },
                    600: {
                        autoHeight: true,
                        autoWidth: true,
                        autoplayHoverPause: true
                    },
                    1000: {
                        items: 1
                    }
                },
                onDragged: callback
            });
        function callback(event) {

        }
        owl.on('changed.owl.carousel', function (event) {
            var slider = Math.round(event.item.count / 2) - 1;
            var current = event.item.index - slider;
            $(".camera").removeClass("j");
            $("#" + current + "").addClass("j");
        });

        $('.play').on('click', function () {
            owl.trigger('play.owl.autoplay', [1000]);
        });

        $('.stop').on('click', function () {
            owl.trigger('stop.owl.autoplay');
        });

    });
    </script>
    <script src="{{ url('/') }}/assets/vendors/highlight.js"></script>
    <script src="{{ url('/') }}/assets/js/app.js"></script>
</body>

</html>
