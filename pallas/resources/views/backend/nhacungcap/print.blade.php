@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh mục Nhà cung cấp
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
@endsection

@section('content')
<section class="sheet padding-10mm">
    <article>
        <table border="0" align="center">
            <tr>
                <td class="companyInfo" align="center">
                    Công ty Hoa tươi Pallas<br />
                    http://pallas.vn/<br />
                    (0292)3.888.999 # 01.222.888.999<br />
                    <img class="img-logo" src="{{ asset('storage/img/logo.jpg') }}" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachnhacungcap)/5);
        ?>
        <table border="1" align="center" cellpadding="5" cellspacing="0">
            <caption>Danh mục Nhà cung cấp</caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Công ty</th>
                <th>Người đại diện</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>
            @foreach ($danhsachnhacungcap as $ncc)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $ncc->ncc_ten }}</td>
                <td align="left">{{ $ncc->ncc_daiDien }}</td>
                <td align="left">{{ $ncc->ncc_diaChi }}</td>
                <td align="left">{{ $ncc->ncc_dienThoai }}</td>
                <td align="left">{{ $ncc->ncc_email }}</td>
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Công ty</th>
                <th>Người đại diện</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection