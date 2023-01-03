<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRencanaBelanja extends Model
{
    use HasFactory;
    protected $table        = "tbl_rencanabelanja";
    protected $primaryKey   = "idbelanjabarang";
    protected $fillable     = [
        'namakegiatanbb',
        'lembagapenyelenggarabb',
        'lembagamitrabb',
        'lokasikegiatanbb',
        'tglmulaibb',
        'tglakhirbb',
        'jmlketua',
        'jmlsekretaris',
        'jmlanggota',
        'jmlpetugaskeuangan',
        'deskripsiprogrambb',
        'tujuanprogrambb',
        'persyaratanvendorbb',
        'informasitahapanprogrambb',
        'idjenisbarang',
        'idjenisbelanjainventaris',
        'idmodapengadaan',
        'status'
    ];

    public function jenisbarang()
    {
        return $this->belongsTo('App\Models\ModelJenis_Barang', 'idjenisbarang');
    }

    public function jenisbelanja()
    {
        return $this->belongsTo('App\Models\ModelBarang_Inventaris', 'idjenisbelanjainventaris');
    }

    public function modapengadaan()
    {
        return $this->belongsTo('App\Models\ModelModa_pengadaan','idmodapengadaan');
    }

    public function getCreatedAtAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l, d F Y');
    }
}
