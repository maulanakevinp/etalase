@extends('layouts.base-admin')

@section('title')
    Profile
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-camera icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>Profile
                    <div class="page-title-subheading">This is an Profile of UKMK Etalase</div>
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
            <h5 class="card-title">Profile</h5>
            <form method="post" action="{{ route('profile.update', $profile) }}" enctype="multipart/form-data">
                @csrf @method('patch')
                <div class="form-row">
                    <div class="col-md-2 text-center">
                        <div class="position-relative form-group">
                            <span>Logo</span>
                            <img id="img-logo" class="mw-100 img-thumbnail" src="{{ asset(Storage::url($profile->logo)) }}" alt="">
                            <input name="logo" id="input-logo" type="file" style="display: none">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="position-relative row form-group">
                            <label for="judul" class="offset-sm-1 col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input name="judul" id="judul" placeholder="Masukkan Judul ..." type="text" class="form-control" value="{{ old('judul',$profile->judul) }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="email" class="offset-sm-1 col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input name="email" id="email" placeholder="Masukkan email ..." type="text" class="form-control" value="{{ old('email',$profile->email) }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="kontak" class="offset-sm-1 col-sm-2 col-form-label">Kontak</label>
                            <div class="col-sm-9">
                                <input name="kontak" id="kontak" placeholder="Masukkan kontak ..." type="text" class="form-control" value="{{ old('kontak',$profile->kontak) }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="website" class="offset-sm-1 col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-9">
                                <input name="website" id="website" placeholder="Masukkan website ..." type="text" class="form-control" value="{{ old('website',$profile->website) }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="instagram" class="offset-sm-1 col-sm-2 col-form-label">Instagram</label>
                            <div class="col-sm-9">
                                <input name="instagram" id="instagram" placeholder="Masukkan instagram ..." type="text" class="form-control" value="{{ old('instagram',$profile->instagram) }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="facebook" class="offset-sm-1 col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-9">
                                <input name="facebook" id="facebook" placeholder="Masukkan facebook ..." type="text" class="form-control" value="{{ old('facebook',$profile->facebook) }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="twitter" class="offset-sm-1 col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-9">
                                <input name="twitter" id="twitter" placeholder="Masukkan twitter ..." type="text" class="form-control" value="{{ old('twitter',$profile->twitter) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="alamat" class="">Alamat</label>
                    <input name="alamat" id="alamat" placeholder="Masukkan Alamat ..." type="text" class="form-control" value="{{ old('alamat',$profile->alamat) }}">
                </div>
                <div class="position-relative form-group">
                    <label for="deskripsi" class="">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $profile->deskripsi) }}</textarea>
                </div>
                <div class="position-relative form-group">
                    <label for="sejarah" class="">Sejarah</label>
                    <textarea name="sejarah" id="sejarah" class="form-control" rows="3">{{ old('sejarah', $profile->sejarah) }}</textarea>
                </div>
                <button class="mt-2 btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const imgAvatar = document.getElementById("img-logo");
        const inputAvatar = document.getElementById("input-logo");
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
