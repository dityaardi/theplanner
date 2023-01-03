@extends('index')
@section('title','Data Kegiatan Non Diklat')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h4 class="m-0 text-center font-weight-bold text-primary">Data Kegiatan Non Diklat</h6>
        </div>

        <div class="card-body">
            <button type="button" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#nondikbaru">
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
                        <th align="center">ID Diklat</th>
                        <th align="center">Jenis Diklat</th>
                        <th align="center">Nama Kegiatan</th>
                        <th align="center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($nondik as $index=>$nd)
                    <tr align="center">
                        <td scope="row">{{ $index + $nondik->firstItem() }}</td>
                        <td>{{$nd->idnondiklat}}</td>
                        <td>{{$nd->jenisprogram->jenisprogram}}</td>
                        <td>{{$nd->namadiklat}}</td>
                        <td>
                            <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#nondikedit{{$nd->idnondiklat}}">
                                <span class="icon text-black-50">
                                    <i class="fa fa-pencil-square-o"></i>
                                </span>
                                <span class="text text-dark text-bold">EDIT</span>
                            </button>
                            <form action="/jen-keg-non-diklat/{{$nd->idnondiklat}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus {{$nd->namadiklat}}?')">
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
            {{$nondik->links()}}
        </div>

    </div>
</div>
<!--Modal Non Diklat Ubah-->
@foreach ($nondik as $nd)
<div class="modal fade" id="nondikedit{{$nd->idnondiklat}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Nama Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jen-keg-non-diklat/{{$nd->idnondiklat}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="nmnondiklat" class="col-sm-4 col-form-label">Nama APD</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="{{$nd->idnondiklat}}" name="namadiklat" value="{{$nd->namadiklat}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="ubahapd" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--Modal Non Diklat Baru-->
<div class="modal fade" id="nondikbaru">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kegiatan Non Diklat</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jen-keg-non-diklat" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="nmjenprog" class="col-sm-4 col-form-label">Jenis Program</label>
                        <div class="col-sm-8">
                            <select class="form-select col-sm-12" name="idjenisprogram" style="height: 40px;">
                                @foreach ($opjenprog as $jp2)
                                <option value="{{$jp2->idjenisprogram}}">{{$jp2->jenisprogram}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nmkegiatan" class="col-sm-4 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nmkegiatan" name="namadiklat">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tembahapd" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection