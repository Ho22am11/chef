<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'service_id' ,
        'cuisine_id' ,
        'chef_id' ,
        'user_id' ,
        'package_id' ,
        'adult' ,
        'teen' ,
        'children' ,
        'breakfast_status' ,
        'lunch_status' ,
        'dinner_status' ,
        'from_time' ,
        'to_time' ,
        'day' , 
        'addition_service' , 
        'details' , 
        'state' , 
        'cost' , 
    ];

    public function getStateAttribute($value)
    {
    $states = [1 => 'open', 2 => 'inprocess', 3 => 'accepted', 4 => 'paid', 5 => 'canceled', 6 => 'expired'];
    return $states[$value] ?? null;
    }
 
    public function getBreakfastStatusAttribute($value)
    {
        return $value == '1' ? 'Ready to Eat' : 'Dining Experience';
    }

    public function getLunchStatusAttribute($value)
    {
        return $value == '1' ? 'Ready to Eat' : 'Dining Experience';
    }

    public function getDinnerStatusAttribute($value)
    {
        return $value == '1' ? 'Ready to Eat' : 'Dining Experience';
    }


    public function getAdditionServiceAttribute($value){
        $addition_service = [ 0 => 'waiter' , 1 => 'bartender' , 2 => 'other'] ;
        return $addition_service[$value] ?? null ;
    }


    
}
