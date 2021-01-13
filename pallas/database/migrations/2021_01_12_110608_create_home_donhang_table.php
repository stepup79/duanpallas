<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_donhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('dh_id')->comment('ID đơn hàng');
            $table->string('dh_ma', 20)->comment('Mã đơn hàng');
            $table->unsignedInteger('kh_id')->comment('Khách hàng # kh_id # kh_hoTen # ID khách hàng');
            $table->dateTime('dh_thoiGianDatHang')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm đặt hàng # Thời điểm đặt hàng');
            $table->dateTime('dh_thoiGianNhanHang')->comment('Thời điểm giao hàng # Thời điểm giao hàng theo yêu cầu của khách hàng');
            $table->string('dh_nguoiNhan', 100)->comment('Người nhận quà # Họ tên người nhận (tên hiển thị)');
            $table->string('dh_diaChi', 191)->comment('Địa chỉ người nhận # Địa chỉ người nhận');
            $table->string('dh_dienThoai', 11)->comment('Điện thoại người nhận # Điện thoại người nhận');
            $table->string('dh_nguoiGui', 100)->comment('Người tặng quà # Người tặng (tên hiển thị)');
            $table->text('dh_loiChuc')->default(NULL)->comment('Lời chúc # Lời chúc ghi trên thiệp');
            $table->unsignedInteger('nv_xuLy')->default('1')->comment('Xử lý đơn hàng # nv_ma # nv_hoTen # Mã nhân viên (người xử lý đơn hàng), 1-chưa phân công');
            $table->dateTime('dh_ngayXuLy')->default(NULL)->comment('Thời điểm xử lý # Thời điểm xử lý đơn hàng');
            $table->unsignedInteger('nv_giaoHang')->default('1')->comment('Giao hàng # nv_ma # nv_hoTen # Mã nhân viên (người lập phiếu giao hàng và giao hàng), 1-chưa phân công');
            $table->dateTime('dh_ngayLapPhieuGiao')->default(NULL)->comment('Thời điểm lập phiếu giao # Thời điểm lập phiếu giao');
            $table->dateTime('dh_ngayGiaoHang')->default(NULL)->comment('Thời điểm khách nhận được hàng # Thời điểm khách nhận được hàng');
            $table->timestamp('dh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo đơn hàng');
            $table->timestamp('dh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật đơn hàng gần nhất');
            $table->unsignedTinyInteger('dh_trangThai')->default('1')->comment('Trạng thái # Trạng thái đơn hàng: 1-nhận đơn, 2-xử lý đơn, 3-giao hàng, 4-hoàn tất, 5-đổi trả, 6-hủy');
            $table->unsignedTinyInteger('vc_id')->comment('Dịch vụ giao hàng # vc_ma # vc_ten # Mã dịch vụ giao hàng');
            $table->unsignedTinyInteger('tt_id')->comment('Phương thức thanh toán # tt_ma # tt_ten # Mã phương thức thanh toán');

            $table->foreign('kh_id')->references('kh_id')->on('home_khachhang')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_xuLy')->references('nv_id')->on('home_nhanvien')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_giaoHang')->references('nv_id')->on('home_nhanvien')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('vc_id')->references('vc_id')->on('home_vanchuyen')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tt_id')->references('tt_id')->on('home_thanhtoan')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `home_donhang` comment 'Đơn hàng # Đơn hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_donhang');
    }
}
