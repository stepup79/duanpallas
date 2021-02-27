@extends('backend.layouts.master')

@section('title')
Danh mục Đơn hàng
@endsection

@section('content')

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>

<!-- Tạo nút thêm mới -->
<a href="{{ route('admin.donhang.create') }}" class="btn btn-primary">Thêm mới</a>
<!-- Tạo nút xem biểu mẫu khi in trên web -->
<a class="btn btn-outline-primary" href="{{ route('admin.donhang.print') }}">In ấn</a>
<!-- Tạo nút xuất ra bản in file Excel trên web -->
<a class="btn btn-outline-success" href="{{ route('admin.donhang.excel') }}">In Excel</a>
<!-- Tạo nút xuất ra bản in file PDF trên web -->
<a class="btn btn-outline-danger" href="{{ route('admin.donhang.pdf') }}">In PDF</a>
<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Ngày đặt hàng</th>
            <th>Ngày giao</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Lời chúc</th>
            <th>Tình trạng</th>
            <th>Nhân viên giao hàng</th>
            <th>Vận chuyển</th>
            <th>Hình thức thanh toán</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataDonhang as $dh)
        <tr>
            <td>{{ $dh->dh_id }}</td>
            <td>{{ $dh->dh_ma }}</td>
            <td>{{ $dh->dhKhachhang->kh_hoTen }}</td>
            <td>{{ $dh->dh_ngayDatHang }}</td>
            <td>{{ $dh->dh_ngayGiaoHang }}</td>
            <td>{{ $dh->dh_diaChi }}</td>
            <td>{{ $dh->dh_dienThoai }}</td>
            <td>{{ $dh->dh_loiChuc }}</td>
            <td>{{ $dh->dh_daThanhToan == 0 ?'Chưa thanh toán' :'Đã thanh toán' }}</td>
            <td>{{ $dh->dhNhanvien->nv_hoTen }}</td>
            <td>{{ $dh->dhVanchuyen->vc_ten }}</td>
            <td>{{ $dh->dhThanhtoan->tt_ten }}</td>
            <td>{{ $dh->dh_taoMoi }}</td>
            <td>{{ $dh->dh_capNhat }}</td>
            <td>
                <a href="{{ route('admin.donhang.edit', ['id' => $dh->dh_id]) }}" class="btn btn-warning">Sửa</a>
                <form method="POST" action="{{ route('admin.donhang.destroy', ['id' => $dh->dh_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataDonhang->links() }}
@endsection