<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecte_Categoria extends Model
{
    use HasFactory;
    protected $table = 'projectes_categories';
    protected $fillable = [
        'projecte_id',
        'categoria_id',
    ];
}
