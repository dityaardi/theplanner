<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKonsumsi extends Model
{
    use HasFactory;
    protected $table        = "tbl_konsumsi";
    protected $primaryKey   = "idkonsumsi";
    protected $fillable     = ['idkonsumsi','namakonsumsi'];
}
