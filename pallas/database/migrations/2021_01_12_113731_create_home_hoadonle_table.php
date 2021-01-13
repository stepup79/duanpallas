<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeHoadonleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_hoadonle', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('hdl_id')->comment('ID hóa đơn bán lẻ');
            $table->string('hdl_ma', 20)->comment('Mã hóa đơn bán lẻ');
            $table->string('hdl_khachHang', 50)->comment('Người mua hàng # Họ tên khách hàng');
            $table->string('hdl_dienThoai', 11)->comment('Điện thoại # Điện thoại');
            $table->string('hdl_diaChi', 250)->comment('Địa chỉ # Địa chỉ');
            $table->unsignedInteger('nv_lapHoaDon')->comment('Lập hóa đơn # nv_ma # nv_hoTen # Mã nhân viên (người lập hóa đơn)');
            $table->dateTime('hdl_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm xuất # Thời điểm xuất hóa đơn');
            $table->unsignedInteger('dh_id')->comment('Đơn hàng # dh_ma # dh_ma # Mã đơn hàng');
            
            $table->foreign('nv_lapHoaDon')->references('nv_id')->on('home_nhanvien')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dh_id')->references('dh_id')->on('home_donhang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `home_hoadonle` comment 'Hóa đơn bán lẻ # Hóa đơn bán lẻ: sản phẩm, màu, số lượng, đơn giá, đơn hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_hoadonle');
    }
}
