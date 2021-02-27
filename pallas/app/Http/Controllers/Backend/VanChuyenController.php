<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VanChuyen;
use Carbon\Carbon;
use App\Http\Requests\VanChuyenCreateRequest;
use Storage;
use Session;
use App\Exports\VanChuyenExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class VanChuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataVanchuyen = VanChuyen::paginate(5);
            return view('backend.vanchuyen.index')
                ->with('dataVanchuyen', $dataVanchuyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vanchuyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VanChuyenCreateRequest $request)
    {
        $vanchuyen = new VanChuyen();
        $vanchuyen->vc_ten = $request->vc_ten;
        $vanchuyen->vc_chiPhi = $request->vc_chiPhi;
        $vanchuyen->vc_dienGiai = $request->vc_dienGiai;
        $vanchuyen->vc_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $vanchuyen->vc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $vanchuyen->vc_trangThai = $request->vc_trangThai;
        $vanchuyen->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Thêm mới thành công!');
        // Save thành công điều hướng về route index
        return redirect()->route('admin.vanchuyen.index');
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
        $vanchuyen = VanChuyen::find($id);

        return view('backend.vanchuyen.edit')
            ->with('vanchuyen', $vanchuyen);
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
        $vanchuyen = VanChuyen::find($id);

        $vanchuyen->vc_ten = $request->vc_ten;
        $vanchuyen->vc_chiPhi = $request->vc_chiPhi;
        $vanchuyen->vc_dienGiai = $request->vc_dienGiai;
        $vanchuyen->vc_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $vanchuyen->vc_trangThai = $request->vc_trangThai;
        $vanchuyen->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.vanchuyen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vanchuyen = VanChuyen::find($id);

        $vanchuyen->delete();
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.vanchuyen.index');
    }

    /**
     * Action xuất bản in
     */
    public function print()
    {
        $dsVanChuyen = VanChuyen::all();
        
        return view('backend.vanchuyen.print')
            ->with('danhsachvanchuyen', $dsVanChuyen);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new VanChuyenExport, 'danhmucvanchuyen.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dataVanchuyen = VanChuyen::all();
        $data = [
            'danhsachvanchuyen' => $dataVanchuyen
        ];
        
        $pdf = PDF::loadView('backend.vanchuyen.pdf', $data);
        return $pdf->download('DanhMucVanChuyen.pdf');
    }
}
