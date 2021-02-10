<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class DonhangTableSeeder extends Seeder
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
        $faker = Faker\Factory::create('vi_VN');

        for ($i=1; $i <= 15; $i++) {
            $today = new DateTime();
            $phone    = $uPI->Mobile("", VnBase::VnFalse);
            $address  = $uPI->Address();
            array_push($list, [
                'dh_ma'                   => 'DDH'.$i,
                'kh_id'                   => $faker->numberBetween(1, 30),
                'dh_thoiGianDatHang'      => $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now', $timezone = null),
                'dh_thoiGianNhanHang'     => $today->format('Y-m-d H:i:s'),
                'dh_nguoiNhan'            => "dh_nguoiNhan $i",
                'dh_diaChi'               => $address,
                'dh_dienThoai'            => $phone,
                'dh_nguoiGui'             => "dh_nguoiGui $i",
                'dh_loiChuc'              => "dh_loiChuc $i",
                'nv_xuLy'                 => $faker->numberBetween(1, 9),
                'dh_ngayXuLy'             => $today->format('Y-m-d H:i:s'),
                'nv_giaoHang'             => $faker->numberBetween(1, 9),
                'dh_ngayLapPhieuGiao'     => $today->format('Y-m-d H:i:s'),
                'dh_ngayGiaoHang'         => $today->format('Y-m-d H:i:s'),
                'dh_taoMoi'               => $today->format('Y-m-d H:i:s'),
                'dh_capNhat'              => $today->format('Y-m-d H:i:s'),
                'dh_trangThai'            => $faker->numberBetween(1, 5),
                'vc_id'                   => $faker->numberBetween(1, 5),
                'tt_id'                   => $faker->numberBetween(1, 3)
            ]);
        }
        DB::table('home_donhang')->insert($list);
    }
}
