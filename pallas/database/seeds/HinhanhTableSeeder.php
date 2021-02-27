<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class HinhanhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];

        $categories = ["KeHoa_Congratulation.jpg", "KeHoa-SuperRed.jpg", "KeHoa_LuckyMoney.jpg",
        "GiaHoa_RedPremium.jpg", "GiaHoa_FireWork.jpg", "BestRomance_Plus_Pastel.jpg", "Dau_MixBaby.jpg", "HopDau_Baby.jpg",
        "KitKat_Valentine.jpg", "BabyFerrero_new.jpg", "Mini_PinkColor.jpg", "BabyInTheSky_2.jpg", "GioMay_Blue_mix.jpg",
        "GioMay_FreeSpirit_mixJuliet.jpg", "HopBabyRainbow_Small.jpg", "3_Red_Rose_Box.jpg", "HoaVietTay_SummerMix.jpg", "HoaMessenger_SpringMix_GoodDay_2.jpg",
        "HongKemBaby.jpg", "Chau_Xmas_BabyRainbow_DenLed_2.jpg", "RedEcuadormixBaby_mixBlackPaper.jpg", "HopHoa_HuongDuongMix.jpg", "HoaCuoiBaby.jpg",
        "HappyEnding.jpg", "Bo_Gon_TotNghiep_3V_BabyXanh.jpg", "KeHoaChiaBuon_FullTrang.jpg", "KeHoa_LastGoodbye-1.jpg", "HopFerrero_mixHong_vaBaby.jpg",
        "Hop_PingPongBeHeo_Baby_2.jpg", "Bo_HoaPingPongSap_Minion_3b.jpg", "CTC_Kho_1b.jpg", "FreeSpirit_5b.jpg", "FancyCakemixBlackPaper.jpg",
        "SunnyDay_399.jpg", "Lan_3canhTrang_giayLua_XanhNgoc.jpg", "Lan_6Canh_Vang_Luxury_VaiVang.jpg", "Hop_Gon_MuiVi.jpg", "SuperGon_WhitePaper.jpg",
        "HopGon_3v_Halloween_2.jpg"];

        for ($i=1; $i <= count($categories); $i++) {
            array_push($list, [
                'sp_id'     => $i,
                'ha_stt'  => $i,
                'ha_ten' => $categories[$i-1]
            ]);
        }
        DB::table('home_hinhanh')->insert($list);
    }
}
