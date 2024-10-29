<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlateChef;

class ChefMenu extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'chef_id' ,
        'name' ,
        'cuisine' ,
        'min' ,
        'max' ,
        'average_price' ,
    ] ;

   
}
