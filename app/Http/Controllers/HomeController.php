<?php

namespace App\Http\Controllers;

use App\Models\ModaKegiatan;
use App\Models\ModelAPD;
use App\Models\ModelAPDDetail;
use App\Models\ModelBarang_Inventaris;
use App\Models\ModelJenis_Barang;
use App\Models\ModelJenis_Program;
use App\Models\ModelKegiatan;
use App\Models\ModelKonsumsi;
use App\Models\ModelKonsumsiDetail;
use App\Models\ModelModa_Pengadaan;
use App\Models\ModelNon_Diklat;
use App\Models\ModelPembiayaan;
use App\Models\ModelPembiayaanDetail;
use App\Models\ModelPembiayaanDetailBB;
use App\Models\ModelPenceramah;
use App\Models\ModelPenerjemah;
use App\Models\ModelPengajar;
use App\Models\ModelPerlengkapan;
use App\Models\ModelPerlengkapanDetail;
use App\Models\ModelRencanaBelanja;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('page.home',[
            'kegiatan' => ModelKegiatan::orderby('idkegiatan', 'DESC')->paginate(10),
            'belanja' => ModelRencanaBelanja::orderby('idbelanjabarang', 'DESC')->paginate(10)
        ]);
    }

    public function newactivity()
    {
        return view('page.create_activity', [
            'jenprog' => ModelJenis_Program::all(),
            'nondiklat' => ModelNon_Diklat::all(),
            'pembiayaan' => ModelPembiayaan::all(),
            'apd' => ModelAPD::all(),
            'perlengkapan' => ModelPerlengkapan::all(),
            'moda' => ModaKegiatan::all(),
            'konsumsi' => ModelKonsumsi::all(),
        ]);
    }

    public function storeactivity(Request $request)
    {
                                                        //method menambah kegiatan
        $KegiatanBaru = ModelKegiatan::create([
            'namakegiatan' => $request->namakegiatan,
            'lembagapenyelenggara'=> $request->lembagapenyelenggara,
            'lembagamitra' => $request->lembagamitra,
            'lokasikegiatan' => $request->lokasikegiatan,
            'tglmulai' => $request->tglmulai,
            'tglakhir' => $request->tglakhir,
            'jmlpenceramah' => $request->jmlpenceramah,
            'jmlpengajar' => $request->jmlpengajar,
            'jmlpeserta'=> $request->jmlpeserta,
            'jmlpenerjemah' => $request->jmlpenerjemah,
            'totalpanitia' => $request->totalpanitia,
            'idjenisprogram' => $request->idjenisprogram,
            'idnondiklat' => $request->idnondiklat,
            'idmodakegiatan' => $request->idmodakegiatan,
            'jmlpengarah' => $request->jmlpengarah,
            'jmlpenanggungjawab' => $request->jmlpenanggungjawab,
            'jmlketua' => $request->jmlketua,
            'jmlanggotapenjabakademik' => $request->jmlanggotapenjabakademik,
            'jmlanggotapanitiakelas' => $request->jmlanggotapanitiakelas,
            'jmladmindigital' => $request->jmladmindigital,
            'jmlpetugaskeuangan' => $request->jmlpetugaskeuangan,
            'jmlnotulen' => $request->jmlnotulen,
            'jmlmoderator' => $request->jmlmoderator,
            'jmlpanitialainnya' => $request->jmlpanitialainnya,
            'jmlpanitia' => $request->jmlpanitia,
            'jmljamkegiatan' => $request->jmljamkegiatan,
            'waktuperjp' => $request->waktuperjp,
            'jmlatkpanitia' => $request->jmlatkpanitia,
            'jmlatkkegiatan' => $request->jmlatkkegiatan,
            'jmlhapd'       => $request->jmlhapd,
            'jmlperlengkapan'  => $request->jmlperlengkapan,
            'jmlkonsumsi'   => $request->jmlkonsumsi,
            'jmlsertifikat' => $request->jmlsertifikat,
            'jmlspanduk' => $request->jmlspanduk,
            'jmlfotocopybahan' => $request->jmlfotocopybahan,
            'jmlmodul' => $request->jmlmodul,
            'pengirimanmodul' => $request->pengirimanmodul,
            'jmlkendaraan' => $request->jmlkendaraan,
            'jmlaula' => $request->jmlaula,
            'jmlruangkelas' => $request->jmlruangkelas,
            'jmlorangfullboard' => $request->jmlorangfullboard,
            'jmlkamarfullboard' => $request->jmlkamarfullboard,
            'jmlorangperkamar' => $request->jmlorangperkamar,
            'jmlorangfullday' => $request->jmlorangfullday,
            'deskripsikegiatan' => $request->deskripsikegiatan,
            'tujuankegiatan' => $request->tujuankegiatan,
            'persyaratanpeserta' => $request->persyaratanpeserta,
            'informasitahapankegiatan' => $request->informasitahapankegiatan,
            'status' => 'menunggu'
        ]);
        $idkegiatan = $KegiatanBaru->idkegiatan; //code mengambil idkegiatan yg baru di buat

                                                        //method tambah Pembiayaan Detail
        foreach ($request->idpembiayaan as $idpembiayaan) {
            ModelPembiayaanDetail::create([
                'idpembiayaan'  => $idpembiayaan,
                'idkegiatan'    => $idkegiatan
            ]);
        }

                                                        //method tambah penceramah
        foreach ($request->namapenceramah as $key => $namapenceramah) {
            $totalpncrmh[]=ModelPenceramah::create([
                'namapenceramah'  => $namapenceramah,
                'idkegiatan'    => $idkegiatan
            ]);
        }

                                                        //method tambah pengajar
        foreach ($request->namapengajar as $key => $namapengajar) {
            $totalpncrmh[]=ModelPengajar::create([
                'namapengajar'  => $namapengajar,
                'idkegiatan'    => $idkegiatan
            ]);
        }

                                                        //method tambah penerjemah
        foreach ($request->namapenerjemah as $key => $namapenerjemah) {
            $totalpncrmh[]=ModelPenerjemah::create([
                'namapenerjemah'  => $namapenerjemah,
                'idkegiatan'    => $idkegiatan
            ]);
        }

                                                        //method tambah apd detail
        foreach ($request->idapd as $idapd) {
            ModelAPDDetail::create([
                'idapd'         => $idapd,
                'idkegiatan'    => $idkegiatan
            ]);
        }

                                                        //method tambah perlengkapan detail
        foreach ($request->idperlengkapan as $idperlengkapan) {
            ModelPerlengkapanDetail::create([
                'idperlengkapan'    => $idperlengkapan,
                'idkegiatan'        => $idkegiatan
            ]);
        }

                                                        //method tambah konsumsi detail
        foreach ($request->idkonsumsi as $idkonsumsi) {
            ModelKonsumsiDetail::create([
                'idkonsumsi'    => $idkonsumsi,
                'idkegiatan'    => $idkegiatan
            ]);
        }
        return redirect('/home');
    }

    public function detailkegiatan($idkegiatan){
        $detail = ModelKegiatan::all()->where('idkegiatan',$idkegiatan);
        $pembiayaandetail = ModelPembiayaanDetail::all()->where('idkegiatan',$idkegiatan);
        $penceramah = ModelPenceramah::all()->where('idkegiatan',$idkegiatan);
        $pengajar = ModelPengajar::all()->where('idkegiatan',$idkegiatan);
        $penerjemah = ModelPenerjemah::all()->where('idkegiatan',$idkegiatan);
        $apddetail = ModelAPDDetail::all()->where('idkegiatan',$idkegiatan);
        $perlengkapandetail = ModelPerlengkapanDetail::all()->where('idkegiatan',$idkegiatan);
        $konsumsidetail = ModelKonsumsiDetail::all()->where('idkegiatan',$idkegiatan);

        return view ('page.detail_kegiatan',[
            'kegiatan' => $detail,
            'pembiayaan' => $pembiayaandetail,
            'penceramah' => $penceramah,
            'pengajar' => $pengajar,
            'penerjemah' => $penerjemah,
            'apd' => $apddetail,
            'perlengkapan' => $perlengkapandetail,
            'konsumsi' => $konsumsidetail
        ]);
    }

    public function cetakkegiatan($idkegiatan){
        $detail = ModelKegiatan::all()->where('idkegiatan',$idkegiatan);
        $pembiayaandetail = ModelPembiayaanDetail::all()->where('idkegiatan',$idkegiatan);
        $penceramah = ModelPenceramah::all()->where('idkegiatan',$idkegiatan);
        $pengajar = ModelPengajar::all()->where('idkegiatan',$idkegiatan);
        $penerjemah = ModelPenerjemah::all()->where('idkegiatan',$idkegiatan);
        $apddetail = ModelAPDDetail::all()->where('idkegiatan',$idkegiatan);
        $perlengkapandetail = ModelPerlengkapanDetail::all()->where('idkegiatan',$idkegiatan);
        $konsumsidetail = ModelKonsumsiDetail::all()->where('idkegiatan',$idkegiatan);

        return view('page.cetak_kegiatan',[
            'kegiatan' => $detail,
            'pembiayaan' => $pembiayaandetail,
            'penceramah' => $penceramah,
            'pengajar' => $pengajar,
            'penerjemah' => $penerjemah,
            'apd' => $apddetail,
            'perlengkapan' => $perlengkapandetail,
            'konsumsi' => $konsumsidetail
        ]);
    }
    
    public function rencanabelanja()
    {
        return view('page.form_belanja', [
            'jenbar' => ModelJenis_Barang::all(),
            'inventaris' => ModelBarang_Inventaris::all(),
            'pembiayaan' => ModelPembiayaan::all(),
            'pengadaan' => ModelModa_Pengadaan::all()
        ]);
    }

    public function rencanabelanjastore(Request $request)
    {
        $RencanaBelanja = ModelRencanaBelanja::create([
            'namakegiatanbb' => $request->namaprogram,
            'lembagapenyelenggarabb' => $request->namalembaga,
            'lembagamitrabb' => $request->namamitra,
            'lokasikegiatanbb' => $request->lokasi,
            'tglmulaibb' => $request->tglmulaibb,
            'tglakhirbb' => $request->tglakhirbb,
            'jmlketua' => $request->jmlketua,
            'jmlsekretaris' => $request->jmlsekretaris,
            'jmlanggota' => $request->jmlanggota,
            'jmlpetugaskeuangan' => $request->jmlpetugaskeuangan,
            'deskripsiprogrambb' => $request->deskripsiprogrambb,
            'tujuanprogrambb' => $request->tujuanprogrambb,
            'persyaratanvendorbb' => $request->persyaratanvendorbb,
            'informasitahapanprogrambb' => $request->informasitahapanprogrambb,
            'idjenisbarang' => $request->idjenisbarang,
            'idjenisbelanjainventaris'=> $request->idjenisbelanjainventaris,
            'idmodapengadaan' => $request->idmodapengadaan,
            'status' => 'menunggu'
        ]);
        $idrencanabelanja=$RencanaBelanja->idbelanjabarang;

        foreach ($request->idpembiayaan as $idpembiayaan) {
            ModelPembiayaanDetailBB::create([
                'idpembiayaan'  => $idpembiayaan,
                'idbelanjabarang'    => $idrencanabelanja
            ]);
        }

        return redirect('/home');
    }

    public function detailrencanabelanja($idbelanjabarang) {
        $detail = ModelRencanaBelanja::all()->where('idbelanjabarang', $idbelanjabarang);
        $pembiayaan = ModelPembiayaanDetailBB::all()->where('idbelanjabarang', $idbelanjabarang);

        return view('page.detail_rencana_belanja', [
            'belanja' => $detail,
            'pembiayaan' => $pembiayaan
        ]);
    }

    public function cetakrencanabelanja($idbelanjabarang) {
        $detail = ModelRencanaBelanja::all()->where('idbelanjabarang', $idbelanjabarang);
        $pembiayaan = ModelPembiayaanDetailBB::all()->where('idbelanjabarang', $idbelanjabarang);

        return view('page.cetak_rencana_belanja', [
            'belanja' => $detail,
            'pembiayaan' => $pembiayaan
        ]);
    }

    public function halprof()
    {
        return view('page.profile');
    }
}
