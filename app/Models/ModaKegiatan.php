<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModaKegiatan extends Model
{
    use HasFactory;
    protected $table        = "tbl_modakegiatan";
    protected $primaryKey   = "idmodakegiatan";
    protected $fillable     = ['idmodakegiatan','jenismodakegiatan'];
}
