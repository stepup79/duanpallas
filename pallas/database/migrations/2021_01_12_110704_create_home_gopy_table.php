<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeGopyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_gopy', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('gy_id')->comment('ID góp ý');
            $table->dateTime('gy_thoiGian')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm góp ý # Thời điểm góp ý');
            $table->text('gy_noiDung')->comment('Góp ý # Nội dung góp ý');
            $table->unsignedInteger('kh_id')->comment('Khách hàng # kh_ma # kh_hoTen # Mã khách hàng');
            $table->unsignedInteger('sp_id')->comment('Sản phẩm # sp_ma # sp_ten # Mã sản phẩm');
            $table->unsignedTinyInteger('gy_trangThai')->default('3')->comment('Trạng thái # Trạng thái góp ý: 1-khóa, 2-hiển thị, 3-chờ duyệt');

            $table->foreign('kh_id')->references('kh_id')->on('home_khachhang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_id')->references('sp_id')->on('home_sanpham')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `home_gopy` comment 'Góp ý # Góp ý'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_gopy');
    }
}
