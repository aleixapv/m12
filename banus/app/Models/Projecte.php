<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecte extends Model
{
    use HasFactory;
    protected $table = 'projectes';
    protected $fillable = [
        'titol',
        'descripcio_breu',
        'descripcio_detallada',
    ];
}
