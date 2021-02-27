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
            $today = new DateTime('Asia/Ho_Chi_Minh');
            $phone    = $uPI->Mobile("", VnBase::VnFalse);
            $address  = $uPI->Address();
            array_push($list, [
                'dh_ma'                   => '2021DH'.$i,
                'kh_id'                   => $faker->numberBetween(1, 30),
                'dh_ngayDatHang'          => $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now', $timezone = null),
                'dh_ngayGiaoHang'         => $today->format('Y-m-d H:i:s'),
                'dh_nguoiNhan'            => "dh_nguoiNhan $i",
                'dh_diaChi'               => $address,
                'dh_dienThoai'            => $phone,
                'dh_loiChuc'              => "dh_loiChuc $i",
                'nv_giaoHang'             => $faker->numberBetween(1, 9),
                'dh_taoMoi'               => $today->format('Y-m-d H:i:s'),
                'dh_capNhat'              => $today->format('Y-m-d H:i:s'),
                'dh_trangThai'            => $faker->numberBetween(1, 5),
                'vc_id'                   => $faker->numberBetween(1, 5),
                'tt_id'                   => $faker->numberBetween(1, 4)
            ]);
        }
        DB::table('home_donhang')->insert($list);
    }
}
