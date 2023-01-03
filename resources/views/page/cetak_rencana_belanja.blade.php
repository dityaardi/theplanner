<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('/images/lgoo.png')}}">
    <title>Cetak</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>
    <div class="container">
        <div class="single-table p-5">
            <div class="table-responsive">
                <table class="table table-bordered border-dark table-hover progress-table text-center">
                    <thead>
                        <tr>
                            <td scope="col" style="width: 18%;"><img src="{{asset('images/logotutwuri.png')}}"></td>
                            <td scope="col" style="width: 82%;">
                                <h4 style="font-family: Times New Roman;"><b>PUSAT PENGEMBANGAN DAN PEMBERDAYAAN</b></h4>
                                <h4 style="font-family: Times New Roman;"><b>PENDIDIK DAN TENAGA KEPENDIDIKAN</b></h4>
                                <h4 style="font-family: Times New Roman;"><b>TAMAN KANAK-KANAK DAN PENDIDIKAN LUAR BIASA</b></h4>
                                <h5 style="font-family: Times New Roman;">Jl. Dr.Cipto No.9 Bandung,Telepon: (022) 4230068 – 4237041, Fax. (022) 4230068,</h5>
                                <h5 style="font-family: Times New Roman;">Laman : http://p4tktkplb.kemdikbud.go.id email: p4tktkplb@kemdikbud.go.id</h5>
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="container p-5 ml-5 mr-5" style="font-size: 17px; font-family: Times New Roman;">
            <div class="table-responsive">
                <table class="table">
                    @foreach ($belanja as $keg)
                    <tr>
                        <td scope="col" style="width: 30%;">Jenis Barang</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->jenisbarang->jenisbarang}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">Jenis Belanja Inventaris/Modal</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->jenisbelanja->namajenisbelanjainventaris}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">Pembiayaan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">
                            @foreach($pembiayaan as $p)
                            {{$p->pembiayaan->jenispembiayaan}}
                            @if( !$loop->last), @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">Moda Pengadaan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->modapengadaan->jenismodapengadaan}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">1. Nama Program/Kegiatan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->namakegiatanbb}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">2. Lembaga Penyelenggara</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->lembagapenyelenggarabb}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">3. Lembaga Mitra Penyelenggara</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->lembagamitrabb}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">4. Lokasi Program/Kegiatan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->lokasikegiatanbb}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">5. Waktu Program/Kegiatan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{ date('d F Y', strtotime($keg->tglmulaibb)) }} - {{ date('d F Y', strtotime($keg->tglakhirbb)) }}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">6. Jumlah orang terlibat</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">Menunggu Format Matrix</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">7. Susunan Panitia/Petugas Pengadaan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">
                            Ketua : {{$keg->jmlketua}} orang<br>
                            Sekretaris : {{$keg->jmlsekretaris}} orang<br>
                            Anggota : {{$keg->jmlanggota}} orang<br>
                            Petugas Pengadaan : {{$keg->petugaskeuangan}} orang<br>
                        </td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">8. Deskripsi Program/Kegiatan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->deskripsiprogrambb}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">9. Tujuan Program/Kegiatan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->tujuanprogrambb}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">10. Jadwal Program/Kegiatan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">Format Matrix dibawah</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">11. Persyaratan Vendor/Peserta :</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->persyaratanvendorbb}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">12. Informasi Tahapan Program/Kegiatan</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">{{$keg->informasitahapanprogrambb}}</td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">13. Gambar</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;"></td>
                    </tr>
                    <tr>
                        <td scope="col" style="width: 30%;">14. Rincian Spesifikasi Jasa/Barang</td>
                        <td scope="col" style="width: 5%;">:</td>
                        <td scope="col" style="width: 65%;">Menunggu Format Matrix</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>