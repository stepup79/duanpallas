<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class ChudesanphamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker    = Faker\Factory::create('vi_VN');

        $nChuDe   = 3;
        $chude    = [];
        for ($i=1; $i <= $nChuDe; $i++) {
            array_push($chude, $i);
        }

        $list     = [];
        $nSanPham = 3;
        for ($sp_id=1; $sp_id <= $nSanPham; $sp_id++) {
            $count = $faker->numberBetween(1, $nChuDe);
            $ds    = $faker->randomElements($chude, $count);
            foreach ($ds as $key => $cd_id) {
                array_push($list, [
                    'sp_id' => $sp_id,
                    'cd_id' => $cd_id
                ]);
            }
        }
        DB::table('home_chudesanpham')->insert($list);
    }
}
