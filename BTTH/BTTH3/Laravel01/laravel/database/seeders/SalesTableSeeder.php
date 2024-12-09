<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Faker::create(); // Khởi tạo Faker

        foreach (range(1, 20) as $index) { // Sinh 20 bản ghi giả cho bảng sales
            DB::table('sales')->insert([
                'medicine_id' => $faker->numberBetween(1, 10), // Khóa ngoại (ID thuốc từ bảng 'medicines')
                'quantity' => $faker->numberBetween(1, 5), // Số lượng bán ra
                'sale_date' => $faker->dateTimeThisYear, // Ngày bán hàng
                'customer_phone' => substr($faker->phoneNumber, 0, 10), // Số điện thoại khách hàng
            ]);
        }
    }
}
