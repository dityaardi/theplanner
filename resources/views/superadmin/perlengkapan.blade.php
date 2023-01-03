@extends('index')
@section('title','Data Perlengkapan')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h4 class="m-0 text-center font-weight-bold text-primary">Data Jenis Perlengkapan</h6>
        </div>

        <div class="card-body">
            <button type="button" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#perlengkapanbaru">
                <span class="icon text-white-50">
                    <i class="fa fa-plus-square-o"></i>
                </span>
                <span class="text text-bold">Tambah Data</span>
            </button>
            <div class="search-box pull-right">
                    <form action="#">
                        <input type="text" name="search" placeholder="Search..." required>
                        <i class="ti-search"></i>
                    </form>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-bold text-center table-secondary">
                        <th align="center">No</th>
                        <th align="center">ID Perlengkapan</th>
                        <th align="center">Nama Perlengkapan</th>
                        <th align="center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($perlengkapan as $index=>$pr)
                    <tr align="center">
                        <td scope="row">{{ $index + $perlengkapan->firstItem() }}</td>
                        <td>{{$pr->idperlengkapan}}</td>
                        <td>{{$pr->namaperlengkapan}}</td>
                        <td>
                            <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#perlengkapanedit{{$pr->idperlengkapan}}">
                                <span class="icon text-black-50">
                                    <i class="fa fa-pencil-square-o"></i>
                                </span>
                                <span class="text text-dark text-bold">EDIT</span>
                            </button>
                            <form action="/jenis-perlengkapan/{{$pr->idperlengkapan}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus {{$pr->namaperlengkapan}}?')">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-trash-o"></i>
                                    </span>
                                    <span class="text text-bold">DELETE</span>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$perlengkapan->links()}}
        </div>

    </div>
</div>
<!--Modal Perlengkapan Ubah-->
@foreach ($perlengkapan as $pr)
<div class="modal fade" id="perlengkapanedit{{$pr->idperlengkapan}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Perlengkapan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-perlengkapan/{{$pr->idperlengkapan}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="nmperlengkapan" class="col-sm-4 col-form-label">Nama Perlengkapan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="{{$pr->idperlengkapan}}" name="namaperlengkapan" value="{{$pr->namaperlengkapan}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="ubahperlengkapan" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--Modal Perlengkapan Baru-->
<div class="modal fade" id="perlengkapanbaru">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Perlengkapan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-perlengkapan" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="nmperlengkapan" class="col-sm-4 col-form-label">Nama Perlengkapan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nmperlengkapan" name="namaperlengkapan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tembahperlengkapan" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection