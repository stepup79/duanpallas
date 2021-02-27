<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DonHang;
use App\NhanVien;
use App\KhachHang;
use App\VanChuyen;
use App\ThanhToan;
use Carbon\Carbon;
use Storage;
use Session;
use App\Exports\DonHangExport;
use Maatwebsite\Excel\Facades\Excel as Excel;
use Barryvdh\DomPDF\Facade as PDF;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataDonhang = DonHang::paginate(5);
            return view('backend.donhang.index')
                ->with('dataDonhang', $dataDonhang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Action hiển thị biểu mẫu xem trước khi in trên Web
     */
    public function print()
    {
        $dataDonhang = DonHang::all();
        $dataNhanvien = NhanVien::all();
        $dataKhachhang = KhachHang::all();
        $dataVanchuyen = VanChuyen::all();
        $dataThanhtoan = ThanhToan::all();
        
        return view('backend.donhang.print')
            ->with('danhsachdonhang', $dataDonhang)
            ->with('danhsachnhanvien', $dataNhanvien)
            ->with('danhsachkhachhang', $dataKhachhang)
            ->with('danhsachvanchuyen', $dataVanchuyen)
            ->with('danhsachthanhtoan', $dataThanhtoan);
    }

    /**
     * Action xuất Excel
     */
    public function excel() 
    {
        return Excel::download(new DonHangExport, 'danhmucdonhang.xlsx');
    }

    /**
     * Action xuất PDF
     */
    public function pdf()
    {
        $dataDonhang = DonHang::all();
        $dataNhanvien = NhanVien::all();
        $dataKhachhang = KhachHang::all();
        $dataVanchuyen = VanChuyen::all();
        $dataThanhtoan = ThanhToan::all();
        $data = [
            'danhsachdonhang' => $dataDonhang,
            'danhsachnhanvien' => $dataNhanvien,
            'danhsachkhachhang' => $dataKhachhang,
            'danhsachvanchuyen' => $dataVanchuyen,
            'danhsachthanhtoan' => $dataThanhtoan
        ];
        
        $pdf = PDF::loadView('backend.donhang.pdf', $data);
        return $pdf->download('DanhMucDonHang.pdf');
    }
}
