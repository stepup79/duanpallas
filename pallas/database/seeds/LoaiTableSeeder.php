<?php

use Illuminate\Database\Seeder;

class LoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $khaiTruong = ["Kệ hoa cao", "Kệ hoa để bàn"];
        $anDuoc = ["Hoa dâu tây", "Hoa chocolate"];
        $hoaTuoi = ["Bó hoa", "Giỏ hoa", "Hộp hoa", "Hoa messenger"];
        $suKien = ["Hoa sinh nhật", "Hoa noel", "Hoa anniversary", "Hoa chúc mừng", "Hoa cưới", "Hoa tốt nghiệp", "Hoa chia buồn"];
        $loaiHoa = ["Hoa sáp", "Hoa khô", "Hoa nhập khẩu", "Hoa hướng dương"];
        $thuCung = "Hoa thú cưng";
        $Gon = "Gòn";
        $lanHoDiep = "Lan hồ điệp";

        $today = new DateTime('Asia/Ho_Chi_Minh');

        for ($i=1; $i <= count($khaiTruong); $i++) {
            array_push($list, [
                'l_ten'     => $khaiTruong[$i-1],
                'l_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'l_capNhat' => $today->format('Y-m-d H:i:s'),
                'cd_id'     => 1
            ]);
        }
        for ($i=1; $i <= count($anDuoc); $i++) {
            array_push($list, [
                'l_ten'     => $anDuoc[$i-1],
                'l_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'l_capNhat' => $today->format('Y-m-d H:i:s'),
                'cd_id'     => 2
            ]);
        }
        for ($i=1; $i <= count($hoaTuoi); $i++) {
            array_push($list, [
                'l_ten'     => $hoaTuoi[$i-1],
                'l_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'l_capNhat' => $today->format('Y-m-d H:i:s'),
                'cd_id'     => 3
            ]);
        }
        for ($i=1; $i <= count($suKien); $i++) {
            array_push($list, [
                'l_ten'     => $suKien[$i-1],
                'l_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'l_capNhat' => $today->format('Y-m-d H:i:s'),
                'cd_id'     => 4
            ]);
        }
        array_push($list, [
            'l_ten'     => $thuCung,
            'l_taoMoi'  => $today->format('Y-m-d H:i:s'),
            'l_capNhat' => $today->format('Y-m-d H:i:s'),
            'cd_id'     => 5
        ]);
        for ($i=1; $i <= count($loaiHoa); $i++) {
            array_push($list, [
                'l_ten'     => $loaiHoa[$i-1],
                'l_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'l_capNhat' => $today->format('Y-m-d H:i:s'),
                'cd_id'     => 6
            ]);
        }
        array_push($list, [
            'l_ten'     => $lanHoDiep,
            'l_taoMoi'  => $today->format('Y-m-d H:i:s'),
            'l_capNhat' => $today->format('Y-m-d H:i:s'),
            'cd_id'     => 7
        ]);
        array_push($list, [
            'l_ten'     => $Gon,
            'l_taoMoi'  => $today->format('Y-m-d H:i:s'),
            'l_capNhat' => $today->format('Y-m-d H:i:s'),
            'cd_id'     => 8
        ]);

        DB::table('home_loai')->insert($list);
    }
}
