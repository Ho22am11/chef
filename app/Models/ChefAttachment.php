<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefAttachment extends Model
{
    use HasFactory; 
    public $timestamps = false ;

    protected $fillable = [
        'chef_id',
        'file_name',
        'file_type',
    ];
}
