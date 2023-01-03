<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ModelKegiatan extends Model
{
    use HasFactory;
    protected $table        = "tbl_kegiatan";
    protected $primaryKey   = "idkegiatan";
    protected $fillable     = [
        'namakegiatan',
        'lembagapenyelenggara',
        'lembagamitra',
        'lokasikegiatan',
        'tglmulai',
        'tglakhir',
        'jmlpenceramah',
        'jmlpengajar',
        'jmlpeserta',
        'jmlpenerjemah',
        'totalpanitia',
        'idjenisprogram',
        'idnondiklat',
        'idmodakegiatan',
        'jmlpengarah',
        'jmlpenanggungjawab',
        'jmlketua',
        'jmlanggotapenjabakademik',
        'jmlanggotapanitiakelas',
        'jmladmindigital',
        'jmlpetugaskeuangan',
        'jmlnotulen',
        'jmlmoderator',
        'jmlpanitialainnya',
        'jmlpanitia',
        'jmljamkegiatan',
        'waktuperjp',
        'jmlatkpanitia',
        'jmlatkkegiatan',
        'jmlhapd',
        'jmlperlengkapan',
        'jmlkonsumsi',
        'jmlsertifikat',
        'jmlspanduk',
        'jmlfotocopybahan',
        'jmlmodul',
        'pengirimanmodul',
        'jmlkendaraan',
        'jmlaula',
        'jmlruangkelas',
        'jmlorangfullboard',
        'jmlkamarfullboard',
        'jmlorangperkamar',
        'jmlorangfullday',
        'deskripsikegiatan',
        'tujuankegiatan',
        'persyaratanpeserta',
        'informasitahapankegiatan',
        'idpegawai',
        'idkodekegiatan',
        'idkoderokro',
        'kodesubkro',
        'kodekomponen',
        'kodeakun',
        'idgambar',
        'status'
    ];

    //relasi table jenis kegiatan
    public function jenis()
    {
        return $this->belongsTo('App\Models\ModelJenis_Program', 'idjenisprogram');
    }

    //relasi table non diklat
    public function nondiklat()
    {
        return $this->belongsTo('App\Models\ModelNon_Diklat', 'idnondiklat');
    }

    //relasi table jenis kegiatan
    public function modakegiatan()
    {
        return $this->belongsTo('App\Models\ModaKegiatan', 'idmodakegiatan');
    }

    public function getCreatedAtAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y');
    }
}
