<!DOCTYPE html>
<html>

<head>
    <title>Danh mục Vận chuyển</title>
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
            width: 200px;
            height: 200px;
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
                    Công ty Hoa tươi Pallas<br />
                    http://pallas.vn/<br />
                    (0292)3.888.999 # 01.222.888.999<br />
                    <img src="{{ asset('storage/img/logo.jpg') }}" class="companyImg" />
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachvanchuyen)/5);
        ?>
        <table border="1" align="center" cellpadding="5">
            <caption>Danh mục Vận chuyển</caption>
            <tr>
                <th colspan="4" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Hình thức vận chuyển</th>
                <th>Chi phí</th>
                <th>Diễn giải</th>
            </tr>
            @foreach ($danhsachvanchuyen as $vc)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="left">{{ $vc->vc_ten }}</td>
                <td align="right">{{ $vc->vc_chiPhi }}</td>
                <td align="left">{{ $vc->vc_dienGiai }}</td>              
            </tr>
            
            @if (($loop->index + 1) % 5 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5">
            <tr>
                <th colspan="4" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Hình thức vận chuyển</th>
                <th>Chi phí</th>
                <th>Diễn giải</th>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</body>

</html>