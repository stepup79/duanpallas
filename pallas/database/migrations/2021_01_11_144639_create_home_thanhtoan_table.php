<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_thanhtoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->tinyIncrements('tt_id')->comment('ID phương thức thanh toán');
            $table->string('tt_ten', 200)->comment('Tên phương thức # Tên phương thức thanh toán');
            $table->text('tt_dienGiai')->comment('Thông tin # Thông tin về phương thức thanh toán');
            $table->timestamp('tt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo phương thức thanh toán');
            $table->timestamp('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật phương thức thanh toán gần nhất');
            $table->unsignedTinyInteger('tt_trangThai')->default('2')->comment('Trạng thái # Trạng thái phương thức thanh toán: 1-khóa, 2-hiển thị');
        
            $table->unique(['tt_ten']);
        });
        DB::statement("ALTER TABLE `home_thanhtoan` comment 'Phương thức thanh toán # Phương thức thanh toán'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_thanhtoan');
    }
}
