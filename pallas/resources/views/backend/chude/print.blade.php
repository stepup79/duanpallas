@extends('print.layouts.paper')

@section('title')
Biểu mẫu Phiếu in danh mục Chủ đề
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
        $tongSoTrang = ceil(count($danhsachchude)/5);
        ?>
        <table border="1" align="center" cellpadding="5" cellspacing="0" width="50%">
            <caption>Danh mục Chủ đề</caption>
            <tr>
                <th colspan="2" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Chủ đề sản phẩm</th>
            </tr>
            @foreach ($danhsachchude as $chude)
            <tr>
                <td align="center" width="20%">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $chude->cd_ten }}</td>
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5" cellspacing="0" width="50%">
            <tr>
                <th colspan="2" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Chủ đề sản phẩm</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection