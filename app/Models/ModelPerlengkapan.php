<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPerlengkapan extends Model
{
    use HasFactory;
    protected $table        = "tbl_perlengkapan";
    protected $primaryKey   = "idperlengkapan";
    protected $fillable     = ['idperlengkapan','namaperlengkapan'];
}
