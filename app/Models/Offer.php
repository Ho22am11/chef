<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public $timestamps = false ;

    protected $fillable = [
        'chef_id',
        'order_id',
        'state',
        'menu_id',
        'price',

    ];

    public function getStateAttribute($value){
        $state = [ 1 => 'pending' , 2 => 'accepted' , 3 => 'rejected'] ;
        return $state[$value] ;
    }
}
