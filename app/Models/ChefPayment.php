<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefPayment extends Model
{ 
    use HasFactory;

    protected $fillable = [
        'currency' ,
        'bank_name',
        'account_type' ,
        'account_number' ,
        'swift_number' ,
        'account_branch' ,
        'iban' ,
        'chef_id' ,
    ];
}
