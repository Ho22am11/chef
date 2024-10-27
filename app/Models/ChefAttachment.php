<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefAttachment extends Model
{
    use HasFactory; 

    protected $fillable = [
        'name',
        'chef_id',
    ];
}