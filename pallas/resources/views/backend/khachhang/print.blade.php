@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh mục Khách hàng
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
        $tongSoTrang = ceil(count($danhsachkhachhang)/5);
        ?>
        <table border="1" align="center" cellpadding="5" cellspacing="0">
            <caption><b>DANH MỤC KHÁCH HÀNG</b></caption>
            <tr>
                <th colspan="9" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Mã khách hàng</th>
                <th>Tên tài khoản</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
            </tr>
            @foreach ($danhsachkhachhang as $kh)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $kh->kh_ma }}</td>
                <td align="left">{{ $kh->kh_taiKhoan }}</td>
                <td align="left">{{ $kh->kh_hoTen }}</td>
                <td align="left">{{ $kh->kh_gioiTinh == 0 ?'Nữ' :'Nam' }}</td>
                <td align="left">{{ $kh->kh_email }}</td>
                <td align="left">{{ $kh->kh_dienThoai }}</td>
                <td align="left">{{ $kh->kh_ngaySinh }}</td>
                <td align="left">{{ $kh->kh_diaChi }}</td>
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <th colspan="9" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Mã khách hàng</th>
                <th>Tên tài khoản</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection