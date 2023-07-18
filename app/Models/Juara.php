<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juara extends Model
{
    use HasFactory;

    protected $table = 'juara';

    protected $guarded = [
        'id'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta');
    }
}
