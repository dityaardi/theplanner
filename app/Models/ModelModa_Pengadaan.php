<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelModa_Pengadaan extends Model
{
    use HasFactory;
    protected $table        = "tbl_modapengadaan";
    protected $primaryKey   = "idmodapengadaan";
    protected $fillable     = ['idmodapengadaan','jenismodapengadaan'];
}
