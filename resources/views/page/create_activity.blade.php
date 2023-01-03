@extends('index')
@section('title','Form Kegiatan')

@section('content')
<div class="col-lg-12 mt-5">
    <div class="d-grid gap-2 d-md-flex mb-3">
        <a href="/home" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin kembali?')">
            < Kembali</a>
    </div>
    <div class="card card-shadow card-bordered">
        <div class="card-header" style="background-color: #297bbf;">
            <h4 class="text-center text-white">Form Tambah Kegiatan</h4>
        </div>
        <div class="card-body">
            <form action="/tambah-kegiatan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <label for="idjenisprogram" class="col-sm-4 col-form-label">Jenis Program</label>
                        <select class="form-select col-sm-7" name="idjenisprogram" style="height: 40px;">
                            <option selected>- Pilih jenis program -</option>
                            @foreach ($jenprog as $jp)
                            <option value="{{$jp->idjenisprogram}}">{{$jp->jenisprogram}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <label for="idnondiklat" class="col-sm-4 col-form-label">Jenis Kegiatan</label>
                        <select class="form-select col-sm-7" name="idnondiklat" style="height: 40px;">
                            <option selected>- Pilih kegiatan program -</option>
                            @foreach ($nondiklat as $nodi)
                            <option value="{{$nodi->idnondiklat}}">{{$nodi->namadiklat}}</option>
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
                        <label for="metode" class="col-sm-4 col-form-label">Metode Kegiatan</label>
                        <select class="form-select col-sm-7" name="idmodakegiatan" style="height: 40px;">
                            <option selected>- Pilih metode kegiatan -</option>
                            @foreach ($moda as $moda)
                            <option value="{{$moda->idmodakegiatan}}">{{$moda->jenismodakegiatan}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 pt-3 pb-3 row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-4 pl-4">
                        Jenis Kegiatan
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="fullday" name="customRadio2" class="custom-control-input" onclick="check(1)">
                        <label class="custom-control-label" for="fullday">Fullday Meeting</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="fullboard" name="customRadio2" class="custom-control-input" onclick="check(2)">
                        <label class="custom-control-label" for="fullboard">Fullboard Meeting</label>
                    </div>
                </div>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="mb-3 row col-sm-12">
                    <label for="namakegiatan" class="col-sm-4 col-form-label">1. Nama Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border border-dark" style="color:black;" name="namakegiatan" placeholder=" Masukkan Nama Kegiatan" autocomplete="off">
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="lembagapenyelenggara" class="col-sm-4 col-form-label">2. Lembaga Penyelenggara</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border border-dark" style="color:black;" name="lembagapenyelenggara" placeholder=" Masukkan Nama Lembaga">
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="lembagamitra" class="col-sm-4 col-form-label">3. Lembaga Mitra</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border border-dark" style="color:black;" name="lembagamitra" placeholder=" Masukkan Nama Mitra">
                        <small class="text-danger">*Isi bila ada</small>
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="lokasikegiatan" class="col-sm-4 col-form-label">4. Lokasi Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control border border-dark" style="color:black;" name="lokasikegiatan" placeholder=" Masukkan Lokasi Kegiatan">
                    </div>
                </div>
                <div class="mb-3 row col-sm-12">
                    <label for="waktu" class="col-sm-4 col-form-label">5. Waktu Program/Kegiatan</label>
                    <div class="col-sm-4 mt-2 mb-3">
                        Waktu Mulai
                        <input class="form-control border border-dark date" type="date" id="waktumulai" name="tglmulai" onchange="cal()">
                    </div>
                    <div class="col-sm-4 mt-2 mb-3">
                        Waktu Selesai
                        <input class="form-control border border-dark date" type="date" id="waktuselesai" name="tglakhir" onchange="cal()">
                    </div>
                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <!--Susunan Panitia-->
                <div class="mb-3 row col-sm-12">
                    <div class="col-sm-4 pt-2">
                        6. Susunan Panitia
                    </div>
                    <div class="row col-sm-8">
                        <label for="jmlpengarah" class="col-sm-4 col-form-label">- Pengarah</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt ttl" style="color:black;" name="jmlpengarah">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="jmlpenanggungjawab" class="col-sm-4 col-form-label">- Penanggung Jawab</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt ttl" style="color:black;" name="jmlpenanggungjawab">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="jmlketua" class="col-sm-4 col-form-label">- Ketua</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt ttl" style="color:black;" name="jmlketua">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="jmlanggotapenjabakademik" class="col-sm-4 col-form-label">- Anggota Penjab Akademik</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt ttl" style="color:black;" name="jmlanggotapenjabakademik">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="jmlanggotapanitiakelas" class="col-sm-4 col-form-label">- Anggota Panitia Kelas</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt ttl" style="color:black;" name="jmlanggotapanitiakelas">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="jmladmindigital" class="col-sm-4 col-form-label">- Admin digital</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt srt ttl" style="color:black;" name="jmladmindigital">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="jmlpetugaskeuangan" class="col-sm-4 col-form-label">- Petugas Keuangan</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt ttl" style="color:black;" name="jmlpetugaskeuangan">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="jmlnotulen" class="col-sm-4 col-form-label">- Notulen</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt ttl" style="color:black;" name="jmlnotulen">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="jmlmoderator" class="col-sm-4 col-form-label">- Moderator</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt ttl" style="color:black;" name="jmlmoderator">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="jmlpanitialainnya" class="col-sm-4 col-form-label">- Lainnya</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark pnt ttl" style="color:black;" name="jmlpanitialainnya">
                        </div>
                        <p class="pt-2">Orang</p>

                    </div>

                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <!--Jumlah terlibat-->
                <div class="mb-3 row col-sm-12">
                    <div class="col-sm-4 pt-2">
                        7. Jumlah orang terlibat
                    </div>
                    <div class="row col-sm-8">
                        <label for="jmlpenceramah" class="col-sm-4 col-form-label">- Penceramah</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" name="jmlpenceramah" class="form-control border border-dark ttl" style="color:black;" id="jmlhpncrmh" onchange="penceramah()">
                        </div>
                        <p class="pt-2">Orang</p>
                        <label for="jmlpengajar" class="col-sm-4 col-form-label">- Pengajar</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" name="jmlpengajar" class="form-control border border-dark ttl srt" style="color:black;" id="jmlhpngjr" onchange="pengajar()">
                        </div>
                        <p class="pt-2">Orang</p>
                        <label for="jmlpeserta" class="col-sm-4 col-form-label">- Peserta</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" name="jmlpeserta" class="form-control border border-dark ttl srt" style="color:black;" id="staticEmail">
                        </div>
                        <p class="pt-2">Orang</p>
                        <label for="jmlpanitia" class="col-sm-4 col-form-label">- Panitia</label>
                        <div class="form-group col-sm-4">
                            <input type="number" name="jmlpanitia" class="form-control border border-dark" style="color:black; height: 40px;" id="result" value="" readonly>
                        </div>
                        <p class="pt-2">Orang</p>
                        <label for="jmlpenerjemah" class="col-sm-4 col-form-label">- Penerjemah</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" name="jmlpenerjemah" class="form-control border border-dark ttl" style="color:black;" id="jmlhpnrjmh" onchange="penerjemah()">
                        </div>
                        <p class="pt-2">Orang</p>
                        <label for="totalpanitia" class="col-sm-4 col-form-label">- Total</label>
                        <div class="form-group col-sm-4">
                            <input name="totalpanitia" class="form-control border border-dark" style="color:black; height: 40px;" id="ttlorg" value="" readonly>
                        </div>
                        <p class="pt-2">Orang</p>
                    </div>

                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="mb-3 row col-sm-12">
                    <label for="lokasi" class="col-sm-4 col-form-label">8. Nama Narasumber Es. / Penceramah</label>
                    <div class="col-sm-8" id="penceramah">

                    </div>
                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="mb-3 row col-sm-12">
                    <label for="lokasi" class="col-sm-4 col-form-label">9. Nama Narasumber / Pengajar</label>
                    <div class="col-sm-8" id="pengajar">

                    </div>
                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="mb-3 row col-sm-12">
                    <label for="lokasi" class="col-sm-4 col-form-label">10. Nama Penerjemah / Juru Bahasa Isyarat</label>
                    <div class="col-sm-8" id="penerjemah">

                    </div>
                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">11. Jumlah jam kegiatan</label>
                    <div class="d-flex flex-ro">
                        <div class="col-sm-2">
                            <input type="number" class="form-control border border-dark" style="color:black;" name="jmljamkegiatan">
                        </div>
                        <div class="pt-2">JP;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1 JP =</div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control border border-dark" style="color:black;" name="waktuperjp">
                        </div>
                        <div class="pt-2">Menit</div>
                    </div>
                </div>
                <div id="jp">

                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="mb-3 row col-sm-12">
                    <div class="col-sm-4 pt-2">
                        12. Sarana Prasarana Pendukung:
                    </div>
                    <div class="row col-sm-8">
                        <label for="staticEmail" class="col-sm-4 col-form-label">- ATK Panitia</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark" style="color:black;" name="jmlatkpanitia">
                        </div>
                        <p class="pt-2">paket kegiatan</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- ATK Kegiatan</label>
                        <div class="form-group col-sm-4">
                            <input type="number" min="0" class="form-control border border-dark" style="color:black;" name="jmlatkkegiatan">
                        </div>
                        <p class="pt-2">kelas</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Jumlah APD Orang Terlibat</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark" style="color:black; height: 40px;" id="ttlapd" name="jmlhapd" value="">
                            <div class="mb-3 row row-cols-lg-auto g-3">
                                @foreach ($apd as $apd)
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$apd->idapd}}" name="idapd[]">
                                        <label class="form-check-label" for="inlineFormCheck">
                                            {{$apd->namaapd}}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <p class="pt-2">pax</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Jumlah Perlengkapan Orang Terlibat</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark" style="color:black; height: 40px;" id="ttlperlengkapan" name="jmlperlengkapan" value="">
                            <div class="mb-3 row row-cols-lg-auto g-3">
                                @foreach ($perlengkapan as $perlengkapan)
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$perlengkapan->idperlengkapan}}" name="idperlengkapan[]">
                                        <label class="form-check-label" for="inlineFormCheck">
                                            {{$perlengkapan->namaperlengkapan}}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <p class="pt-2">pax</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Jumlah dan Rincian Konsumsi</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark" style="color:black; height: 40px;" id="ttlkonsumsi" name="jmlkonsumsi" value="">
                            <div class="mb-3 row row-cols-lg-auto g-3">
                                @foreach ($konsumsi as $konsumsi)
                                <div class="col-auto">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$konsumsi->idkonsumsi}}" name="idkonsumsi[]">
                                        <label class="form-check-label" for="inlineFormCheck">
                                            {{$konsumsi->namakonsumsi}}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <p class="pt-2">pax</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Sertifikat</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark" style="color:black;" id="sertifikat" name="jmlsertifikat">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Spanduk/Backdrop</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark" style="color:black;" id="staticEmail" name="jmlspanduk">
                        </div>
                        <p class="pt-2">Unit</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Fotokopi Bahan</label>
                        <div class="form-group col-sm-4 pt-1">
                            <select class="form-select col-sm-12" name="fotokopi" style="height: 40px;" onchange="prntCheck(this);">
                                <option selected></option>
                                <option value="yes">Cetak</option>
                                <option value="no">Tidak</option>
                            </select>
                        </div>
                        <div id="ftkp" class="form-group col-sm-2" style="display: none;">
                            <input type="number" class="form-control border border-dark" style="color:black;" name="jmlfotocopybahan">
                        </div>
                        <p class="pt-2">eksemplar</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Modul UP</label>
                        <div class="form-group col-sm-4 pt-2">
                            <select class="form-select col-sm-12" name="fotokopi" style="height: 40px;" onchange="mdlCheck(this);">
                                <option selected></option>
                                <option value="yes">Cetak</option>
                                <option value="no">Tidak</option>
                            </select>
                        </div>
                        <div id="modul" class="form-group col-sm-2" style="display: none;">
                            <input type="number" class="form-control border border-dark" style="color:black;" name="jmlmodul">
                        </div>
                        <p class="pt-2">eksemplar</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Pengiriman Modul UP</label>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control border border-dark" style="color:black;" name="pengirimanmodul">
                        </div>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Kendaraan</label>
                        <p class="pt-2 pl-3">Kapasitas</p>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark" style="color:black;" name="jmlkendaraan">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Aula</label>
                        <p class="pt-2 pl-3">Kapasitas</p>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark" style="color:black;" name="jmlaula">
                        </div>
                        <p class="pt-2">Orang</p>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Ruang Kelas</label>
                        <p class="pt-2 pl-3">Kapasitas</p>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark" style="color:black;" name="jmlruangkelas">
                        </div>
                        <p class="pt-2">Orang</p>

                        <div class="row pl-3" id="fullboardstyle" style="display: none;">
                            <div class="col-sm-12 col-form-label pt-1">
                                <label>- Fullboard Meeting :</label>
                            </div>

                            <label for="staticEmail" class="col-sm-4 col-form-label"> Penginapan, Room & Breakfast</label>
                            <div class="form-group col-sm-2">
                                <input type="number" class="form-control border border-dark" style="color:black;" name="jmlorangfullboard">
                            </div>
                            <p class="pt-2">Orang.</p>
                            <div class="form-group col-sm-2">
                                <input type="number" class="form-control border border-dark" style="color:black;" name="jmlkamarfullboard">
                            </div>
                            <p class="pt-2">Malam</p>

                            <label for="staticEmail" class="col-sm-4 col-form-label"> 1 Kamar</label>
                            <div class="form-group col-sm-4">
                                <input type="number" class="form-control border border-dark" style="color:black;" name="jmlorangperkamar">
                            </div>
                            <p class="pt-2">Orang.</p>
                        </div>

                        <label for="staticEmail" class="col-sm-4 col-form-label">- Fullday Meeting</label>
                        <div class="form-group col-sm-4">
                            <input type="number" class="form-control border border-dark" style="color:black;" name="jmlorangfullday">
                        </div>
                        <p class="pt-2">Orang</p>
                    </div>
                </div>
                <!---->

                <hr class="sidebar-divider d-none d-md-block">

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">13. Deskripsi Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control border border-dark" style="color:black; height: 200px;" id="deskripsi" name="deskripsikegiatan" placeholder=" Deskripsi"></textarea>
                    </div>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">14. Tujuan Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control border border-dark" style="color:black; height: 100px;" id="tujuan" name="tujuankegiatan" placeholder=" Tujuan"></textarea>
                    </div>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">15. Jadwal Program/Kegiatan</label>
                    <table class="table table-bordered border-primary" style="width: 100%;">
                        <thead>
                            <tr class="text-bold text-center table-primary">
                                <th align="center">No</th>
                                <th align="center" style="width: 10%;">Tanggal</th>
                                <th align="center" style="width: 10%;">Waktu Mulai</th>
                                <th align="center" style="width: 12%;">Waktu Selesai</th>
                                <th align="center" style="width: 20%;">Agenda Kegiatan</th>
                                <th align="center" style="width: 20%;">PIC</th>
                                <th align="center" style="width: 5%;">Jam/JP</th>
                                <th align="center" style="width: 20%;">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center border table-bordered" id="looping">

                        </tbody>
                    </table>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">16. Persyaratan Peserta</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control border border-dark" style="color:black; height: 200px;" name="persyaratanpeserta" placeholder=" Persyaratan"></textarea>
                    </div>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">17. Informasi Tahapan Program/Kegiatan</label>
                    <div class="col-sm-8">
                        <textarea type="text" class="form-control border border-dark" style="color:black; height: 200px;" name="informasitahapankegiatan" placeholder=" Informasi"></textarea>
                    </div>
                </div>

                <div class="mb-3 row col-sm-12">
                    <label for="staticEmail" class="col-sm-4 col-form-label">18. Gambar/Foto yang diperlukan untuk Publikasi</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control border border-dark" style="color:black; height: auto;" id="staticEmail" placeholder=" Tujuan" multiple>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end pr-5">
                    <button class="btn btn-success" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection