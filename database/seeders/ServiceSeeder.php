<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service; 

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = ['Daily Service', 'Multi-day Service', 'Monthly Service'];

        foreach ($services as $service) {
            Service::create(['name' => $service]);
        }
    
    }
}
