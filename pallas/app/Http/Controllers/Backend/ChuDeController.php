<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChuDe;
use Carbon\Carbon;
use Storage;
use Session;
use App\Http\Requests\ChuDeCreateRequest;
use App\Exports\ChuDeExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class ChuDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataChude = ChuDe::paginate(5);
            return view('backend.chude.index')
                ->with('dataChude', $dataChude);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.chude.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChuDeCreateRequest $request)
    {
        $chude = new ChuDe();
        $chude->cd_ten = $request->cd_ten;
        $chude->cd_taoMoi = Carbon::now();
        $chude->cd_capNhat = Carbon::now();
        $chude->cd_trangThai = $request->cd_trangThai;
        $chude->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Thêm mới thành công!');
        // Save thành công điều hướng về route index
        return redirect()->route('admin.chude.index');
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
        $chude = ChuDe::find($id);

        return view('backend.chude.edit')
            ->with('chude', $chude);
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
        $chude = ChuDe::find($id);

        $chude->cd_ten = $request->cd_ten;
        $chude->cd_capNhat = Carbon::now();
        $chude->cd_trangThai = $request->cd_trangThai;
        $chude->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.chude.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chude = ChuDe::find($id);

        $chude->delete();
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.chude.index');
    }

    /**
     * Action xuất bản in
     */
    public function print()
    {
        $dsChuDe = ChuDe::all();
        
        return view('backend.chude.print')
            ->with('danhsachchude', $dsChuDe);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new ChuDeExport, 'danhmucchude.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dataChude = ChuDe::all();
        $data = [
            'danhsachchude' => $dataChude
        ];
        
        $pdf = PDF::loadView('backend.chude.pdf', $data);
        return $pdf->download('DanhMucChuDe.pdf');
    }
}
