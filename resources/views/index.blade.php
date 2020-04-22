<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="shortcut icon" href="{{ asset('logo/logo etalase.png') }}" type="image/x-icon">

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
        .green {
            background-color: #6fb936;
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
        .transition {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-title {
            color: #000;
        }
        .modal-footer {
            display: none;
        }
    </style>
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <!-- Page Content -->
    <div class="container page-top">
        <div class="row">
            @foreach ($images as $image)
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="{{ asset('img/gallery/'.$image->image) }}" class="fancybox" rel="ligthbox">
                        <img src="{{ asset('img/gallery/'.$image->image) }}" class="zoom img-fluid "  alt="{{ asset('img/gallery/'.$image->image) }}">
                    </a>
                </div>
            @endforeach
        </div>
        {{ $images->links() }}
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function () {
                $(this).addClass('transition');
            }, function () {
                $(this).removeClass('transition');
            });
        });
    </script>
</body>
</html>
