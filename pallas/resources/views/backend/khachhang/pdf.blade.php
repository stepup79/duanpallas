<!DOCTYPE html>
<html>

<head>
    <title>Danh mục Khách hàng</title>
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
        $tongSoTrang = ceil(count($danhsachkhachhang)/5);
        ?>
        <table border="1" align="center" cellpadding="5">
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
        <table border="1" align="center" cellpadding="5">
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
    </div>
</body>

</html>