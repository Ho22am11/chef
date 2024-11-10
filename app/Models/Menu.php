<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plate ;
class Menu extends Model
{
    use HasFactory;

    public $timestamps = false ;
    
    protected $fillable = [
        'chef_id' ,
        'name' ,
        'cuisine_id' ,
        'min' ,
        'max' ,
        'average_price_two_guests' ,
        'average_price_six_guests' ,
        'average_price_twenty_guests' ,
    ] ;

    public function plates(){
        return $this->belongsToMany( 'App\Models\Plate', 'menu_plate');
    }

   
}
