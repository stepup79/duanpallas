<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use App\ChuDe;
use Carbon\Carbon;
use Storage;
use Session;
use App\Http\Requests\LoaiCreateRequest;
use App\Exports\LoaiExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataLoai = Loai::paginate(5);
            return view('backend.loai.index')
                ->with('dataLoai', $dataLoai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataChude = ChuDe::all();
        return view('backend.loai.create')
            ->with('dataChude', $dataChude);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiCreateRequest $request)
    {
        $loai = new Loai();
        $loai->l_ten = $request->l_ten;
        $loai->cd_id = $request->cd_id;
        $loai->l_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $loai->l_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $loai->l_trangThai = $request->l_trangThai;
        $loai->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Thêm mới thành công!');
        // Save thành công điều hướng về route index
        return redirect()->route('admin.loai.index');
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
        $loai = Loai::find($id);
        $dataChude = ChuDe::all();

        return view('backend.loai.edit')
            ->with('loai', $loai)
            ->with('dsChude', $dataChude);
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
        $loai = Loai::find($id);

        $loai->l_ten = $request->l_ten;
        $loai->cd_id = $request->cd_id;
        $loai->l_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $loai->l_trangThai = $request->l_trangThai;
        $loai->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.loai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai = Loai::find($id);

        $loai->delete();
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.loai.index');
    }

    /**
     * Action xuất bản in
     */
    public function print()
    {
        $dataLoai = Loai::all();
        $dataChude = ChuDe::all();
        
        return view('backend.loai.print')
            ->with('danhsachloai', $dataLoai)
            ->with('danhsachchude', $dataChude);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new LoaiExport, 'danhmucloai.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dataLoai = Loai::all();
        $dataChude = ChuDe::all();
        $data = [
            'danhsachloai' => $dataLoai,
            'danhsachchude' => $dataChude
        ];
        
        $pdf = PDF::loadView('backend.loai.pdf', $data);
        return $pdf->download('DanhMucLoai.pdf');
    }
}
