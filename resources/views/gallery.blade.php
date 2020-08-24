<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Gallery UKMK Etalase UNEJ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/architectui/main.css') }}" rel="stylesheet">
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
    <div class="container mt-5">
        <div class="text-center">
            <a href="{{ url('') }}">
                <img class="mb-5" height="100px" src="{{ asset(Storage::url(\App\Profile::find(1)->logo)) }}" alt="">
            </a>
        </div>
        <div id="gallery" class="row"></div>
        <div id="loading" class="row">
            <div class="col-lg-4 col-md-6 mb-3">
                <img src="{{ url("img/img-lazy-loading.gif") }}" class="zoom img-fluid"  alt="Loading">
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <img src="{{ url("img/img-lazy-loading.gif") }}" class="zoom img-fluid"  alt="Loading">
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <img src="{{ url("img/img-lazy-loading.gif") }}" class="zoom img-fluid"  alt="Loading">
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/snapshot/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script>
        let page = 1;
        let dataExists = true;

        load_more(page);

        $(window).scroll(function() { //detect page scroll
            if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
                if (dataExists) {
                    page++; //page number increment
                    load_more(page); //load content
                }
            }
        });

        function load_more(page) {
            $.ajax({
                url: "{{ url('load-gallery') }}?page="+page,
                method: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (response) {
                    $("#loading").hide();

                    if (response.data.length == 0) {
                        dataExists = false;
                    }

                    if (page == 1 && dataExists == false) {
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

                    $.each(response.data, function(index,result){
                        if (result.jenis == 1) {
                            $("#gallery").append(`
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <a href="${result.gambar}" data-fancybox="images">
                                        <img src="${result.gambar}" class="zoom img-fluid" alt="${result.caption}">
                                    </a>
                                </div>
                            `);
                        } else {
                            $("#gallery").append(`
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <a href="https://www.youtube.com/watch?v=${result.id}" data-fancybox="images" data-caption="${result.caption}">
                                        <img src="${result.gambar}" class="zoom img-fluid" alt="${result.caption}">
                                    </a>
                                </div>
                            `);
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>
