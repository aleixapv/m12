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
        'adreca_1',
        'adreca_2',
        'ciutat',
        'provincia',
        'zip/cp',
        'nom_logo',
        'alt_logo',
        'url_logo',
    ];
}
