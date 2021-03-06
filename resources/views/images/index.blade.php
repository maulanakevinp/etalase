@extends('layouts.base-admin')

@section('title')
Images
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<script src="{{ asset('js/dropzone.js') }}"></script>

<style>
    .hapus{
        position: absolute;
        top: 25;
        right: 25;
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
    #check-all{
        -ms-transform: scale(2); /* IE */
        -moz-transform: scale(2); /* FF */
        -webkit-transform: scale(2); /* Safari and Chrome */
        -o-transform: scale(2); /* Opera */
        transform: scale(1.5);
    }
</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-camera icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>Gallery
                    <div class="page-title-subheading">This is an Gallery of UKMK Etalase</div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <input type="checkbox" id="check-all" class="mb-2" title="centang untuk menghapus semua">
                    <button type="button" id="delete-check" class="btn btn-danger mb-2"><i class="fas fa-trash"></i> Hapus</button>
                    <button type="button" id="refresh" class="btn btn-success mb-2"><i class="fas fa-sync"></i> Refresh</button>
                    <a href="#video-modal" data-toggle="modal" class="btn btn-primary mb-2"><i class="fas fa-video mr-2 "></i> Pengaturan Video</a>
                    <button type="button" data-toggle="modal" data-target="#newImageModal" class="btn-shadow btn btn-info mb-2">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification -->
    <div class="row">
        <div class="col-lg">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('failed') }}
                </div>
            @endif
        </div>
    </div>
    @if ($errors->any())<div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif

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
<!-- /.container-fluid -->
@endsection

<div class="modal fade" id="newImageModal" tabindex="-1" role="dialog" aria-labelledby="newImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newImageModalLabel">Tambah Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route("images.store") }}" class="dropzone dz-clickable" id="dropzoneForm">
                    @csrf
                    <div class="dz-default dz-message"><span class="h3 mb-0 text-primary">Click or drop files here to upload - max file size is 2mb</span></div>
                </form>
                <small>Sistem hanya bisa memproses 10 file per upload</small>
                <div class="text-center mt-3">
                    <button type="button" class="btn btn-success" id="submit-all">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="video-modal" tabindex="-1" role="dialog" aria-labelledby="video-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-delete">Pengaturan Video</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body pt-0">
                <form class="d-inline" action="{{ route("video.update") }}" method="POST" >
                    @csrf @method('patch')
                    <div class="form-group">
                        <label class="form-control-label">Channel ID Youtube</label>
                        <input type="text" name="channel_id" id="channel_id" class="form-control" value="{{ \App\Profile::find(1)->channel_id }}">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync"></i> Update</button>
                </form>
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>

<form class="delete-image" action="" method="POST">
    @csrf @method('delete')
</form>

@push('scripts')
<script src="{{ asset('assets/snapshot/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script>
    let page = 1;
    let dataExists = true;

    Dropzone.options.dropzoneForm = {
        autoProcessQueue: false,
        parallelUploads: 10,
        maxFiles: 10,
        maxFilesize: 2,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        dictRemoveFile: 'Remove file',
        dictFileTooBig: 'Image is larger than 2MB',
        init: function() {
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;

            submitButton.addEventListener("click", function(){
                myDropzone.processQueue();
            });

            // Execute when file uploads are complete
            this.on("complete", function() {
            // If all files have been uploaded
                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                {
                    var _this = this;
                    // Remove all files
                    _this.removeAllFiles();
                    $.get("{{ route('gallery-update') }}", function (response) {
                        if (response.success) {
                            page = 1;
                            dataExists = true;
                            $("#gallery").html("");
                            load_more(page);
                        }
                    })
                }
            });
        }
    };

    $(document).on("click", "#refresh", function () {
        $.get("{{ route('gallery-update') }}", function (response) {
            if (response.success) {
                page = 1;
                dataExists = true;
                $("#gallery").html("");
                load_more(page);
            }
        })
    })

    load_more(page);

    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled from top to bottom of the page
            if (dataExists) {
                page++; //page number increment
                load_more(page); //load content
            }
        }
    });

    $(document).on("click", "#delete-check", function (){
        let id = [];
        let btn = this;

        $(".gambar-check").each(function () {
            if (this.checked) {
                id.push(this.value);
            }
        });

        if (id.length > 0) {
            if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                $.ajax({
                    url     : "{{ url('/delete-images')}}",
                    method  : "delete",
                    data : {
                        _token  : "{{ csrf_token() }}",
                        id      : id
                    },
                    beforeSend : function () {
                        $(btn).html("Loading ...");
                        $(btn).attr("disabled", "disabled");
                    },
                    success : function (response) {
                        if (response.success) {
                            location.reload();
                        }
                    }
                })
            }
        }
    });

    $(document).on("click", "#check-all", function(){
        if (this.checked) {
            $(".gambar-check").prop('checked',true);
        } else {
            $(".gambar-check").prop('checked',false);
        }
    });

    $(document).on('click','.hapus', function() {
        $('.delete-image').attr('action', "{{ url('delete-image') }}/" + $(this).data('id'));
        if(confirm('Apakah anda yakin ingin menghapus foto ini? ')){
            $('.delete-image').submit();
        };
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
                    showNothing();
                }

                $.each(response.data, function(index,result){
                    if (result.jenis == 1) {
                        showImage(result);
                    } else {
                        showVideo(result);
                    }
                });
            }
        });
    }

    function showImage(result){
        $("#gallery").append(`
            <div class="col-lg-4 col-md-6 mb-3">
                <a href="${result.gambar}" data-fancybox="images">
                    <img src="${result.gambar}" class="zoom img-fluid" alt="${result.caption}">
                </a>
                <input type="checkbox" class="gambar-check" name="delete[]" title="centang untuk menghapus beberapa gambar" value="${result.gallery_id}" style="transform:scale(1.5);position: absolute; top: 5; left: 20px;">
                <button type="button" data-id="${result.gallery_id}" title="Hapus" class="btn btn-danger hapus" style="position: absolute; top: 0; right: 15px;"><i class="fas fa-trash"></i></button>
            </div>
        `);
    }

    function showVideo(result) {
        $("#gallery").append(`
            <div class="col-lg-4 col-md-6 mb-3">
                <a href="https://www.youtube.com/watch?v=${result.gallery_id}" data-fancybox="images" data-caption="${result.caption}">
                    <img src="${result.gambar}" class="zoom img-fluid" alt="${result.caption}">
                </a>
            </div>
        `);
    }

    function showNothing(){
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
</script>
@endpush
