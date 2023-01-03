<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPengajar extends Model
{
    use HasFactory;
    protected $table        = "tbl_pengajar";
    protected $primaryKey   = "idpengajar";
    protected $fillable     = ['namapengajar','idkegiatan','keterangan'];
}
