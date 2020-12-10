@extends('layouts.base-admin')

@section('title')
    Detail anggota
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}">
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users"> </i>
                </div>
                <div>Anggota
                    <div class="page-title-subheading">This is an anggota of UKMK Etalase</div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('anggota.index') }}" class="btn-shadow btn btn-info">
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
            <h5 class="card-title">Detail anggota</h5>
            <form method="post" action="{{ route('anggota.update', $anggota) }}" enctype="multipart/form-data">
                @csrf @method('patch')
                <div class="form-row">
                    <div class="col-md-2 text-center">
                        <div class="position-relative form-group">
                            <span>Foto</span>
                            <a href="{{ asset(Storage::url($anggota->foto)) }}" data-fancybox data-caption="{{ $anggota->nama }}">
                                <img title="detail image" id="img-image" class="mw-100 img-thumbnail" src="{{ asset(Storage::url($anggota->foto)) }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="position-relative row form-group">
                            <label for="nia" class="offset-sm-1 col-sm-2 col-form-label">NIA</label>
                            <div class="col-sm-9">
                                <input disabled id="nia" type="text" class="form-control" value="{{ $anggota->nia }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="nama" class="offset-sm-1 col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input disabled id="nama" type="text" class="form-control" value="{{ $anggota->nama }}">
                            </div>
                        </div>
                        <div class="position-relative row form-group">
                            <label for="nim" class="offset-sm-1 col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input disabled id="nim" type="text" class="form-control" value="{{ $anggota->nim }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <a class="btn btn-primary" href="{{ route('anggota.edit', $anggota) }}">Ubah</a>
                    <form class="d-inline-block" action="{{ route('anggota.destroy', $anggota) }}" method="post">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus anggota ini?')">Hapus</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection

<div class="modal fade" id="displayImageModal" tabindex="-1" role="dialog" aria-labelledby="displayImageModalLabel" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="text-white h1">&times;</span>
    </button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img class="mw-100" id="imageDisplay" src="">
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('assets/snapshot/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
@endpush
