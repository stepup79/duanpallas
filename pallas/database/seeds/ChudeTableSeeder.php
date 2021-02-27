<?php

use Illuminate\Database\Seeder;

class ChudeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $categories = ["Hoa khai trương", "Hoa ăn được", "Hoa tươi", "Hoa sự kiện", "Hoa thú cưng", "Các loại hoa", "Lan hồ điệp", "Gòn"];

        $today = new DateTime('Asia/Ho_Chi_Minh');

        for ($i=1; $i <= count($categories); $i++) {
            array_push($list, [
                'cd_ten'     => $categories[$i-1],
                'cd_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'cd_capNhat' => $today->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('home_chude')->insert($list);
    }
}
