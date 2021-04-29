<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servei extends Model
{
    use HasFactory;
    protected $table = 'serveis';
    protected $fillable = [
        'nom',
        'icona',
        'imatge',
    ];
}
