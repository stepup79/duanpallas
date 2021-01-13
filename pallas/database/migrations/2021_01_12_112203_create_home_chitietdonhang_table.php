<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_chitietdonhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('dh_id')->comment('Đơn hàng # dh_id # dh_ma # Mã đơn hàng');
            $table->unsignedInteger('sp_id')->comment('Sản phẩm # sp_id # sp_ma # Mã sản phẩm');
            $table->unsignedTinyInteger('ctdh_soLuong')->default('1')->comment('Số lượng # Số lượng sản phẩm đặt mua');
            $table->unsignedInteger('ctdh_donGia')->default('1')->comment('Đơn giá # Giá bán');

            $table->primary(['dh_id', 'sp_id']);
            $table->foreign('dh_id')->references('dh_id')->on('home_donhang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_id')->references('sp_id')->on('home_sanpham')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `home_chitietdonhang` comment 'Chi tiết đơn hàng # Chi tiết đơn hàng: sản phẩm, số lượng, đơn giá, đơn hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_chitietdonhang');
    }
}
