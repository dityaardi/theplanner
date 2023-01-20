<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMatrixKegiatan extends Model
{
    use HasFactory;
    protected $table        = "tbl_matrix_kegiatan";
    protected $primaryKey   = "idmatrixkegiatan";
    protected $fillable     = [
        'idmatrixkegiatan',
        'idkegiatan',
        'tanggal',
        'waktumulai',
        'waktuselesai',
        'agenda',
        'pic',
        'jamperjp',
        'lokasi'];
}
