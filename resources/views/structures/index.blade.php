@extends('layouts.base-admin')

@section('title')
Structures
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-vector"> </i>
                </div>
                <div>Structures
                    <div class="page-title-subheading">This is an Strucutures of UKMK Etalase</div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('structures.create') }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Tambah
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

    <div class="row">
        @foreach ($structures as $structure)
        <div class="col-md-4 mt-5 mb-5">
            <a href="{{ route('structures.show', $structure) }}" class="card-link">
                <div class="testimony-wrap p-4 pb-5">
                    <div class="user-img mb-4" style="background-image:url('{{ asset(Storage::url($structure->image)) }}')">
                    <span class="quote d-flex align-items-center justify-content-center">
                            <i class="icon-quote-left"></i>
                        </span>
                    </div>
                    <div class="text">
                        <p class="mb-5 pl-4 line">{{$structure->jabatan}}</p>
                        <div class="pl-5">
                            <p class="name">{{$structure->nama}}</p>
                            <span class="position">{{$structure->nia}}</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('styles')
<link rel="stylesheet" href="{{ url('/') }}/assets/snapshot/css/icomoon.css">

    <style>
        .testimony-wrap {
            display: block;
            position: relative;
            background: #202224;
        }

        .testimony-wrap .user-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            position: relative;
            margin-top: -75px;
            margin-left: 40px;
        }

        .testimony-wrap .user-img .quote {
            position: absolute;
            bottom: -10px;
            right: 0;
            width: 40px;
            height: 40px;
            background: #fff;
            border-radius: 50%;
        }

        .testimony-wrap .user-img .quote i {
            color: #9d8f8f;
        }

        .testimony-wrap .name {
            font-weight: 400;
            font-size: 16px;
            margin-bottom: 0;
            color: #fff;
        }

        .testimony-wrap .position {
            font-size: 14px;
            color: #9d8f8f;
        }

        .testimony-wrap .line {
            position: relative;
            border-left: 1px solid #4d4d4d;
        }

        .testimony-wrap .line:after {
            position: absolute;
            top: 50%;
            left: -2px;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            content: '';
            width: 3px;
            height: 30px;
            background: #9d8f8f;
        }

        .testimony-wrap .text p {
            font-family: "Noto Serif", serif;
            font-size: 16px;
            font-style: italic;
            color: #fff;
        }

        .user-img {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

    </style>
@endsection
