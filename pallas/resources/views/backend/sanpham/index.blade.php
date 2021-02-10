@extends('backend.layouts.master')

@section('title')
Chức năng CRUD
@endsection

@section('custom-css')
<style>
    .img-detail {
        width: 100px;
        height: 120px;
    }
</style>
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

<!-- Tạo nút Thêm mới sản phẩm -->
<a class="btn btn-primary" href="{{ route('admin.sanpham.create') }}">Thêm mới</a>
<!-- Tạo nút xem biểu mẫu khi in trên web -->
<a class="btn btn-outline-primary" href="{{ route('admin.sanpham.print') }}">In ấn</a>
<!-- Tạo nút xuất ra bản in file Excel trên web -->
<a class="btn btn-outline-success" href="{{ route('admin.sanpham.excel') }}">In Excel</a>
<!-- Tạo nút xuất ra bản in file PDF trên web -->
<a class="btn btn-outline-danger" href="{{ route('admin.sanpham.pdf') }}">In PDF</a>

<!-- Tạo table hiển thị danh sách các sản phẩm -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Mã sản phẩm</th>
            <th>Tên</th>
            <th>Giá sản phẩm</th>
            <th>Hình</th>
            <th>Thông tin</th>
            <th>Trạng thái</th>
            <th>Loại sản phẩm</th>
            <th>Nhà cung cấp</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataSanpham as $sp)
        <tr>
            <td>{{ $sp->sp_id }}</td>
            <td>{{ $sp->sp_ma }}</td>
            <td>{{ $sp->sp_ten }}</td>
            <td>{{ $sp->sp_gia }}</td>
            <td>
                <!-- Lấy đường dẫn file ánh xạ + tên hình -->
                <img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" class="img-detail"/>
            </td>
            <td>{{ $sp->sp_thongTin }}</td>
            <td>{{ $sp->sp_trangThai }}</td>
            <td>{{ $sp->loaiSanpham->l_ten }}</td>
            <td>{{ $sp->spNhacungcap->ncc_ten }}</td>
            <td>
                <a href="{{ route('admin.sanpham.edit', ['id' => $sp->sp_id]) }}" class="btn btn-warning pull-left">Sửa</a>
                <form method="post" action="{{ route('admin.sanpham.destroy', ['id' => $sp->sp_id]) }}" class="pull-left">
                <input type="hidden" name="_method" value="DELETE" />
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataSanpham->links() }}
@endsection