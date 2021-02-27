<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ApiController extends Controller
{
    /**
     * Action thống kê top 5 sp mới nhất
     */
    public function thongke_top5_sanpham_moinhat() {
        $result = DB::table('home_sanpham')
        ->orderBy('sp_taoMoi')
        ->take(5)->get();

        return response()->json(array(
            'code' =>200,
            'result' => $result
        ));
    }

    /**
     * Action tìm kiếm
     */
    public function timkiemsanpham(Request $request) {
        // dd($request->all());
        // Lấy thông tin người dùng gửi đến
        $ten = $request->keyword_search_by_tensanpham;
        $giatu = $request->keyword_search_by_giatu;
        $giaden = $request->keyword_search_by_giaden;
        // Tạo câu lệnh mẫu
        $sql = "SELECT * FROM home_sanpham WHERE 1=1";
        if(!empty($ten)) {
            $sql .= " AND sp_ten LIKE '%$ten%' ";
        }
        if(!empty($giatu)) {
            $sql .= " AND sp_gia >= $giatu ";
        }
        if(!empty($giaden)) {
            $sql .= " AND sp_gia <= $giaden ";
        }
        // dd($sql);

        $result = DB::select($sql);

        return response()->json(array(
            'code' =>200,
            'result' => $result
        ));
    }

    /**
     * Action thống kê sản phẩm
     */
    public function thongke_sanpham() {
        $result = DB::table('home_sanpham')
             ->select(DB::raw('count(*) as soluong'))
             ->get();

        return response()->json(array(
            'code' =>200,
            'result' => $result
        ));
    }
    /**
     * Action thống kê khách hàng
     */
    public function thongke_khachhang() {
        $result = DB::table('home_khachhang')
             ->select(DB::raw('count(*) as soluong'))
             ->get();

        return response()->json(array(
            'code' =>200,
            'result' => $result
        ));
    }
    /**
     * Action thống kê đơn hàng
     */
    public function thongke_donhang() {
        $result = DB::table('home_donhang')
             ->select(DB::raw('count(*) as soluong'))
             ->get();

        return response()->json(array(
            'code' =>200,
            'result' => $result
        ));
    }
    /**
     * Action thống kê loại sản phẩm
     */
    public function thongke_loaisanpham() {
        $result = DB::table('home_loai')
             ->select(DB::raw('count(*) as soluong'))
             ->get();

        return response()->json(array(
            'code' =>200,
            'result' => $result
        ));
    }
}
