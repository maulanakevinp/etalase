@extends('layouts.base-admin')

@section('title')
    Tambah Art
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-vector icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>Structure
                    <div class="page-title-subheading">This is an arts of UKMK Etalase</div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('structures.index') }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-arrow-left fa-w-20"></i>
                        </span>
                        Kembali
                    </a>
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

    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Tambah art</h5>
            <form method="post" action="{{ route('arts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-2 text-center">
                        <div class="position-relative form-group">
                            <span>Image</span>
                            <img id="img-image" class="mw-100 img-thumbnail" src="{{ asset('img/plus-img.png') }}" alt="">
                            <input name="gambar" id="input-image" type="file" style="display: none">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="position-relative row form-group">
                            <label for="nama" class="offset-sm-1 col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input name="nama" id="nama" placeholder="Masukkan nama ..." type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="ikon" class="offset-sm-1 col-sm-2 col-form-label">Ikon</label>
                            <div class="col-sm-8">
                                <input name="ikon" id="ikon" placeholder="Masukkan ikon ..." type="text" class="form-control @error('ikon') is-invalid @enderror" value="{{ old('ikon') }}">
                                @error('ikon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-1 h2">
                                <span id="display-ikon" class=""></span>
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="jabatan" class="offset-sm-1 col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button class="mt-2 btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/flaticonBidang.css">
@endsection

@push('scripts')
    <script>
        const imgAvatar = document.getElementById("img-image");
        const inputAvatar = document.getElementById("input-image");
        const inputIcon = document.getElementById("ikon");
        const displayIcon = document.getElementById('display-ikon');
        imgAvatar.onmouseenter = function(){
            this.style.opacity = "0.5";
            this.style.cursor = 'pointer';
        }
        imgAvatar.onmouseleave = function(){
            this.style.opacity = "1";
            this.style.cursor = 'default';
        }
        imgAvatar.onclick = function () {
            inputAvatar.click();
        };

        inputAvatar.onchange = function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    imgAvatar.src = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
            }
        };

        inputIcon.addEventListener("keyup", function(e){
            displayIcon.className = inputIcon.value;
        });

    </script>
@endpush
