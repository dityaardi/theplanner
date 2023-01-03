<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPembiayaanDetail extends Model
{
    use HasFactory;
    protected $table        = "tbl_pembiayaandetail";
    protected $primaryKey   = "idpembiayaandetail";
    protected $fillable     = ['idpembiayaan','idkegiatan'];

    //relasi table jenis kegiatan
    public function pembiayaan()
    {
        return $this->belongsTo('App\Models\ModelPembiayaan', 'idpembiayaan');
    }
}
