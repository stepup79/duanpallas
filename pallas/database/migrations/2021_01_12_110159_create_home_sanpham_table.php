<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('sp_id')->comment('ID sản phẩm');
            $table->string('sp_ma', 20)->comment('Mã sản phẩm # Mã sản phẩm');
            $table->string('sp_ten', 100)->comment('Tên sản phẩm # Tên sản phẩm');
            $table->unsignedInteger('sp_gia')->default('0')->comment('Giá # Giá bán hiện tại của sản phẩm');
            $table->string('sp_hinh', 200)->comment('Hình đại diện # Hình đại diện của sản phẩm');
            $table->text('sp_thongTin')->comment('Thông tin # Thông tin về sản phẩm');
            $table->string('sp_danhGia', 50)->default('0;0;0;0;0')->comment('Chất lượng # Chất lượng của sản phẩm (1-5 sao), định dạng: 1;2;3;4;5');
            $table->timestamp('sp_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo sản phẩm');
            $table->timestamp('sp_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật sản phẩm gần nhất');
            $table->unsignedTinyInteger('sp_trangThai')->default('2')->comment('Trạng thái # Trạng thái sản phẩm: 1-khóa, 2-khả dụng');
            $table->unsignedTinyInteger('l_id')->comment('Loại sản phẩm # l_id # l_ten # ID loại sản phẩm');
            $table->unsignedTinyInteger('ncc_id')->comment('Nhà cung cấp # ncc_id # ncc_ten # ID nhà cung cấp');
            
            $table->unique(['sp_ma']);
            $table->unique(['sp_ten']);
            $table->foreign('l_id')->references('l_id')->on('home_loai')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ncc_id')->references('ncc_id')->on('home_nhacungcap')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `home_sanpham` comment 'Sản phẩm # Sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_sanpham');
    }
}
