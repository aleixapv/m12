<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XarxaSocial extends Model
{
    use HasFactory;
    protected $table = 'xarxes_socials';
    protected $fillable = [
        'nom',
        'icona',
        'enllac',
    ];
}
