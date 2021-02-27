<!DOCTYPE html>
<html>

<head>
    <title>Danh mục Đơn hàng</title>
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
                <td colspan="12" align="center" style="font-size: 13px;" width="100">
                    <b>Shop Hoa tươi Pallas</b></td>
            </tr>
            <tr>
                <td colspan="12" align="center" style="font-size: 13px">
                    <b>http://homepallas.vn/</b></td>
            </tr>
            <tr>
                <td colspan="12" align="center" style="font-size: 13px">
                    <b>(0292)3.665.012 # 0939.860.197</b></td>
            </tr>
            <tr>
                <td colspan="12" align="center">
                    {{-- Đây là khoảng trống dùng để chèn ảnh LOGO bằng Laravel Excel --}}
                    {{-- Khi hiển thị ảnh để xem trên WEB -> sử dụng đường dẫn URL bằng hàm asset() --}}
                    {{-- Khi xuất file Excel, muốn chèn hình ảnh phải sử dụng đường dẫn PATH bằng hàm public_path() --}}
                    
                    {{-- Nếu muốn debug để xem mẫu in, bỏ comment dòng dưới đây --}}
                    {{-- <img src="{{ asset('storage/img/logo.jpg') }}" /> --}}
                </td>
            </tr>
            <tr>
                <td colspan="12" class="caption" align="center" style="text-align: center; font-size: 20px">
                    <b>DANH MỤC ĐƠN HÀNG</b>
                </td>
            </tr>
            <tr style="border: 1px thin #000">
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã đơn</th>
                <th style="text-align: center">Tên khách hàng</th>
                <th style="text-align: center">Ngày đặt</th>
                <th style="text-align: center">Ngày giao</th>
                <th style="text-align: center">Địa chỉ</th>
                <th style="text-align: center">Điện thoại</th>
                <th style="text-align: center">Ghi chú</th>
                <th style="text-align: center">Tình trạng</th>
                <th style="text-align: center">Nhân viên giao</th>
                <th style="text-align: center">Thanh toán</th>
                <th style="text-align: center">Vận chuyển</th>
            </tr>
            @foreach ($danhsachdonhang as $dh)
            <tr style="border: 1px thin #000">
                <td align="center" valign="middle" width="5">
                    {{ $loop->index + 1 }}
                </td>
                <td align="left" valign="middle" width="15">{{ $dh->dh_ma }}</td>
                <td align="left" valign="middle" width="15">{{ $dh->dhKhachhang->kh_hoTen }}</td>
                <td align="left" valign="middle" width="15">{{ $dh->dh_ngayDatHang }}</td>
                <td align="left" valign="middle" width="15">{{ $dh->dh_ngayGiaoHang }}</td>
                <td align="left" valign="middle" width="20">{{ $dh->dh_diaChi }}</td>
                <td align="left" valign="middle" width="15">{{ $dh->dh_dienThoai }}</td>
                <td align="left" valign="middle" width="20">{{ $dh->dh_loiChuc }}</td>
                <td align="left" valign="middle" width="15">{{ $dh->dh_daThanhToan == 0 ?'Chưa thanh toán' :'Đã thanh toán' }}</td>
                <td align="left" valign="middle" width="15">{{ $dh->dhNhanvien->nv_hoTen }}</td>
                <td align="left" valign="middle" width="10">{{ $dh->dhThanhtoan->tt_ten }}</td>
                <td align="left" valign="middle" width="15">{{ $dh->dhVanchuyen->vc_ten }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>