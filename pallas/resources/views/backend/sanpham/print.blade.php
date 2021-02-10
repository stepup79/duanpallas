@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh mục sản phẩm
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
<style>
.img-product {
    width: 100px;
    height: 100px;
}
</style>
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
        $tongSoTrang = ceil(count($danhsachsanpham)/5);
        ?>
        <table border="1" align="center" cellpadding="5" cellspacing="0">
            <caption>Danh sách sản phẩm</caption>
            <tr>
                <th colspan="8" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Thông tin</th>
                <th>Loại sản phẩm</th>
                <th>Nhà cung cấp</th>
            </tr>
            @foreach ($danhsachsanpham as $sp)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $sp->sp_ma }}</td>
                <td align="center">
                    <img class="img-product" src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" />
                </td>
                <td align="left">{{ $sp->sp_ten }}</td>
                <td align="right">{{ $sp->sp_gia }}</td>
                <td align="left">{{ $sp->sp_thongTin }}</td>
                @foreach ($danhsachloai as $loai)
                @if ($sp->l_id == $loai->l_id)
                <td align="left">{{ $loai->l_ten }}</td>
                @endif
                @endforeach
                @foreach ($danhsachnhacungcap as $ncc)
                @if ($sp->ncc_id == $ncc->ncc_id)
                <td align="left">{{ $ncc->ncc_ten }}</td>
                @endif
                @endforeach
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <th colspan="8" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Thông tin</th>
                <th>Loại sản phẩm</th>
                <th>Nhà cung cấp</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection