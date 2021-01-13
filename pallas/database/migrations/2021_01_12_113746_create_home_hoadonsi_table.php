<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeHoadonsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_hoadonsi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('hds_id')->comment('ID hóa đơn bán sĩ');
            $table->string('hds_ma', 20)->comment('Mã hóa đơn bán sĩ');
            $table->string('hds_khachHang', 50)->comment('Người mua hàng # Họ tên khách hàng');
            $table->string('hds_tenDonVi', 150)->comment('Đơn vị # Tên đơn vị');
            $table->string('hds_diaChi', 250)->comment('Địa chỉ # Địa chỉ đơn vị');
            $table->string('hds_soTaiKhoan', 20)->default(NULL)->comment('Số tài khoản # Số tài khoản');
            $table->unsignedInteger('nv_lapHoaDon')->comment('Lập hóa đơn # nv_ma # nv_hoTen # Mã nhân viên (người lập hóa đơn)');
            $table->dateTime('hds_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm xuất # Thời điểm xuất hóa đơn');
            $table->timestamp('hds_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo hóa đơn');
            $table->timestamp('hds_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật hóa đơn gần nhất');
            $table->unsignedTinyInteger('hds_trangThai')->default('1')->comment('Trạng thái # Trạng thái hóa đơn: 1-lập hóa đơn, 2-xuất hóa đơn, 3-hủy');
            $table->unsignedInteger('dh_id')->default('1')->comment('Đơn hàng # dh_id # dh_ma # Mã đơn hàng, 1-Không xuất hóa đơn');
            $table->unsignedTinyInteger('tt_id')->comment('Phương thức thanh toán # tt_id # tt_ten # Mã phương thức thanh toán');

            $table->foreign('nv_lapHoaDon')->references('nv_id')->on('home_nhanvien')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('dh_id')->references('dh_id')->on('home_donhang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tt_id')->references('tt_id')->on('home_thanhtoan')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `home_hoadonsi` comment 'Hóa đơn bán sỉ # Hóa đơn bán sỉ: sản phẩm, màu, số lượng, đơn giá, đơn hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_hoadonsi');
    }
}
