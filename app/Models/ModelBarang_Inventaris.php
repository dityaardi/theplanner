<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBarang_Inventaris extends Model
{
    use HasFactory;
    protected $table        = "tbl_jenisbelanjainventaris";
    protected $primaryKey   = "idjenisbelanjainventaris";
    protected $fillable     = ['idjenisbelanjainventaris','namajenisbelanjainventaris','created_at','updated_at'];
}
