<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imatge extends Model
{
    use HasFactory;
    protected $table = 'imatges';
    protected $fillable = [
        'url',
        'nom',
        'alt',
        'posicio',
    ];
}
