<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id' ,
        'cuisine_id' ,
        'chef_id' ,
        'user_id' ,
        'package_id' ,
        'adult' ,
        'teen' ,
        'children' ,
        'meal' ,
        'day' , 
        'addition_service' , 
        'details' , 
        'state' , 
        'cost' , 
    ];
}
