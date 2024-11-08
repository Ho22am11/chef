<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MenusChef;


class Plate extends Model
{
    use HasFactory;

    public $timestamps = false ;


    protected $fillable = [
        'name' ,
        'category' ,
        'cuisine_id',
        'chef_id'
    ] ;

  
}
