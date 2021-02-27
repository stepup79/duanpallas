<!DOCTYPE html>
<html>

<head>
    <title>Danh mục Nhân viên</title>
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
                <td colspan="10" align="center" style="font-size: 13px;" width="100">
                    <b>Shop Hoa tươi Pallas</b></td>
            </tr>
            <tr>
                <td colspan="10" align="center" style="font-size: 13px">
                    <b>http://homepallas.vn/</b></td>
            </tr>
            <tr>
                <td colspan="10" align="center" style="font-size: 13px">
                    <b>(0292)3.665.012 # 0939.860.197</b></td>
            </tr>
            <tr>
                <td colspan="10" align="center">
                    {{-- Đây là khoảng trống dùng để chèn ảnh LOGO bằng Laravel Excel --}}
                    {{-- Khi hiển thị ảnh để xem trên WEB -> sử dụng đường dẫn URL bằng hàm asset() --}}
                    {{-- Khi xuất file Excel, muốn chèn hình ảnh phải sử dụng đường dẫn PATH bằng hàm public_path() --}}
                    
                    {{-- Nếu muốn debug để xem mẫu in, bỏ comment dòng dưới đây --}}
                    {{-- <img src="{{ asset('storage/img/logo.jpg') }}" /> --}}
                </td>
            </tr>
            <tr>
                <td colspan="10" class="caption" align="center" style="text-align: center; font-size: 20px">
                    <b>DANH MỤC NHÂN VIÊN</b>
                </td>
            </tr>
            <tr style="border: 1px thin #000">
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã nhân viên</th>
                <th style="text-align: center">Tên tài khoản</th>
                <th style="text-align: center">Họ và tên</th>
                <th style="text-align: center">Giới tính</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Điện thoại</th>
                <th style="text-align: center">Ngày sinh</th>
                <th style="text-align: center">Địa chỉ</th>
                <th style="text-align: center">Quyền hạn</th>
            </tr>
            @foreach ($danhsachnhanvien as $nv)
            <tr style="border: 1px thin #000">
                <td align="center" valign="middle" width="5">
                    {{ $loop->index + 1 }}
                </td>
                <td align="left" valign="middle" width="15">{{ $nv->nv_ma }}</td>
                <td align="left" valign="middle" width="15">{{ $nv->nv_taiKhoan }}</td>
                <td align="left" valign="middle" width="15">{{ $nv->nv_hoTen }}</td>
                <td align="left" valign="middle" width="10">{{ $nv->nv_gioiTinh == 0 ?'Nữ' :'Nam' }}</td>
                <td align="left" valign="middle" width="20">{{ $nv->nv_email }}</td>
                <td align="left" valign="middle" width="15">{{ $nv->nv_dienThoai }}</td>
                <td align="left" valign="middle" width="15">{{ $nv->nv_ngaySinh }}</td>
                <td align="left" valign="middle" width="20">{{ $nv->nv_diaChi }}</td>
                @foreach ($danhsachquyen as $quyen)
                    @if ($nv->q_id == $quyen->q_id)
                    <td align="left" width="15" valign="middle">{{ $quyen->q_ten }}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>