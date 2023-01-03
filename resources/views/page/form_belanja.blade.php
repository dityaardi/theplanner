@extends('index')
@section('title','Form Rencana Belanja')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="d-grid gap-2 d-md-flex mb-3">
        <a href="/home" class="btn btn-sm btn-danger">< Kembali</a>
    </div>
    <div class="card card-shadow card-bordered">
        <div class="card-header">
            <h4>Form Rencana Belanja</h4>
        </div>
        <div class="card-body">
            <form action="/tambah-rencana-belanja" method="post">
                @csrf
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <label for="jp" class="col-sm-4 col-form-label">Jenis Barang</label>
                        <select class="form-select col-sm-7" name="idjenisbarang" style="height: 40px;">
                            <option selected>- Pilih jenis barang -</option>
                            @foreach ($jenbar as $jbr)
                            <option value="{{$jbr->idjenisbarang}}">{{$jbr->jenisbarang}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <label for="nodik" class="col-sm-4 col-form-label">Jenis Belanja</label>
                        <select class="form-select col-sm-7" name="idjenisbelanjainventaris" style="height: 40px;">
                            <option selected>- Pilih jenis belanja -</option>
                            @foreach ($inventaris as $inv)
                            <option value="{{$inv->idjenisbelanjainventaris}}">{{$inv->namajenisbelanjainventaris}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 pt-3 pb-3 row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-4 pl-4">
                        Pembiayaan
                    </div>
                    @foreach ($pembiayaan as $biaya)
                    <div class="col-auto">
                        <div class="form-check">
                            <input class="form-check-input" name="idpembiayaan[]" type="checkbox" value="{{$biaya->idpembiayaan}}" id="inlineFormCheck">
                            <label class="form-check-label" for="inlineFormCheck">
                                {{$biaya->jenispembiayaan}}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <label for="metode" class="col-sm-4 col-form-label">Moda Pengadaan</label>
                        <select class="form-select col-sm-7" name="idmodapengadaan" style="height: 40px;">
                            <option selected>- Pilih moda pengadaan -</option>
                            @foreach($pengadaan as $png)
                            <option value="{{$png->idmodapengadaan}}">{{$png->jenismodapengadaan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="mb-3 row col-sm-12">
                    <label for="namaprog" class="col-sm-4 col-form-label">1. Nama Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border border-dark" style="color:black;" name="namaprogram" placeholder=" Masukkan Nama Kegiatan">
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="namalembaga" class="col-sm-4 col-form-label">2. Lembaga Penyelenggara</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border border-dark" style="color:black;" name="namalembaga" placeholder=" Masukkan Nama Lembaga">
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="namamitra" class="col-sm-4 col-form-label">3. Lembaga Mitra Penyelenggara</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border border-dark" style="color:black;" name="namamitra" placeholder=" Masukkan Nama Mitra">
                        <small class="text-danger">*Isi bila ada</small>
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="lokasi" class="col-sm-4 col-form-label">4. Lokasi Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border border-dark" style="color:black;" name="lokasi" placeholder=" Masukkan Lokasi Kegiatan">
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="waktu" class="col-sm-4 col-form-label mt-2">5. Waktu Program/Kegiatan</label>
                    <div class="col-sm-4 mt-2 mb-3">
                        Waktu Mulai
                        <input class="form-control border border-dark date" type="date" id="waktumulai" name="tglmulaibb" onchange="cal()">
                    </div>
                    <div class="col-sm-4 mt-2 mb-3">
                        Waktu Selesai
                        <input class="form-control border border-dark date" type="date" id="waktuselesai" name="tglakhirbb" onchange="cal()">
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">6. Rincian Jasa/Barang yang akan di beli</label>
                    <table class="table table-bordered border-primary m-2">
                        <thead>
                            <tr class="text-bold text-center table-primary">
                                <th align="center">No</th>
                                <th align="center">Nama Barang/Jasa</th>
                                <th align="center">Jenis</th>
                                <th align="center">Jumlah</th>
                                <th align="center">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="text-center border table-bordered">

                        </tbody>
                    </table>
                </div>

                <!--Susunan Panitia-->
                <div class="mb-3 row col-sm-12">
                    <div class="col-sm-4 pt-2">
                        7. Susunan Panitia
                    </div>
                    <div class="row col-sm-8">
                        <label for="pengarah" class="col-sm-4 col-form-label">- Ketua</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark pnt" style="color:black;" name="jmlketua">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="penjab" class="col-sm-4 col-form-label">- Sekretaris</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark pnt" style="color:black;" name="jmlsekretaris">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="ketua" class="col-sm-4 col-form-label">- Anggota</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark pnt" style="color:black;" name="jmlanggota">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="penjabaka" class="col-sm-4 col-form-label">- Petugas Keuangan</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark pnt" style="color:black;" name="jmlpetugaskeuangan">
                        </div>
                        <p class="pt-2">Orang</p>

                    </div>

                </div>

                <hr class="sidebar-divider d-none d-md-block">
                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">8. Deskripsi Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control border border-dark" style="color:black; height: 200px;" name="deskripsiprogrambb" placeholder=" Deskripsi"></textarea>
                    </div>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">9. Tujuan Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control border border-dark" style="color:black; height: 100px;" name="tujuanprogrambb" placeholder=" Tujuan"></textarea>
                    </div>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">10. Jadwal Program/Kegiatan</label>
                    <table class="table table-bordered border-primary m-2">
                        <thead>
                            <tr class="text-bold text-center table-primary">
                                <th align="center">No</th>
                                <th align="center">Tanggal</th>
                                <th align="center">Nama Kegiatan</th>
                                <th align="center">Waktu Mulai</th>
                                <th align="center">Waktu Selesai</th>
                                <th align="center">Tempat</th>
                                <th align="center">Pengisi Acara</th>
                            </tr>
                        </thead>
                        <tbody class="text-center border table-bordered">

                        </tbody>
                    </table>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">11. Persyaratan Vendor</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control border border-dark" style="color:black; height: 200px;" name="persyaratanvendorbb" placeholder=" Persyaratan Vendor"></textarea>
                    </div>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">12. Informasi Tahapan Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control border border-dark" style="color:black; height: 200px;" name="informasitahapanprogrambb" placeholder=" Informasi Tahapan"></textarea>
                    </div>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">13. Gambar/Foto yang diperlukan untuk Publikasi</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control border border-dark" style="color:black; height: auto;" id="staticEmail" placeholder=" Tujuan">
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">14. Rincian Spesifikasi Barang/Jasa</label>
                    <table class="table table-bordered border-primary m-2">
                        <thead>
                            <tr class="text-bold text-center table-primary">
                            <th align="center">No</th>
                                <th align="center">Nama Barang/Jasa</th>
                                <th align="center">Jenis</th>
                                <th align="center">Jumlah</th>
                                <th align="center">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="text-center border table-bordered">

                        </tbody>
                    </table>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end pr-5">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection