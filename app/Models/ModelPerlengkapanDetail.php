<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPerlengkapanDetail extends Model
{
    use HasFactory;
    protected $table        = "tbl_perlengkapandetail";
    protected $primaryKey   = "idperlengkapandetail";
    protected $fillable     = ['idperlengkapan','idkegiatan','jmlperlengkapan'];

    public function perlengkapan()
    {
        return $this->belongsTo('App\Models\ModelPerlengkapan', 'idperlengkapan');
    }
}
