<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KhachHang;
use Carbon\Carbon;
use Storage;
use Session;
use App\Http\Requests\KhachHangCreateRequest;
use App\Exports\KhachHangExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKhachhang = KhachHang::paginate(5);
            return view('backend.khachhang.index')
                ->with('dataKhachhang', $dataKhachhang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.khachhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhachHangCreateRequest $request)
    {
        $khachhang = new KhachHang();
        $khachhang->kh_taiKhoan = $request->kh_taiKhoan;
        $khachhang->kh_matKhau = $request->kh_matKhau;
        $khachhang->kh_hoTen = $request->kh_hoTen;
        $khachhang->kh_ngaySinh = $request->kh_ngaySinh;
        $khachhang->kh_gioiTinh = $request->kh_gioiTinh;
        $khachhang->kh_dienThoai = $request->kh_dienThoai;
        $khachhang->kh_email = $request->kh_email;
        $khachhang->kh_diaChi = $request->kh_diaChi;
        $khachhang->kh_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $khachhang->kh_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $khachhang->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Đăng ký thành công!');
        // Save thành công điều hướng về route login
        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khachhang = KhachHang::find($id);

        return view('backend.khachhang.edit')
            ->with('khachhang', $khachhang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $khachhang = KhachHang::find($id);
        $khachhang->kh_taiKhoan = $request->kh_taiKhoan;
        $khachhang->kh_matKhau = $request->kh_matKhau;
        $khachhang->kh_hoTen = $request->kh_hoTen;
        $khachhang->kh_ngaySinh = $request->kh_ngaySinh;
        $khachhang->kh_gioiTinh = $request->kh_gioiTinh;
        $khachhang->kh_dienThoai = $request->kh_dienThoai;
        $khachhang->kh_email = $request->kh_email;
        $khachhang->kh_diaChi = $request->kh_diaChi;
        $khachhang->kh_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $khachhang->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        // Save thành công điều hướng về route login
        return redirect()->route('login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khachhang = KhachHang::find($id);

        $khachhang->delete();
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.khachhang.index');
    }

    /**
     * Action hiển thị biểu mẫu xem trước khi in trên Web
     */
    public function print()
    {
        $dataKhachhang = KhachHang::all();
        
        return view('backend.khachhang.print')
            ->with('danhsachkhachhang', $dataKhachhang);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new KhachHangExport, 'danhmuckhachhang.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dataKhachhang = KhachHang::all();
        $data = [
            'danhsachkhachhang' => $dataKhachhang
        ];
        
        $pdf = PDF::loadView('backend.khachhang.pdf', $data);
        return $pdf->download('DanhMucKhachHang.pdf');
    }
}
