@extends('backend.layouts.master')

@section('title')
Danh mục Khách hàng
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
<a href="{{ route('admin.khachhang.create') }}" class="btn btn-primary">Thêm mới</a>
<!-- Tạo nút xem biểu mẫu khi in trên web -->
<a class="btn btn-outline-primary" href="{{ route('admin.khachhang.print') }}">In ấn</a>
<!-- Tạo nút xuất ra bản in file Excel trên web -->
<a class="btn btn-outline-success" href="{{ route('admin.khachhang.excel') }}">In Excel</a>
<!-- Tạo nút xuất ra bản in file PDF trên web -->
<a class="btn btn-outline-danger" href="{{ route('admin.khachhang.pdf') }}">In PDF</a>
<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Mã khách hàng</th>
            <th>Tên tài khoản</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataKhachhang as $kh)
        <tr>
            <td>{{ $kh->kh_id }}</td>
            <td>{{ $kh->kh_ma }}</td>
            <td>{{ $kh->kh_taiKhoan }}</td>
            <td>{{ $kh->kh_hoTen }}</td>
            <td>{{ $kh->kh_gioiTinh == 0 ?'Nữ' :'Nam' }}</td>
            <td>{{ $kh->kh_dienThoai }}</td>
            <td>{{ $kh->kh_email }}</td>
            <td>{{ $kh->kh_ngaySinh }}</td>
            <td>{{ $kh->kh_diaChi }}</td>
            <td>{{ $kh->kh_taoMoi }}</td>
            <td>{{ $kh->kh_capNhat }}</td>
            <td>
                <a href="{{ route('admin.khachhang.edit', ['id' => $kh->kh_id]) }}" class="btn btn-warning">Sửa</a>
                <form method="POST" action="{{ route('admin.khachhang.destroy', ['id' => $kh->kh_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataKhachhang->links() }}
@endsection