<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeChudesanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_chudesanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('sp_id')->comment('Sản phẩm # sp_id # sp_ten # ID sản phẩm');
            $table->unsignedTinyInteger('cd_id')->comment('Chủ để # cd_id # cd_ten # ID chủ đề');

            $table->primary(['sp_id', 'cd_id']);
            $table->foreign('sp_id')->references('sp_id')->on('home_sanpham')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('cd_id')->references('cd_id')->on('home_chude')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `home_chudesanpham` comment 'Chủ đề sản phẩm # Sản phầm thuộc các chủ đề'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_chudesanpham');
    }
}
