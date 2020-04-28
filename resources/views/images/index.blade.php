@extends('layouts.base-admin')

@section('title')
Images
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
                <div>Images
                    <div class="page-title-subheading">This is an Gallery of UKMK Etalase
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
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

    <div class="row">
        @foreach ($images as $image)
        <div class="col-md-6 mb-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-img-top" style="background-size: cover; height: 250px; background-image: url('{{ asset(Storage::url($image->image)) }}');" ></div>
                    <form action=" {{ route('images.update' ,['image' => $image->id]) }} " method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" aria-describedby="image">
                                <label class="custom-file-label" for="image">Pilih foto</label>
                            </div>
                            <div class="input-group-append">
                            </div>
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label>Keterangan</label>
                            <input type="text" name="text" id="text" class="form-control" value="{{ old('text', $image->text) }}">
                            {!! $errors->first('text', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                        </div> --}}
                        <button class="btn btn-success float-right" type="submit">Perbarui</button>
                    </form>
                    <form class="mb-3" action="{{ route('images.destroy' , ['image' => $image->id]) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus foto ini? ');">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $images->links() }}
</div>
<!-- /.container-fluid -->


@endsection

@push('scripts')
<script src="{{ asset('assets/snapshot/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".pagination").addClass("justify-content-center");
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#displayImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>
@endpush

<div class="modal fade" id="newImageModal" tabindex="-1" role="dialog" aria-labelledby="newImageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newImageModalLabel">Tambah Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="text-center">
                        <img class="mw-100" id="displayImage" src="" alt="">
                    </div>
                    <div class="form-group input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="image">
                            <label class="custom-file-label" for="image">Pilih gambar</label>
                        </div>
                        @error('image')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="Submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
