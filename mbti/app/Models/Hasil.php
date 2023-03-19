<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasils';
    protected $primaryKey = 'id_hasil';
    protected $fillable = [
        'id_hasil',
        'id_users',
        'jawaban',
    ];
    public function User()
    {
        return $this->belongsTo(User::class,'id_users','id_user');
    }
}
