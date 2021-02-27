<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class VanchuyenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = new DateTime('Asia/Ho_Chi_Minh');

        $list = [
            [
                'vc_ten'      => "Miễn phí",
                'vc_chiPhi'   => 0,
                'vc_dienGiai' => "Nhận hàng trực tiếp tại cửa hàng.",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ],
            [
                'vc_ten'      => "Miễn phí (vận chuyển nhanh)",
                'vc_chiPhi'   => 0,
                'vc_dienGiai' => "Áp dụng cho đơn hàng trong bán kính 2km.",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ],
            [
                'vc_ten'      => "Miễn phí (đơn hàng trên 500.000đ)",
                'vc_chiPhi'   => 0,
                'vc_dienGiai' => "Chỉ áp dụng các quận nội ô Tp. Cần Thơ (ngoại trừ các quận Thốt Nốt, Ô Môn).",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'vc_ten'      => "Ưu tiên (đơn hàng dưới 500.000đ)",
                'vc_chiPhi'   => 30000,
                'vc_dienGiai' => "Chỉ áp dụng các quận nội ô Tp. Cần Thơ (ngoại trừ các quận Thốt Nốt, Ô Môn).",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ], 
            [
                'vc_ten'      => "Bình thường",
                'vc_chiPhi'   => 35000,
                'vc_dienGiai' => "Áp dụng cho các quận, huyện ngoại ô Tp. Cần Thơ (ngoại trừ các quận Cái Răng, Bình Thủy, Ninh Kiều).",
                'vc_taoMoi'   => $today->format('Y-m-d H:i:s'),
                'vc_capNhat'  => $today->format('Y-m-d H:i:s')
            ]
        ];

        DB::table('home_vanchuyen')->insert($list);
    }
}
