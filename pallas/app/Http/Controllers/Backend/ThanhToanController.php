<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ThanhToan;
use Carbon\Carbon;
use App\Http\Requests\ThanhToanCreateRequest;
use Storage;
use Session;
use App\Exports\ThanhToanExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class ThanhToanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataThanhtoan = ThanhToan::paginate(5);
            return view('backend.thanhtoan.index')
                ->with('dataThanhtoan', $dataThanhtoan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.thanhtoan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThanhToanCreateRequest $request)
    {
        $thanhtoan = new ThanhToan();
        $thanhtoan->tt_ten = $request->tt_ten;
        $thanhtoan->tt_dienGiai = $request->tt_dienGiai;
        $thanhtoan->tt_taoMoi = Carbon::now();
        $thanhtoan->tt_capNhat = Carbon::now();
        $thanhtoan->tt_trangThai = $request->tt_trangThai;
        $thanhtoan->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Thêm mới thành công!');
        // Save thành công điều hướng về route index
        return redirect(route('admin.thanhtoan.index'));
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
        $thanhtoan = ThanhToan::find($id);

        return view('backend.thanhtoan.edit')
            ->with('thanhtoan', $thanhtoan);
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
        $thanhtoan = ThanhToan::find($id);

        $thanhtoan->tt_ten = $request->tt_ten;
        $thanhtoan->tt_dienGiai = $request->tt_dienGiai;
        $thanhtoan->tt_capNhat = Carbon::now();
        $thanhtoan->tt_trangThai = $request->tt_trangThai;
        $thanhtoan->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.thanhtoan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thanhtoan = ThanhToan::find($id);

        $thanhtoan->delete();
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.thanhtoan.index');
    }

    /**
     * Action xuất bản in
     */
    public function print()
    {
        $dsThanhToan = ThanhToan::all();
        
        return view('backend.thanhtoan.print')
            ->with('danhsachthanhtoan', $dsThanhToan);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new ThanhToanExport, 'danhmucthanhtoan.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dataThanhtoan = ThanhToan::all();
        $data = [
            'danhsachthanhtoan' => $dataThanhtoan
        ];
        
        $pdf = PDF::loadView('backend.thanhtoan.pdf', $data);
        return $pdf->download('DanhMucThanhToan.pdf');
    }
}
