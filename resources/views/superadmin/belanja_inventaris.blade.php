@extends('index')
@section('title','Data Belanja Inventaris')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h4 class="m-0 text-center font-weight-bold text-primary">Data Belanja Inventaris</h6>
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
                        <th align="center">ID Belanja</th>
                        <th align="center">Jenis Belanja Inventaris</th>
                        <th align="center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($belanja as $index=>$bl)
                    <tr align="center">
                        <td scope="row">{{ $index + $belanja->firstItem() }}</td>
                        <td>{{$bl->idjenisbelanjainventaris}}</td>
                        <td>{{$bl->namajenisbelanjainventaris}}</td>
                        <td>
                            <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#inventarisedit{{$bl->idjenisbelanjainventaris}}">
                                <span class="icon text-black-50">
                                    <i class="fa fa-pencil-square-o"></i>
                                </span>
                                <span class="text text-dark text-bold">EDIT</span>
                            </button>
                            <form action="/jenis-belanja-inventaris/{{$bl->idjenisbelanjainventaris}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus {{$bl->namajenisbelanjainventaris}}?')">
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
            {{$belanja->links()}}
        </div>

    </div>
</div>
<!--Modal Jenis Program Ubah-->
@foreach ($belanja as $bl)
<div class="modal fade" id="inventarisedit{{$bl->idjenisbelanjainventaris}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Nama Belanja Inventaris</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-belanja-inventaris/{{$bl->idjenisbelanjainventaris}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="nmjenbar" class="col-sm-4 col-form-label">Nama Jenis Barang Inventaris</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="{{$bl->idjenisbarang}}" name="namajenisbelanjainventaris" value="{{$bl->namajenisbelanjainventaris}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="update" class="btn btn-success">Ubah</button>
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
                <h5 class="modal-title">Tambah Jenis Belanja Inventaris</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-belanja-inventaris" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="namajenisbelanjainventaris" class="col-sm-4 col-form-label">Nama Jenis Belanja Inventaris</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="namajenisbelanjainventaris" name="namajenisbelanjainventaris">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tambahbarang" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection