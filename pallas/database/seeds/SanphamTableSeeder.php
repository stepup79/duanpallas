<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class SanphamTableSeeder extends Seeder
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
        $faker    = Faker\Factory::create('vi_VN');

        for ($i=1; $i <= 30; $i++) {
            $today = new DateTime();
            array_push($list, [
                'sp_ma'                   => $faker->ean8,
                'sp_ten'                  => "sp_ten $i",
                'sp_gia'                  => $faker->numberBetween(150000, 2000000),
                'sp_hinh'                 => $faker->randomElement($photos = array('hoamai','hoacuc','hoahong','hoalan','hoahue')).'-$i.jpg',
                'sp_thongTin'             => "sp_thongTin $i",
                'sp_danhGia'              => "sp_danhGia sp $i",
                'sp_taoMoi'               => $today->format('Y-m-d H:i:s'),
                'sp_capNhat'              => $today->format('Y-m-d H:i:s'),
                'sp_trangThai'            => 2,
                'l_id'                    => $faker->numberBetween(1, 9),
                'ncc_id'                  => $faker->numberBetween(1, 10),
            ]);
        }
        DB::table('home_sanpham')->insert($list);
    }
}
