<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSetting extends Model
{
    use HasFactory;

    public $timestamps = false ;


    protected $fillable = [
        'chef_id' ,
        'package_id' ,
        'cuisine_id',
        'people_max' , 
        'people_main' , 
        'max_price' , 
        'min_price' , 
    ] ;
}
