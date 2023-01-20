@extends('index')
@section('title','Data APD')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h4 class="m-0 text-center font-weight-bold text-primary">Data APD Kegiatan</h6>
        </div>

        <div class="card-body">
            <button type="button" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#apdbaru">
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
                        <th align="center">ID APD</th>
                        <th align="center">Nama APD</th>
                        <th align="center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($apd as $index=>$a)
                    <tr align="center">
                        <td scope="row">{{ $index + $apd->firstItem() }}</td>
                        <td>{{$a->idapd}}</td>
                        <td>{{$a->namaapd}}</td>
                        <td>
                            <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#apdedit{{$a->idapd}}">
                                <span class="icon text-black-50">
                                    <i class="fa fa-pencil-square-o"></i>
                                </span>
                                <span class="text text-dark text-bold">EDIT</span>
                            </button>
                            <form action="/apd/{{ $a->idapd }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus {{$a->namaapd}}?')">
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
<!--Modal APD Ubah-->
@foreach ($apd as $a)
<div class="modal fade" id="apdedit{{$a->idapd}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah APD</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/apd/{{$a->idapd}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="nmapd" class="col-sm-4 col-form-label">Nama APD</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="namaapd" value="{{$a->namaapd}}">
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
<!--Modal APD Baru-->
<div class="modal fade" id="apdbaru">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah APD</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/apd" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="nmapd" class="col-sm-4 col-form-label">Nama APD</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nmapd" name="namaapd">
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