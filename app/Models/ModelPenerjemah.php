<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPenerjemah extends Model
{
    use HasFactory;
    protected $table        = "tbl_penerjemah";
    protected $primaryKey   = "idpenerjemah";
    protected $fillable     = ['namapenerjemah','idkegiatan','keterangan'];
}
