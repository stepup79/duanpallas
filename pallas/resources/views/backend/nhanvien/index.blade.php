@extends('backend.layouts.master')

@section('title')
Chức năng CRUD
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
<a href="{{ route('admin.nhanvien.create') }}" class="btn btn-primary">Thêm mới</a>
<!-- Tạo nút xem biểu mẫu khi in trên web -->
<a class="btn btn-outline-primary" href="{{ route('admin.nhanvien.print') }}">In ấn</a>
<!-- Tạo nút xuất ra bản in file Excel trên web -->
<a class="btn btn-outline-success" href="{{ route('admin.nhanvien.excel') }}">In Excel</a>
<!-- Tạo nút xuất ra bản in file PDF trên web -->
<a class="btn btn-outline-danger" href="{{ route('admin.nhanvien.pdf') }}">In PDF</a>
<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Mã nhân viên</th>
            <th>Tên tài khoản</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Quyền</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataNhanvien as $nv)
        <tr>
            <td>{{ $nv->nv_id }}</td>
            <td>{{ $nv->nv_ma }}</td>
            <td>{{ $nv->nv_taiKhoan }}</td>
            <td>{{ $nv->nv_hoTen }}</td>
            <td>{{ $nv->nv_gioiTinh == 0 ?'Nữ' :'Nam' }}</td>
            <td>{{ $nv->nv_dienThoai }}</td>
            <td>{{ $nv->nv_email }}</td>
            <td>{{ $nv->nv_ngaySinh }}</td>
            <td>{{ $nv->nv_diaChi }}</td>
            <td>{{ $nv->quyenNhanvien->q_ten }}</td>
            <td>{{ $nv->nv_taoMoi }}</td>
            <td>{{ $nv->nv_capNhat }}</td>
            <td>
                <a href="{{ route('admin.nhanvien.edit', ['id' => $nv->nv_id]) }}" class="btn btn-warning">Sửa</a>
                <form method="POST" action="{{ route('admin.nhanvien.destroy', ['id' => $nv->nv_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataNhanvien->links() }}
@endsection