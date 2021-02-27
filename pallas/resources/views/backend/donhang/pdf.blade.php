<!DOCTYPE html>
<html>

<head>
    <title>Danh mục Đơn hàng</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }

        body {
            font-size: 10px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            vertical-align: middle;
        }

        caption {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .companyInfo {
            font-size: 13px;
            font-weight: bold;
            text-align: center;
        }

        .companyImg {
            width: 150px;
            height: 150px;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="row">
        <table border="0" align="center">
            <tr>
                <td class="companyInfo">
                    Shop Hoa tươi Pallas<br />
                    http://homepallas.vn/<br />
                    (0292)3.665.012 # 0939.860.197<br />
                    <img src="{{ asset('storage/img/logo.jpg') }}" class="companyImg" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachdonhang)/5);
        ?>
        <table border="1" align="center" cellpadding="5">
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
                <th>Hình thức thanh toán</th>
                <th>Nhân viên giao</th>
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
        <table border="1" align="center" cellpadding="5">
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
    </div>
</body>

</html>