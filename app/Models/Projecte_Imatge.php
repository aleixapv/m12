<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecte_Imatge extends Model
{
    use HasFactory;
    protected $table = 'projectes_imatges';
    protected $fillable = [
        'projecte_id',
        'imatge_id',
        'titol',
        'descripcio',
        'pocicio',
    ];
}
