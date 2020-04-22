@extends('layouts.master')
@section('content')

<div class="container pt-5 text-center">
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-4 heading-section ftco-animate">
            <span class="subheading">Struktur Organisasi</span>
            <h2 class="mb-4">PENGURUS UKMK ETALASE</h2>
            <p>Berikut adalah susunan kepengurusan UKMK Etalase periode 2019 - 2020 </p>
        </div>
    </div>
    <div class="row ftco-animate">
        <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
                @foreach ($structures as $structure)

                <div class="item">
                    <div class="testimony-wrap p-4 pb-5">
                        <div class="user-img mb-4"
                            style="background-image:url({{ $structure->image == "noimage.jpg" ? asset('noimage.jpg') : asset('img/anggota/'.$structure->image) }})">
                            <span class="quote d-flex align-items-center justify-content-center">
                                <i class="icon-quote-left"></i>
                            </span>
                        </div>
                        <div class="text">
                            <p class="mb-5 pl-4 line">{{$structure->jabatan}}</p>
                            <div class="pl-5">
                                <p class="name">{{$structure->nama}}</p>
                                <span class="position">{{$structure->NIA}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
