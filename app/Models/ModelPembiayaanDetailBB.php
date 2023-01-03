<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPembiayaanDetailBB extends Model
{
    use HasFactory;
    protected $table        = "tbl_pembiayaandetailbb";
    protected $primaryKey   = "idpembiayaandetailbb";
    protected $fillable     = ['idpembiayaan','idbelanjabarang'];

    //relasi table jenis kegiatan
    public function pembiayaan()
    {
        return $this->belongsTo('App\Models\ModelPembiayaan', 'idpembiayaan');
    }
}
