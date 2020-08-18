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
                    <a href="#video-modal" data-toggle="modal" class="btn btn-primary"><i class="fas fa-video mr-2"></i> Pengaturan Video</a>
                    <button type="button" data-toggle="modal" data-target="#newImageModal" class="btn-shadow btn btn-info">
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

    <div id="gallery" class="row">
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <form class="d-inline" action="{{ route("video.store") }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> Sync</button>
                </form>
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/snapshot/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script>

    Dropzone.options.dropzoneForm = {
        autoProcessQueue: false,
        parallelUploads: 10,
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
                }
                location.reload();
            });
        }
    };

    $(document).ready(function(){
        $.get("{{ route('gallery.load') }}", function (data) {
            if (data.length > 0) {
                $.each(data, function(index,result){
                    if (result.jenis == 1) {
                        $("#gallery").append(`
                            <div class="col-md-4 col-sm-6 thumb">
                                <a href="${result.gambar}" data-fancybox="images">
                                    <img src="${result.gambar}" class="zoom img-fluid"  alt="${result.caption}">
                                </a>
                                <form class="mb-0" action="{{ url('images') }}/${result.id}" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <button type="submit" title="Hapus" class="btn btn-danger hapus" onclick="return confirm('Apakah anda yakin ingin menghapus foto ini? ');" style="position: absolute; top: 0; right: 15px;"><i class="fas fa-trash"></i></button>
                                </form>
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
        });
    });
</script>
@endpush
