<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacioEmpresa extends Model
{
    use HasFactory;
    protected $table = 'informacio_empresa';
    protected $fillable = [
        'nom_empresa',
        'eslogan',
        'tel',
        'correu',
        'cp',
        'ciutat',
        'carrer',
        'numero',
        'imatge_logo_id',
    ];
}
