@extends('index')
@section('title','Data Jenis Moda Pengadaan')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h4 class="m-0 text-center font-weight-bold text-primary">Data Jenis Moda Pengadaan</h6>
        </div>

        <div class="card-body">
            <button type="button" class="btn btn-sm btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#modabaru">
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
                        <th align="center">ID Jenis Moda Pengadaan</th>
                        <th align="center">Nama Jenis Moda Pengadaan</th>
                        <th align="center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pengadaan as $index=>$png)
                    <tr align="center">
                        <td scope="row">{{ $index + $pengadaan->firstItem() }}</td>
                        <td>{{$png->idmodapengadaan}}</td>
                        <td>{{$png->jenismodapengadaan}}</td>
                        <td>
                            <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#pengadaanedit{{$png->idmodapengadaan}}">
                                <span class="icon text-black-50">
                                    <i class="fa fa-pencil-square-o"></i>
                                </span>
                                <span class="text text-dark text-bold">EDIT</span>
                            </button>
                            <form action="/jenis-pengadaan/{{$png->idmodapengadaan}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus {{$png->jenismodapengadaan}}?')">
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
@foreach ($pengadaan as $png)
<div class="modal fade" id="pengadaanedit{{$png->idmodapengadaan}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Jenis Moda Pengadaan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-pengadaan/{{$png->idmodapengadaan}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="nmpengadaan" class="col-sm-4 col-form-label">Nama Jenis Moda Pengadaan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="{{$png->idmodapengadaan}}" name="jenismodapengadaan" value="{{$png->jenismodapengadaan}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="ubahpengadaan" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!--Modal Jenis Program Baru-->
<div class="modal fade" id="modabaru">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Moda Pengadaan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="/jenis-pengadaan" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="nmpengadaan" class="col-sm-4 col-form-label">Nama Jenis Moda Pengadaan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nmpengadaan" name="jenismodapengadaan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tembahpengadaan" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection