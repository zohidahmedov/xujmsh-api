<?php

namespace Database\Seeders;

use App\Models\CalculatingType;
use Illuminate\Database\Seeder;

class CalculatingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $calculatingTypes = [
          ['name' => 'people_count', 'description' => 'Kvartirada yashovchi odamlar soniga qarab hisoblash'],
          ['name' => 'area', 'description' => 'Umumiy foydalanish maydoniga qarab hisoblash'],
          ['name' => 'spent_amount', 'description' => 'Sarflangan miqdorga qarab hisoblash']
        ];

        foreach ($calculatingTypes as $calculatingType) {
            CalculatingType::query()->create($calculatingType);
        }
    }
}
