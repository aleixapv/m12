<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; 

class Carousel extends Model
{
    use HasFactory;
    protected $table = 'imatges_carrousel';
    protected $fillable = [
        'url',
        'alt',
        'titol',
        'descripcio',
        'posicio',
    ];
    public static function GetPathImg(){
        if(!Storage::exists('public/imatgesCarousel' )){
            Storage::makeDirectory('public/imatgesCarousel', 0775, true); 
        }
        return 'public/imatgesCarousel';
    }
}
