<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelJenis_Program extends Model
{
    use HasFactory;
    protected $table        = "tbl_jenisprogram";
    protected $primaryKey   = "idjenisprogram";
    protected $fillable     = ['idjenisprogram','jenisprogram'];
}
