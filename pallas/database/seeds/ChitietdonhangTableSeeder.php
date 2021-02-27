<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class ChitietdonhangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $faker = Faker\Factory::create();

        for ($i=1; $i <= 15; $i++) {
            array_push($list, [
                'dh_id'                   => $i,
                'sp_id'                   => $i+1,
                'ctdh_soLuong'            => $faker->numberBetween(1, 20),
                'ctdh_donGia'             => round($faker->randomFloat(99999999, 80000, 6500000), -3),
            ]);
        }
        DB::table('home_chitietdonhang')->insert($list);
    }
}
