<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create(); // Khởi tạo Faker

        foreach (range(1, 10) as $index) { // Sinh 10 bản ghi giả
            DB::table('medicines')->insert([
                'name' => $faker->word, // Tên thuốc
                'brand' => $faker->company, // Thương hiệu
                'dosage' => $faker->randomElement(['500mg', '250mg', '100mg']), // Liều lượng
                'form' => $faker->randomElement(['Tablet', 'Capsule', 'Syrup']), // Dạng thuốc
                'price' => $faker->randomFloat(2, 10, 500), // Giá (số thập phân)
                'stock' => $faker->numberBetween(1, 100), // Số lượng tồn kho
            ]);
        }
    }
}
