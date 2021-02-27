<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(VanchuyenTableSeeder::class);
        $this->call(ThanhtoanTableSeeder::class);
        $this->call(ChudeTableSeeder::class);
        $this->call(LoaiTableSeeder::class);
        $this->call(KhachhangTableSeeder::class);       
        $this->call(QuyenTableSeeder::class);
        $this->call(NhacungcapTableSeeder::class);
        $this->call(SanphamTableSeeder::class);
        $this->call(NhanvienTableSeeder::class);      
        $this->call(DonhangTableSeeder::class);
        $this->call(GopyTableSeeder::class);
        $this->call(ChitietdonhangTableSeeder::class);
        $this->call(HinhanhTableSeeder::class);
        $this->call(ChudesanphamTableSeeder::class);
    }
}
