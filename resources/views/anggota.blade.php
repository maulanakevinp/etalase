@extends('layouts.master')

@section('styles')
<style>
    .pagination{
        justify-content: center;
    }
</style>
@endsection

@section('content')
<div class="container pt-5 text-center">

    <div class="text-center">
        <a href="{{ url('') }}">
            <img class="mb-5" height="100px" src="{{ asset(Storage::url(\App\Profile::find(1)->logo)) }}" alt="">
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 heading-section ftco-animate">
            <h2 class="mb-4">Anggota UKMK ETALASE</h2>
            <p>Berikut adalah Anggota UKMK Etalase</p>
        </div>
    </div>

    <div class="card bg-dark">
        <div class="card-body">
            <form class="mb-3" action="{{ URL::current() }}" method="GET">
                <input type="hidden" name="password" value="etalase2020.web">
                <div class="form-group mb-0">
                    <input class="form-control" placeholder="Cari ...." type="search" name="cari" value="{{ request('cari') }}">
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped  text-white">
                    <thead>
                        <tr>
                            <th class="text-center" width="10px">No</th>
                            <th class="text-center" width="50px">Foto</th>
                            <th class="text-center">NIA</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggota as $item)
                            <tr>
                                <td class="text-center">{{ ($anggota->currentpage()-1) * $anggota->perpage() + $loop->index + 1 }}</td>
                                <td width="50px">
                                    <img width="42" class="rounded-circle" src="{{ asset(Storage::url($item->foto)) }}" alt="foto {{ $item->nama }}">
                                </td>
                                <td class="text-center" width="150px">{{ $item->nia }}</td>
                                <td class="text-center" width="150px">{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center">Data Belum Tersedia</td></tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $anggota->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
