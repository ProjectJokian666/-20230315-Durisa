<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepribadian extends Model
{
    use HasFactory;
    protected $table = 'kepribadians';
    protected $primaryKey = 'id_kepribadian';
    protected $fillable = [
        'id_kepribadian',
        'gambar',
        'type',
        'kepribadian',
        'deskripsi',
    ];
}
