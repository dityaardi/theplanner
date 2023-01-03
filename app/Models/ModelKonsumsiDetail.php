<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKonsumsiDetail extends Model
{
    use HasFactory;
    protected $table        = "tbl_konsumsidetail";
    protected $primaryKey   = "idkonsumsidetail";
    protected $fillable     = ['idkonsumsi','idkegiatan','jmlkonsumsi'];

    public function konsumsi()
    {
        return $this->belongsTo('App\Models\ModelKonsumsi', 'idkonsumsi');
    }
}
