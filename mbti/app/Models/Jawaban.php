<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    protected $table = 'jawabans';
    protected $primaryKey = 'id_jawabans';
    protected $fillable = [
        'id_jawabans',
        'jawabans',
        'bobot',
        'beban',
    ];
}
