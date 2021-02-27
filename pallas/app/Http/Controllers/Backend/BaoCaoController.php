<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BaoCaoController extends Controller
{
    /**
     * Action hiển thị view Báo cáo đơn hàng
     */
    public function donhang()
    {
        return view('backend.dashboard');
    }

    /**
     * Action AJAX get data cho báo cáo Đơn hàng
     */
    public function donhangData(Request $request)
    {
        $parameter = [
            'tuNgay' => $request->tuNgay,
            'denNgay' => $request->denNgay
        ];
        // dd($parameter);
        $data = DB::select('
            SELECT dh.dh_ngayDatHang as thoiGian
                , SUM(ctdh.ctdh_soLuong * ctdh.ctdh_donGia) as tongThanhTien
            FROM home_donhang dh
            JOIN home_chitietdonhang ctdh ON dh.dh_id = ctdh.dh_id
            WHERE dh.dh_ngayDatHang BETWEEN :tuNgay AND :denNgay
            GROUP BY dh.dh_ngayDatHang
        ', $parameter);

        return response()->json(array(
            'code'  => 200,
            'data' => $data,
        ));
    }
}
