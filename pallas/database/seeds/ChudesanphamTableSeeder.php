<?php

use Illuminate\Database\Seeder;

class ChudesanphamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $khaiTruong = [1, 2, 3, 4, 5, 6];
        $anDuoc = [7, 8, 9, 10];
        $hoaTuoi = [11, 12, 13, 14, 15, 16, 17, 18];
        $suKien = [7, 8, 9, 10, 11, 12, 19, 20, 21, 22, 23, 24, 25, 26, 27, 32, 33];
        $thuCung = [28, 29];
        $loaiHoa = [1, 30, 31, 32, 33, 34];
        $lanHoDiep = [35, 36];
        $Gon = [25, 37, 38, 39];

        for ($i=1; $i <= count($khaiTruong); $i++) {
            array_push($list, [
                'sp_id'     => $khaiTruong[$i-1],
                'cd_id'     => 1
            ]);
        }
        for ($i=1; $i <= count($anDuoc); $i++) {
            array_push($list, [
                'sp_id'     => $anDuoc[$i-1],
                'cd_id'     => 2
            ]);
        }
        for ($i=1; $i <= count($hoaTuoi); $i++) {
            array_push($list, [
                'sp_id'     => $hoaTuoi[$i-1],
                'cd_id'     => 3
            ]);
        }
        for ($i=1; $i <= count($suKien); $i++) {
            array_push($list, [
                'sp_id'     => $suKien[$i-1],
                'cd_id'     => 4
            ]);
        }
        for ($i=1; $i <= count($thuCung); $i++) {
            array_push($list, [
                'sp_id'     => $thuCung[$i-1],
                'cd_id'     => 5
            ]);
        }
        for ($i=1; $i <= count($loaiHoa); $i++) {
            array_push($list, [
                'sp_id'     => $loaiHoa[$i-1],
                'cd_id'     => 6
            ]);
        }
        for ($i=1; $i <= count($lanHoDiep); $i++) {
            array_push($list, [
                'sp_id'     => $lanHoDiep[$i-1],
                'cd_id'     => 7
            ]);
        }
        for ($i=1; $i <= count($Gon); $i++) {
            array_push($list, [
                'sp_id'     => $Gon[$i-1],
                'cd_id'     => 8
            ]);
        }

        DB::table('home_chudesanpham')->insert($list);
    }
}
