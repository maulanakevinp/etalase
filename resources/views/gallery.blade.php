<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Gallery UKMK Etalase UNEJ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
    <link rel="shortcut icon" href="{{ asset(Storage::url(\App\Profile::find(1)->logo)) }}" type="image/x-icon">

    <style>
        body {
            background-color: #1d1d1d !important;
            font-family: "Asap", sans-serif;
            color: #989898;
            margin: 10px;
            font-size: 16px;
        }
        #demo {
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        .thumb {
            margin-bottom: 30px;
        }
        .page-top {
            margin-top: 85px;
        }
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
        img.zoom:hover {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -o-transform: scale(1.1);
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <!-- Page Content -->
    <div class="container page-top mt-4">
        <div class="text-center">
            <a href="{{ url('') }}">
                <img class="mb-5" height="100px" src="{{ asset(Storage::url(\App\Profile::find(1)->logo)) }}" alt="">
            </a>
        </div>
        <div id="gallery" class="row">
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/snapshot/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('gallery.load') }}",
                method: "GET",
                beforeSend: function () {
                    $("#gallery").html(`
                        <div class="col-md-4 col-sm-6 thumb">
                            <img src="{{ url("img/img-lazy-loading.gif") }}" class="zoom img-fluid"  alt="Loading">
                        </div>
                        <div class="col-md-4 col-sm-6 thumb">
                            <img src="{{ url("img/img-lazy-loading.gif") }}" class="zoom img-fluid"  alt="Loading">
                        </div>
                        <div class="col-md-4 col-sm-6 thumb">
                            <img src="{{ url("img/img-lazy-loading.gif") }}" class="zoom img-fluid"  alt="Loading">
                        </div>
                        <div class="col-md-4 col-sm-6 thumb">
                            <img src="{{ url("img/img-lazy-loading.gif") }}" class="zoom img-fluid"  alt="Loading">
                        </div>
                        <div class="col-md-4 col-sm-6 thumb">
                            <img src="{{ url("img/img-lazy-loading.gif") }}" class="zoom img-fluid"  alt="Loading">
                        </div>
                        <div class="col-md-4 col-sm-6 thumb">
                            <img src="{{ url("img/img-lazy-loading.gif") }}" class="zoom img-fluid"  alt="Loading">
                        </div>
                    `);
                },
                success: function (data) {
                    $("#gallery").html(``);
                    console.log('tes')
                    if (data.length > 0) {
                        $.each(data, function(index,result){
                            if (result.jenis == 1) {
                                $("#gallery").append(`
                                    <div class="col-md-4 col-sm-6 thumb">
                                        <a href="${result.gambar}" data-fancybox="images">
                                            <img src="${result.gambar}" class="zoom img-fluid"  alt="${result.caption}">
                                        </a>
                                    </div>
                                `);
                            } else {
                                $("#gallery").append(`
                                    <div class="col-lg-4 col-md-6 mb-3 animate-zoom">
                                        <a href="https://www.youtube.com/watch?v=${result.id}" data-fancybox="images" data-caption="${result.caption}">
                                            <img src="${result.gambar}" class="zoom img-fluid"  alt="${result.caption}">
                                        </a>
                                    </div>
                                `);
                            }
                        });
                    } else {
                        $("#gallery").append(`
                            <div class="col">
                                <div class="card shadow">
                                    <div class="card-body text-center">
                                        <h4>Data belum tersedia</h4>
                                    </div>
                                </div>
                            </div>
                        `);
                    }
                }
            });
        });
    </script>
</body>
</html>
