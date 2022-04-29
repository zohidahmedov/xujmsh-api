<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceAndPaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = Service::all();
        $names = ['simple','platinum','gold','silver'];

        foreach ($services as $service)
        {
            PaymentType::query()->create([
                'service_id' => $service->id,
                'name' => $names[array_rand($names)],
                'amount' => rand(200,1200),
                'is_default' => rand(0,1),
            ]);

//            DB::table('payment_types')->create([
//                'service_id' => $service->id,
//                'name' => array_rand($names),
//                'amount' => rand(200,1200),
//                'is_default' => rand(0,1),
//            ]);
        }
//        foreach ($payment_types as $service) {
//            Service::query()->create($service);
//        }
    }
}
