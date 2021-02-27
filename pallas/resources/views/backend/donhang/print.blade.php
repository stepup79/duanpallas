@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh mục Đơn hàng
@endsection

@section('paper-size') A4 landscape @endsection
@section('paper-class') A4 landscape @endsection

@section('custom-css')
@endsection

@section('content')
<section class="sheet padding-10mm">
    <article>
        <table border="0" align="center">
            <tr>
                <td class="companyInfo" align="center">
                    Hoa tươi Pallas<br />
                    http://homepallas.vn/<br />
                    (0292)3.665.012 # 0939.860.197<br />
                    <img class="img-logo" src="{{ asset('storage/img/logo.jpg') }}" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachdonhang)/5);
        ?>
        <table border="1" align="center" cellpadding="5" cellspacing="0">
            <caption><b>DANH MỤC ĐƠN HÀNG</b></caption>
            <tr>
                <th colspan="12" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Mã đơn</th>
                <th>Tên khách hàng</th>
                <th>Ngày đặt</th>
                <th>Ngày giao</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Ghi chú</th>
                <th>Tình trạng</th>
                <th>Nhân viên giao</th>
                <th>Hình thức thanh toán</th>
                <th>Hình thức vận chuyển</th>
            </tr>
            @foreach ($danhsachdonhang as $dh)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $dh->dh_ma }}</td>
                <td align="left">{{ $dh->dhKhachhang->kh_hoTen }}</td>
                <td align="left">{{ $dh->dh_ngayDatHang }}</td>
                <td align="left">{{ $dh->dh_ngayGiaoHang }}</td>               
                <td align="left">{{ $dh->dh_diaChi }}</td>
                <td align="left">{{ $dh->dh_dienThoai }}</td>
                <td align="left">{{ $dh->dh_loiChuc }}</td>
                <td align="left">{{ $dh->dh_daThanhToan == 0 ?'Chưa thanh toán' :'Đã thanh toán' }}</td>               
                <td align="left">{{ $dh->dhThanhtoan->tt_ten }}</td>
                <td align="left">{{ $dh->dhNhanvien->nv_hoTen }}</td>
                <td align="left">{{ $dh->dhVanchuyen->vc_ten }}</td>              
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <th colspan="12" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Mã đơn</th>
                <th>Tên khách hàng</th>
                <th>Ngày đặt</th>
                <th>Ngày giao</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Ghi chú</th>
                <th>Tình trạng</th>
                <th>Nhân viên giao</th>
                <th>Hình thức thanh toán</th>
                <th>Hình thức vận chuyển</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection