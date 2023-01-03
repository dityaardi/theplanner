@extends('index')
@section('title','Home')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="card card-shadow card-bordered">
        <div class="card-header" style="background-color: #297bbf;">
            <h4 class="text-center text-white">Progress Validasi Kegiatan</h4>
        </div>
        <div class="card-body">
            <div class="progress_area">
                <h5 class="header-title">Total Progress : 10 Kegiatan</h5>
                <div class="progress" style="height: 20px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">2 Kegiatan</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">5 Kegiatan</div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">3 Kegiatan</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-shadow card-bordered mt-5">
        <div class="card-header" style="background-color: #297bbf;">
            <h4 class="text-center text-white">Daftar Rencana Kegiatan</h4>
        </div>
        <div class="card-body">
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-bordered border-dark table-hover progress-table text-center">
                        <thead class="text-uppercase table-primary">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Deskripsi Kegiatan</th>
                                <th scope="col">Diajukan oleh</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Status Validasi</th>
                                <th scope="col">Detail Kegiatan</th>
                                <th scope="col">Print PDF</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            @foreach($kegiatan as $index=>$keg)
                            <tr>
                                <th scope="row">{{ $index + $kegiatan->firstItem() }}</th>
                                <td>{{$keg->namakegiatan}}</td>
                                <td>{{$keg->deskripsikegiatan}}</td>
                                <td>Pak Agus Suratna</td>
                                <td>{{$keg->created_at}}</td>
                                <td>
                                    @if($keg->status=='menunggu')
                                    <span class="status-p bg-warning">Menunggu</span>
                                    @elseif($keg->status=='diterima')
                                    <span class="status-p bg-success">Diterima</span>
                                    @else
                                    <span class="status-p bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td><a href="/detail-rencana-kegiatan/{{$keg->idkegiatan}}"><u>Detail</u></a></td>
                                <td><a target="_blank" href="/cetak-kegiatan/{{$keg->idkegiatan}}"><u>Cetak</u></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer card-bordered-top">
            <a href="/tambah-kegiatan">
                <button type="button" class="btn btn-rounded btn-block btn-primary container">Tambah Rencana Kegiatan</button>
            </a>
        </div>
    </div>

    <div class="card card-shadow card-bordered mt-5">
        <div class="card-header" style="background-color: #297bbf;">
            <h4 class="text-center text-white">Daftar Rencana Belanja Barang</h4>
        </div>
        <div class="card-body card-primary">
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-bordered border-dark table-hover progress-table text-center">
                        <thead class="text-uppercase table-primary">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Deskripsi Kegiatan</th>
                                <th scope="col">Diajukan oleh</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Status Validasi</th>
                                <th scope="col">Detail Kegiatan</th>
                                <th scope="col">Print PDF</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            @foreach($belanja as $index=>$bel)
                            <tr>
                                <th scope="row">{{ $index + $belanja->firstItem() }}</th>
                                <td>{{$bel->namakegiatanbb}}</td>
                                <td>{{$bel->deskripsiprogrambb}}</td>
                                <td>Pak Agus Suratna</td>
                                <td>{{$bel->created_at}}</td>
                                <td>
                                    @if($bel->status=='menunggu')
                                    <span class="status-p bg-warning">Menunggu</span>
                                    @elseif($bel->status=='diterima')
                                    <span class="status-p bg-success">Diterima</span>
                                    @else
                                    <span class="status-p bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td><a href="/detail-rencana-belanja/{{$bel->idbelanjabarang}}"><u>Detail</u></a></td>
                                <td><a target="_blank" href="/cetak-rencana-belanja/{{$bel->idbelanjabarang}}"><u>Cetak</u></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer card-bordered-top">
            <a href="/tambah-rencana-belanja">
                <button type="button" class="btn btn-rounded btn-block btn-primary container">Tambah Rencana Belanja</button>
            </a>
        </div>
    </div>
</div>
@endsection