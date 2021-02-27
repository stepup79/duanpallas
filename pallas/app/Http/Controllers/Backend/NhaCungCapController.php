<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NhaCungCap;
use Carbon\Carbon;
use App\Http\Requests\NhaCungCapCreateRequest;
use Storage;
use Session;
use App\Exports\NhaCungCapExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class NhaCungCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataNhacungcap = NhaCungCap::paginate(5);
            return view('backend.nhacungcap.index')
                ->with('dataNhacungcap', $dataNhacungcap);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.nhacungcap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NhaCungCapCreateRequest $request)
    {
        $nhacungcap = new NhaCungCap();
        $nhacungcap->ncc_ten = $request->ncc_ten;
        $nhacungcap->ncc_daiDien = $request->ncc_daiDien;
        $nhacungcap->ncc_diaChi = $request->ncc_diaChi;
        $nhacungcap->ncc_dienThoai = $request->ncc_dienThoai;
        $nhacungcap->ncc_email = $request->ncc_email;
        $nhacungcap->ncc_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $nhacungcap->ncc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $nhacungcap->ncc_trangThai = $request->ncc_trangThai;
        $nhacungcap->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Thêm mới thành công!');
        // Save thành công điều hướng về route index
        return redirect(route('admin.nhacungcap.index'));
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
        $nhacungcap = NhaCungCap::find($id);

        return view('backend.nhacungcap.edit')
            ->with('nhacungcap', $nhacungcap);
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
        $nhacungcap = NhaCungCap::find($id);

        $nhacungcap->ncc_ten = $request->ncc_ten;
        $nhacungcap->ncc_daiDien = $request->ncc_daiDien;
        $nhacungcap->ncc_diaChi = $request->ncc_diaChi;
        $nhacungcap->ncc_dienThoai = $request->ncc_dienThoai;
        $nhacungcap->ncc_email = $request->ncc_email;
        $nhacungcap->ncc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $nhacungcap->ncc_trangThai = $request->ncc_trangThai;
        $nhacungcap->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.nhacungcap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhacungcap = NhaCungCap::find($id);

        $nhacungcap->delete();
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.nhacungcap.index');
    }

    /**
     * Action xuất bản in
     */
    public function print()
    {
        $dsNhaCungCap = NhaCungCap::all();
        
        return view('backend.nhacungcap.print')
            ->with('danhsachnhacungcap', $dsNhaCungCap);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new NhaCungCapExport, 'danhmucnhacungcap.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dataNhacungcap = NhaCungCap::all();
        $data = [
            'danhsachnhacungcap' => $dataNhacungcap
        ];
        
        $pdf = PDF::loadView('backend.nhacungcap.pdf', $data);
        return $pdf->download('DanhMucNhaCungCap.pdf');
    }
}
