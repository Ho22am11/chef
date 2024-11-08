<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Average' ,
                'average' => '300-400'
            ],[
                'name' => 'VIP' ,
                'average' => '450-550'
            ],[
                'name' => 'Top Notch' ,
                'average' => '600-1000'
            ]
        ];

        foreach ($packages as $package) {
            Package::create([
                'name' => $package['name'],
                'average' => $package['average'],
            ]);
        }
    }
}
