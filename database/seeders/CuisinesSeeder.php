<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuisinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuisines = ['International', 'French', 'Italian' , 'fusion' , 'Mediterranean' , 'American' , 'fusion'];

        foreach ($cuisines as $cuisine) {
            Cuisine::create(['name' => $cuisine]);
        }
    }
}
