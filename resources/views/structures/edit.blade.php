@extends('layouts.base-admin')

@section('title')
    Ubah structure
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
                    <div class="page-title-subheading">This is an tructure of UKMK Etalase</div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('structures.show', $structure) }}" class="btn-shadow btn btn-info">
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
            <h5 class="card-title">Ubah structure</h5>
            <form method="post" action="{{ route('structures.update', $structure) }}" enctype="multipart/form-data">
                @csrf @method('patch')
                <div class="form-row">
                    <div class="col-md-2 text-center">
                        <div class="position-relative form-group">
                            <span>Image</span>
                            <img title="upload image" id="img-image" class="mw-100 img-thumbnail" src="{{ asset(Storage::url($structure->image)) }}" alt="">
                            <input name="image" id="input-image" type="file" style="display: none">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="position-relative row form-group">
                            <label for="nia" class="offset-sm-1 col-sm-2 col-form-label">NIA</label>
                            <div class="col-sm-9">
                                <input name="nia" id="nia" placeholder="Masukkan nia ..." type="text" class="form-control" value="{{ old('nia',$structure->nia) }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="nama" class="offset-sm-1 col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input name="nama" id="nama" placeholder="Masukkan nama ..." type="text" class="form-control" value="{{ old('nama',$structure->nama) }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="jabatan" class="offset-sm-1 col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <input name="jabatan" id="jabatan" placeholder="Masukkan jabatan ..." type="text" class="form-control" value="{{ old('jabatan',$structure->jabatan) }}">
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

@push('scripts')
    <script>
        const imgAvatar = document.getElementById("img-image");
        const inputAvatar = document.getElementById("input-image");
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
    </script>
@endpush
