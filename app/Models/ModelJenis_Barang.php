<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelJenis_Barang extends Model
{
    use HasFactory;
    protected $table        = "tbl_jenisbarang";
    protected $primaryKey   = "idjenisbarang";
    protected $fillable     = ['idjenisbarang','jenisbarang','created_at','updated_at'];
}
