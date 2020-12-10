@extends('layouts.base-admin')

@section('title')
Anggota
@endsection

@section('styles')
<style>
    .pagination{
        justify-content: center;
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
                    <i class="pe-7s-users"> </i>
                </div>
                <div>Anggota
                    <div class="page-title-subheading">This is an Anggota of UKMK Etalase</div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a href="{{ route('anggota.create') }}" class="btn-shadow btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Tambah
                    </a>
                    <a href="#import" data-toggle="modal" class="btn-shadow btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-print fa-w-20"></i>
                        </span>
                        Import
                    </a>
                    <a href="{{ route('anggota.export') }}" class="btn-shadow btn btn-success">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-file-export fa-w-20"></i>
                        </span>
                        Export
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

    <div class="card">
        <div class="card-body">
            <form class="mb-3" action="{{ URL::current() }}" method="GET">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="Cari ...." type="search" name="cari" value="{{ request('cari') }}">
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
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
                                <td class="text-center" width="150px"><a href="{{ route('anggota.show', $item) }}">{{ $item->nia }}</a></td>
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
<!-- /.container-fluid -->
@endsection

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="import" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-import">Import .xlsx</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route("anggota.import") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input accept=".xlsx" type="file" name="xlsx" class="form-control" placeholder="Masukkan File Excel">
                    <div class="mt-5 d-flex justify-content-between">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
