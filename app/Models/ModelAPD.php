<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAPD extends Model
{
    use HasFactory;
    protected $table        = "tbl_apd";
    protected $primaryKey   = "idapd";
    protected $fillable     = ['idapd','namaapd'];
}
