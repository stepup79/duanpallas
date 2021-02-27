<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class NhacungcapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $nhaCungCap = ["DNTN Hoa Mười", "Công ty TNHH Hướng Dương", "Công ty MTV Mặt Trời", "Công ty TNHH FLOWER", "DNTN Ánh Nắng"];
        $daiDien = ["Trần Minh Phú", "Trương Phi Hải", "Nguyễn Ngọc Long", "Ngộ Thị Ánh", "Lê Thị Thủy"];
        $diaChi= ["Phù Đổng Thiên Vương, P. 8, TP. Đà Lạt, Lâm Đồng", "Mai Anh Đào, P. 8, TP. Đà Lạt, Lâm Đồng",
                    "Khóm Tân Mỹ, P. Tân Quy Đông, TP. Sa Đéc, Đồng Tháp", "Nguyễn Đình Chiểu, P. 9, TP. Đà Lạt, Lâm Đồng",
                    "Ấp Mỹ Hưng, X. Mỹ Phong, TP. Mỹ Tho, Tiền Giang"];
        $dienThoai =["0956926456", "0863464648", "0125943599", "08932353326", "0135724924"];
        $email =["hoamuoi@gmail.com", "hoatuoi@matroi.vn", "huongduong@gmail.com", "flowervn@gmail.com", "anhnangstore@gmail.com"];
        

        $today = new DateTime('Asia/Ho_Chi_Minh');
        for ($i=1; $i <= count($nhaCungCap); $i++)  {
            array_push($list, [
                'ncc_ten'       => $nhaCungCap[$i-1],
                'ncc_daiDien'   => $daiDien[$i-1],
                'ncc_diaChi'    => $diaChi[$i-1],
                'ncc_dienThoai' => $dienThoai[$i-1],
                'ncc_email'     => $email[$i-1],
                'ncc_taoMoi'    => $today->format('Y-m-d H:i:s'),
                'ncc_capNhat'   => $today->format('Y-m-d H:i:s'),
            ]);
        }
        
        DB::table('home_nhacungcap')->insert($list);
    }
}
