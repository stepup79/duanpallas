<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quyen;
use Carbon\Carbon;
use App\Http\Requests\QuyenCreateRequest;
use Storage;
use Session;
use App\Exports\QuyenExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class QuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataQuyen = Quyen::paginate(5);
            return view('backend.quyen.index')
                ->with('dataQuyen', $dataQuyen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quyen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuyenCreateRequest $request)
    {
        $quyen = new Quyen();
        $quyen->q_ten = $request->q_ten;
        $quyen->q_dienGiai = $request->q_dienGiai;
        $quyen->q_taoMoi = Carbon::now('Asia/Ho_Chi_Minh');
        $quyen->q_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $quyen->q_trangThai = $request->q_trangThai;
        $quyen->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Thêm mới thành công!');
        // Save thành công điều hướng về route index
        return redirect(route('admin.quyen.index'));
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
        $quyen = Quyen::find($id);

        return view('backend.quyen.edit')
            ->with('quyen', $quyen);
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
        $quyen = Quyen::find($id);

        $quyen->q_ten = $request->q_ten;
        $quyen->q_dienGiai = $request->q_dienGiai;
        $quyen->q_capNhat = Carbon::now('Asia/Ho_Chi_Minh');
        $quyen->q_trangThai = $request->q_trangThai;
        $quyen->save();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công!');
        
        // Điều hướng về trang index
        return redirect()->route('admin.quyen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quyen = Quyen::find($id);

        $quyen->delete();
        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Xóa thành công!');

        // Điều hướng về trang index
        return redirect()->route('admin.quyen.index');
    }

    /**
     * Action xuất bản in
     */
    public function print()
    {
        $dsQuyen = Quyen::all();
        
        return view('backend.quyen.print')
            ->with('danhsachquyen', $dsQuyen);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new QuyenExport, 'danhmucquyen.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dataQuyen = Quyen::all();
        $data = [
            'danhsachquyen' => $dataQuyen
        ];
        
        $pdf = PDF::loadView('backend.quyen.pdf', $data);
        return $pdf->download('DanhMucQuyen.pdf');
    }
}
