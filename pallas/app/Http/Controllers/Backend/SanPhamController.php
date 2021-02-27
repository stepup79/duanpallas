<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\Loai;
use App\NhaCungCap;
use Carbon\Carbon;
use Storage;
use Session;
use App\Http\Requests\SanPhamCreateRequest;
use App\HinhAnh;
use App\Exports\SanPhamExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSanpham = SanPham::paginate(5);
        return view ('backend.sanpham.index')
            ->with('dataSanpham', $dataSanpham);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataLoai = Loai::all();
        $dataNhacungcap = NhaCungCap::all();
        return view('backend.sanpham.create')
            ->with('dataLoai', $dataLoai)
            ->with('dataNhacungcap', $dataNhacungcap);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SanPhamCreateRequest $request)
    {
        // Tạo mới object SanPham
        $sanpham = new SanPham();
        $sanpham->sp_ma = $request->sp_ma;
        $sanpham->sp_ten = $request->sp_ten;
        $sanpham->sp_gia = $request->sp_gia;
        $sanpham->sp_thongTin = $request->sp_thongTin;
        $sanpham->sp_danhGia = $request->sp_danhGia;
        $sanpham->sp_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $sanpham->sp_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $sanpham->sp_trangThai = $request->sp_trangThai;
        $sanpham->l_id = $request->l_id;
        $sanpham->ncc_id = $request->ncc_id;

        if($request->hasFile('sp_hinh')) {
            $file = $request->sp_hinh;
            // 1. Lưu tên hình vào cột sp_hinh
            $sanpham->sp_hinh = $file->getClientOriginalName();

            // 2. Chép file vào thư mục "photos"
            // thư mục gốc storage/app
            // ánh xạ thư mục: php artisan storage:link
            $fileSaved = $file->storeAs('public/photos', $sanpham->sp_hinh);
        }
        $sanpham->save();

        // Lưu hình ảnh liên quan
        if($request->hasFile('sp_hinhanhlienquan')) {
            $files = $request->sp_hinhanhlienquan;

            // duyệt từng ảnh và thực hiện lưu
            foreach ($request->sp_hinhanhlienquan as $index => $file) {
                
                $file->storeAs('public/photos', $file->getClientOriginalName());

                // Tạo đối tưọng HinhAnh
                $hinhanh = new HinhAnh();
                $hinhanh->sp_id = $sanpham->sp_id;
                $hinhanh->ha_stt = ($index + 1);
                $hinhanh->ha_ten = $file->getClientOriginalName();
                $hinhanh->save();
            }
        }
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Thêm mới thành công!');

        // Save thành công điều hướng về route index
        return redirect(route('admin.sanpham.index'));
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
        $sanpham = SanPham::where("sp_id", $id)->first(); 
        $dataLoai = Loai::all(); 
        $dataNhacungcap = NhaCungCap::all();

        return view('backend.sanpham.edit')
            ->with('sp', $sanpham)
            ->with('dsLoai', $dataLoai)
            ->with('dsNhacungcap', $dataNhacungcap);       
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
        // Tìm object Sản phẩm theo khóa chính
        $sanpham = SanPham::where("sp_id",  $id)->first();
        $sanpham->sp_ma = $request->sp_ma;
        $sanpham->sp_ten = $request->sp_ten;
        $sanpham->sp_gia = $request->sp_gia;
        $sanpham->sp_thongTin = $request->sp_thongTin;
        $sanpham->sp_danhGia = $request->sp_danhGia;
        $sanpham->sp_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $sanpham->sp_trangThai = $request->sp_trangThai;
        $sanpham->l_id = $request->l_id;
        $sanpham->ncc_id = $request->ncc_id;

        // Kiểm tra xem người dùng có upload hình ảnh Đại diện hay không?
        if($request->hasFile('sp_hinh'))
        {
            // Xóa hình cũ để tránh rác
            // file gốc stogare/app
            Storage::delete('public/photos/' . $sanpham->sp_hinh);

            // Upload hình mới
            // Lưu tên hình vào column sp_hinh
            $file = $request->sp_hinh;
            $sanpham->sp_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            // file ánh xạ
            $fileSaved = $file->storeAs('public/photos', $sanpham->sp_hinh);
        }
        // Lưu hình ảnh liên quan
        if ($request->hasFile('sp_hinhanhlienquan')) {
            // DELETE các dòng liên quan trong table `HinhAnh`
            foreach ($sanpham->hinhanhlienquan()->get() as $hinhanh) {
                // Xóa hình cũ để tránh rác
                Storage::delete('public/photos/' . $hinhanh->ha_ten);

                // Xóa record
                $hinhanh->delete();
            }

            $files = $request->sp_hinhanhlienquan;

            // duyệt từng ảnh và thực hiện lưu
            foreach ($request->sp_hinhanhlienquan as $index => $file) {

                $file->storeAs('public/photos', $file->getClientOriginalName());

                // Tạo đối tưọng HinhAnh
                $hinhanh = new HinhAnh();
                $hinhanh->sp_id = $sanpham->sp_id;
                $hinhanh->ha_stt = ($index + 1);
                $hinhanh->ha_ten = $file->getClientOriginalName();
                $hinhanh->save();
            }
        }
        $sanpham->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.sanpham.index');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Tìm object Sản phẩm theo khóa chính
        $sanpham = SanPham::where("sp_id",  $id)->first();

        // Nếu tìm thấy được sản phẩm thì tiến hành thao tác DELETE
        if(empty($sanpham) == false)
        {
            // DELETE các dòng liên quan trong table `HinhAnh` 
            foreach ($sanpham->hinhanhlienquan()->get() as $hinhanh) {
                // Xóa hình cũ để tránh rác 
                Storage::delete('public/photos/' . $hinhanh->ha_ten);

                // Xóa record 
                $hinhanh->delete();
            }
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $sanpham->sp_hinh);
        }
        $sanpham->delete();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa sản phẩm thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.sanpham.index');
    }

    /**
     * Action xuất bản in
     */
    public function print()
    {
        $dsSanPham = SanPham::all();
        $dsLoai = Loai::all();
        $dsNhaCungCap = NhaCungCap::all();
        
        return view('backend.sanpham.print')
            ->with('danhsachsanpham', $dsSanPham)
            ->with('danhsachloai', $dsLoai)
            ->with('danhsachnhacungcap', $dsNhaCungCap);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new SanPhamExport, 'danhsachsanpham.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dsSanPham = SanPham::all();
        $dsLoai = Loai::all();
        $dsNhaCungCap = NhaCungCap::all();
        $data = [
            'danhsachsanpham' => $dsSanPham,
            'danhsachloai' => $dsLoai,
            'danhsachnhacungcap' => $dsNhaCungCap
        ];

        $pdf = PDF::loadView('backend.sanpham.pdf', $data);
        return $pdf->download('DanhMucSanPham.pdf');
    }
}
