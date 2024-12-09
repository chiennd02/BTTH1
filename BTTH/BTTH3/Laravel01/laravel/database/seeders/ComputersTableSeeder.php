<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word . '-' . strtoupper($faker->randomLetter) . $faker->numberBetween(1, 100),
                'model' => $faker->company . ' ' . $faker->word,
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Windows 11', 'Ubuntu']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-11700', 'AMD Ryzen 5']),
                'memory' => $faker->randomElement([8, 16, 32]), // RAM từ 8GB đến 32GB
                'available' => $faker->boolean,
            ]);
        }
    }
}
