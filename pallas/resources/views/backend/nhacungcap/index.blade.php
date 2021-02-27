@extends('backend.layouts.master')

@section('title')
Danh mục Nhà cung cấp
@endsection

@section('content')
<!-- Đây là div hiển thị Kết quả (thành công, thất bại) sau khi thực hiện các chức năng Thêm, Sửa, Xóa.
- Div này chỉ hiển thị khi trong Session có các key `alert-*` từ Controller trả về. 
- Sử dụng các class của Bootstrap "danger", "warning", "success", "info" để hiển thị màu cho đúng với trạng thái kết quả.
-->
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>

<!-- Tạo nút thêm mới -->
<a href="{{ route('admin.nhacungcap.create') }}" class="btn btn-primary">Thêm mới</a>
<!-- Tạo nút xem biểu mẫu khi in trên web -->
<a class="btn btn-outline-primary" href="{{ route('admin.nhacungcap.print') }}">In ấn</a>
<!-- Tạo nút xuất ra bản in file Excel trên web -->
<a class="btn btn-outline-success" href="{{ route('admin.nhacungcap.excel') }}">In Excel</a>
<!-- Tạo nút xuất ra bản in file PDF trên web -->
<a class="btn btn-outline-danger" href="{{ route('admin.nhacungcap.pdf') }}">In PDF</a>
<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tên nhà cung cấp</th>
            <th>Người đại diện</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataNhacungcap as $nhacungcap)
        <tr>
            <td>{{ $nhacungcap->ncc_id }}</td>
            <td>{{ $nhacungcap->ncc_ten }}</td>
            <td>{{ $nhacungcap->ncc_daiDien }}</td>
            <td>{{ $nhacungcap->ncc_diaChi }}</td>
            <td>{{ $nhacungcap->ncc_dienThoai }}</td>
            <td>{{ $nhacungcap->ncc_email }}</td>
            <td>{{ $nhacungcap->ncc_taoMoi }}</td>
            <td>{{ $nhacungcap->ncc_capNhat }}</td>
            <td>
                <a href="{{ route('admin.nhacungcap.edit', ['id' => $nhacungcap->ncc_id]) }}" class="btn btn-warning">Sửa</a>
                <form method="POST" action="{{ route('admin.nhacungcap.destroy', ['id' => $nhacungcap->ncc_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataNhacungcap->links() }}
@endsection