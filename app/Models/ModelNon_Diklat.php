<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelNon_Diklat extends Model
{
    use HasFactory;
    protected $table        = "tbl_nondiklat";
    protected $primaryKey   = "idnondiklat";
    protected $fillable     = ['idnondiklat','idjenisprogram','namadiklat'];

    public function jenisprogram()
    {
        return $this->belongsTo('App\Models\ModelJenis_Program', 'idjenisprogram');
    }
}
