<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        // Lấy tất cả các ID của các lớp trong bảng `classes`
        $classIds = DB::table('classes')->pluck('id')->toArray();

        // Lặp qua các lớp để tạo 20 học sinh cho mỗi lớp
        foreach ($classIds as $classId) {
            for ($i = 0; $i < 20; $i++) { // Tạo 20 học sinh cho mỗi lớp
                DB::table('students')->insert([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'date_of_birth' => $faker->date,
                    'parent_phone' => $faker->phoneNumber,
                    'class_id' => $classId, // Lấy class_id từ bảng `classes`
                ]);
            }
        }
    }
}
