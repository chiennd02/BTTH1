<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run()
        {
            $faker = Faker::create();
            
            for ($i = 0; $i < 5; $i++) { // Tạo 20 lớp học
                DB::table('classes')->insert([
                    'grade_level' => $faker->randomElement(['Pre-K', 'Kindergarten']), // Chọn ngẫu nhiên cấp độ lớp
                    'room_number' => 'VH' . $faker->numberBetween(1, 20), // Tạo phòng học như VH1, VH2, ...
                ]);
            }
        }
}
