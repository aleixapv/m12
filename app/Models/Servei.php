<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Servei extends Model
{
    use HasFactory;
    protected $table = 'serveis';
    protected $fillable = [
        'nom',
        'descripcio',
        'imatge',
    ];
    public static function GetPathImg(){
        if(!Storage::exists('public/imatgesServeis' )){
            Storage::makeDirectory('public/imatgesServeis', 0775, true); 
        }
        return 'public/imatgesServeis';
    }
}
