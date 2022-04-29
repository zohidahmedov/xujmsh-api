<?php

namespace Database\Seeders;
use App\Models\Service;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name' => 'Majburiy badal', 'calculating_type_id' => 2],
            ['name' => 'Elektr energiyasi', 'calculating_type_id' => 1],
            ['name' => 'issiq suv', 'calculating_type_id' => 3],
            ['name' => 'Isitish', 'calculating_type_id' => 1],
            ['name' => 'Musor', 'calculating_type_id' => 1],
            ['name' => 'Kanalizatsiya', 'calculating_type_id' => 1]
        ];

        foreach ($services as $service) {
            Service::query()->create($service);
        }
    }
}
