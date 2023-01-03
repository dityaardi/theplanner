<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAPDDetail extends Model
{
    use HasFactory;
    protected $table        = "tbl_apddetail";
    protected $primaryKey   = "idapddetail";
    protected $fillable     = ['idapd','idkegiatan','jmlhapd'];

    //relasi table apd
    public function apd()
    {
        return $this->belongsTo('App\Models\ModelAPD', 'idapd');
    }
}
