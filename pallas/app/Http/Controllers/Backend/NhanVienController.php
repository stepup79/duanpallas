<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NhanVien;
use App\Quyen;
use Carbon\Carbon;
use Storage;
use Session;
use App\Http\Requests\NhanVienCreateRequest;
use App\Exports\NhanVienExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataNhanvien = NhanVien::paginate(5);
            return view('backend.nhanvien.index')
                ->with('dataNhanvien', $dataNhanvien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataQuyen = Quyen::all();
        return view('backend.nhanvien.create')
            ->with('dataQuyen', $dataQuyen);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NhanVienCreateRequest $request)
    {
        $nhanvien = new NhanVien();
        $nhanvien->nv_taiKhoan = $request->nv_taiKhoan;
        $nhanvien->nv_matKhau = $request->nv_matKhau;
        $nhanvien->nv_hoTen = $request->nv_hoTen;
        $nhanvien->nv_ngaySinh = $request->nv_ngaySinh;
        $nhanvien->nv_gioiTinh = $request->nv_gioiTinh;
        $nhanvien->nv_dienThoai = $request->nv_dienThoai;
        $nhanvien->nv_email = $request->nv_email;
        $nhanvien->nv_diaChi = $request->nv_diaChi;
        $nhanvien->q_id = $request->q_id;
        $nhanvien->nv_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $nhanvien->nv_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $nhanvien->nv_trangThai = $request->nv_trangThai;
        $nhanvien->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Thêm mới thành công!');
        // Save thành công điều hướng về route index
        return redirect()->route('admin.nhanvien.index');
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
        $nhanvien = NhanVien::find($id);
        $dataQuyen = Quyen::all();

        return view('backend.nhanvien.edit')
            ->with('nhanvien', $nhanvien)
            ->with('dsQuyen', $dataQuyen);
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
        $nhanvien = NhanVien::find($id);
        $nhanvien->nv_taiKhoan = $request->nv_taiKhoan;
        $nhanvien->nv_matKhau = $request->nv_matKhau;
        $nhanvien->nv_hoTen = $request->nv_hoTen;
        $nhanvien->nv_ngaySinh = $request->nv_ngaySinh;
        $nhanvien->nv_gioiTinh = $request->nv_gioiTinh;
        $nhanvien->nv_dienThoai = $request->nv_dienThoai;
        $nhanvien->nv_email = $request->nv_email;
        $nhanvien->nv_diaChi = $request->nv_diaChi;
        $nhanvien->q_id = $request->q_id;
        $nhanvien->nv_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $nhanvien->nv_trangThai = $request->nv_trangThai;
        $nhanvien->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.nhanvien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanvien = NhanVien::find($id);

        $nhanvien->delete();
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.nhanvien.index');
    }

    /**
     * Action hiển thị biểu mẫu xem trước khi in trên Web
     */
    public function print()
    {
        $dataNhanvien = NhanVien::all();
        $dataQuyen = Quyen::all();
        
        return view('backend.nhanvien.print')
            ->with('danhsachnhanvien', $dataNhanvien)
            ->with('danhsachquyen', $dataQuyen);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new NhanVienExport, 'danhmucnhanvien.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dataNhanvien = NhanVien::all();
        $dataQuyen = Quyen::all();
        $data = [
            'danhsachnhanvien' => $dataNhanvien,
            'danhsachquyen' => $dataQuyen
        ];
        
        $pdf = PDF::loadView('backend.nhanvien.pdf', $data);
        return $pdf->download('DanhMucNhanVien.pdf');
    }
}
