<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPenceramah extends Model
{
    use HasFactory;
    protected $table        = "tbl_penceramah";
    protected $primaryKey   = "idpenceramah";
    protected $fillable     = ['namapenceramah','idkegiatan','keterangan'];
}
