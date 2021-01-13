<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_hinhanh', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('sp_id')->comment('Sản phẩm # sp_id # sp_ten # ID sản phẩm');           
            $table->unsignedTinyInteger('ha_stt')->default('1')->comment('Số thứ tự # Số thứ tự hình ảnh của mỗi sản phẩm');
            $table->string('ha_ten', 200)->comment('Tên hình ảnh # Tên hình ảnh (không bao gồm đường dẫn)');           

            $table->primary(['sp_id', 'ha_stt']);
            $table->unique(['ha_ten']);
            $table->foreign('sp_id')->references('sp_id')->on('home_sanpham')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `home_hinhanh` comment 'Hình ảnh sản phẩm # Các hình ảnh chi tiết của sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_hinhanh');
    }
}
