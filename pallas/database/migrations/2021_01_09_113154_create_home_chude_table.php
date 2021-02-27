<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_chude', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->tinyIncrements('cd_id')->comment('ID chủ đề');
            $table->string('cd_ten', 50)->comment('Tên chủ đề # Tên chủ đề');
            $table->timestamp('cd_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo chủ đề');
            $table->timestamp('cd_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật chủ đề gần nhất');
            $table->unsignedTinyInteger('cd_trangThai')->default('2')->comment('Trạng thái # Trạng thái chủ đề: 1-khóa, 2-khả dụng');
        
            $table->unique(['cd_ten']);
        });
        DB::statement("ALTER TABLE `home_chude` comment 'Chủ đề # Chủ đề: khai trương, sự kiện,...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_chude');
    }
}
