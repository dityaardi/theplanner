@extends('index')
@section('title','Data Jenis Program')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h4 class="m-0 text-center font-weight-bold text-primary">Data Jenis Program</h6>
        </div>

        <div class="card-body">
            <button type="button" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#jenprogbaru">
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
                        <th align="center">ID Jenis Program</th>
                        <th align="center">Nama Jenis Program</th>
                        <th align="center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($jenprog as $index=>$jp)
                    <tr align="center">
                        <td scope="row">{{ $index + $jenprog->firstItem() }}</td>
                        <td>{{$jp->idjenisprogram}}</td>
                        <td>{{$jp->jenisprogram}}</td>
                        <td>
                            <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#jenprogedit{{$jp->idjenisprogram}}">
                                <span class="icon text-black-50">
                                    <i class="fa fa-pencil-square-o"></i>
                                </span>
                                <span class="text text-dark text-bold">EDIT</span>
                            </button>
                            <form action="/jenis-program/{{$jp->idjenisprogram}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus {{$jp->jenisprogram}}?')">
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
        </div>

    </div>
</div>
<!--Modal Jenis Program Ubah-->
@foreach ($jenprog as $jp)
<div class="modal fade" id="jenprogedit{{$jp->idjenisprogram}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Jenis Program</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-program/{{$jp->idjenisprogram}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="nmjenprog" class="col-sm-4 col-form-label">Nama Jenis Program</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="{{$jp->idjenisprogam}}" name="jenisprogram" value="{{$jp->jenisprogram}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="ubahjenprog" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--Modal Jenis Program Baru-->
<div class="modal fade" id="jenprogbaru">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Program</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-program" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="nmjenprog" class="col-sm-4 col-form-label">Nama Jenis Program</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nmjenprog" name="jenisprogram">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tembahjenprog" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection