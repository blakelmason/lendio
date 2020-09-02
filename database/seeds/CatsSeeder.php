<?php

use Illuminate\Database\Seeder;
use App\Cat;

class CatsSeeder extends Seeder
{
    public function run()
    {
        Cat::truncate();

        $faker = \Faker\Factory::create();

        $values = array();
        for ($i = 0; $i < 50; $i++) {
            $values []= $faker->unique()->imageUrl($width = 640, $height = 480, 'cats');
        }


        for ($i = 0; $i < 50; $i++) {
            Cat::create([
                'image' => $values[$i],
                'description' => $faker->paragraph,
            ]);
        }
    }
}

