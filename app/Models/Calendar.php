<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'chef_id',
        'day',
        'available',
        'breakfast',
        'lunch',
        'dinner',
    ];
}
