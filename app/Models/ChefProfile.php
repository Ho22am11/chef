<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefProfile extends Model
{  
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'img',
        'chef_id',
        'first_name',
        'last_name',
        'bio',
        'language',
        'about',
        'experience',
        'learned_at',
        'tips',
        'web',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'linkedin',
    ];



    protected $casts = [
        'language' => 'array' ,
    ] ;
}
