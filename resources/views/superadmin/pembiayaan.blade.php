@extends('index')
@section('title','Data Jenis Pembiayaan')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h4 class="m-0 text-center font-weight-bold text-primary">Data Jenis Pembiayaan</h6>
        </div>

        <div class="card-body">
            <button type="button" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#pembiayaanbaru">
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
                        <th align="center">ID Pembiayaan</th>
                        <th align="center">Jenis Pembiayaan</th>
                        <th align="center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($biaya as $index=>$by)
                    <tr align="center">
                        <td scope="row">{{ $index + $biaya->firstItem() }}</td>
                        <td>{{$by->idpembiayaan}}</td>
                        <td>{{$by->jenispembiayaan}}</td>
                        <td>
                            <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#pembiayaanedit{{$by->idpembiayaan}}">
                                <span class="icon text-black-50">
                                    <i class="fa fa-pencil-square-o"></i>
                                </span>
                                <span class="text text-dark text-bold">EDIT</span>
                            </button>
                            <form action="/jenis-pembiayaan/{{$by->idpembiayaan}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus {{$by->jenispembiayaan}}?')">
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
        {{$biaya->links()}}

    </div>
</div>
<!--Modal Pembiayaan Ubah-->
@foreach ($biaya as $by)
<div class="modal fade" id="pembiayaanedit{{$by->idpembiayaan}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah pembiayaan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-pembiayaan/{{$by->idpembiayaan}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="nmpembiayaan" class="col-sm-4 col-form-label">Nama Pembiayaan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="{{$by->idpembiayaan}}" name="jenispembiayaan" value="{{$by->jenispembiayaan}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="ubahpembiayaan" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--Modal Pembiayaan Baru-->
<div class="modal fade" id="pembiayaanbaru">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembiayaan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-pembiayaan" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="nmpembiayaan" class="col-sm-4 col-form-label">Nama Pembiayaan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nmpembiayaan" name="jenispembiayaan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tambahpembiayaan" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection