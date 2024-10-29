<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefPayment extends Model
{ 
    use HasFactory;

    protected $fillable = [
        'chef_id',
        'currency',
        'bank_name',
        'account_type',
        'account_number',
        'SWIFT',
        'account_branch',
        'IBAN',
    ];
}
