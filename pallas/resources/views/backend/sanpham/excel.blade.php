<!DOCTYPE html>
<html>

<head>
    <title>Danh sách sản phẩm</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>

<body style="font-size: 10px">
    <div class="row">
        <table border="0" align="center" cellpadding="5" style="border-collapse: collapse;">
            <tr>
                <td colspan="7" align="center" style="font-size: 13px;" width="100">
                    <b>Công ty Hoa tươi Pallas</b></td>
            </tr>
            <tr>
                <td colspan="7" align="center" style="font-size: 13px">
                    <b>http://pallas.vn/</b></td>
            </tr>
            <tr>
                <td colspan="7" align="center" style="font-size: 13px">
                    <b>(0292)3.888.999 # 01.222.888.999</b></td>
            </tr>
            <tr>
                <td colspan="7" align="center">
                    {{-- Đây là khoảng trống dùng để chèn ảnh LOGO bằng Laravel Excel --}}
                    {{-- Khi hiển thị ảnh để xem trên WEB -> sử dụng đường dẫn URL bằng hàm asset() --}}
                    {{-- Khi xuất file Excel, muốn chèn hình ảnh phải sử dụng đường dẫn PATH bằng hàm public_path() --}}
                    
                    {{-- Nếu muốn debug để xem mẫu in, bỏ comment dòng dưới đây --}}
                    {{-- <img src="{{ asset('storage/img/logo.jpg') }}"/> --}}
                </td>
            </tr>
            <tr>
                <td colspan="7" class="caption" align="center" style="text-align: center; font-size: 20px">
                    <b>Danh sách sản phẩm</b>
                </td>
            </tr>
            <tr style="border: 1px thin #000">
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã sản phẩm</th>
                <th style="text-align: center">Hình sản phẩm</th>
                <th style="text-align: center">Tên sản phẩm</th>
                <th style="text-align: center">Giá</th>
                <th style="text-align: center">Loại sản phẩm</th>
                <th style="text-align: center">Nhà cung cấp</th>
            </tr>
            @foreach ($danhsachsanpham as $sp)
            <tr style="border: 1px thin #000">
                <td align="center" valign="middle" width="5">
                    {{ $loop->index + 1 }}
                </td>
                <td align="left" valign="middle" width="20">{{ $sp->sp_ma }}</td>
                <td align="center" valign="middle" width="20" height="110">
                    {{-- Đây là khoảng trống dùng để chèn ảnh LOGO bằng Laravel Excel --}}
                    {{-- Khi hiển thị ảnh để xem trên WEB -> sử dụng đường dẫn URL bằng hàm asset() --}}
                    {{-- Khi xuất file Excel, muốn chèn hình ảnh phải sử dụng đường dẫn PATH bằng hàm public_path() --}}
                    
                    {{-- Nếu muốn debug để xem mẫu in, bỏ comment dòng dưới đây --}}
                    {{-- <img class="hinhSanPham" src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" width="100" height="100" /> --}}
                </td>
                <td align="left" valign="middle" width="20">{{ $sp->sp_ten }}</td>
                <td align="right" valign="middle" width="15">{{ $sp->sp_gia }}</td>
                @foreach ($danhsachloai as $loai)
                    @if ($sp->l_id == $loai->l_id)
                    <td align="left" width="15" valign="middle">{{ $loai->l_ten }}</td>
                    @endif
                @endforeach
                @foreach ($danhsachnhacungcap as $ncc)
                    @if ($sp->ncc_id == $ncc->ncc_id)
                    <td align="left" width="35" valign="middle">{{ $ncc->ncc_ten }}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>