@extends('backend.layouts.master')

@section('title')
Chức năng CRUD
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
<a href="{{ route('admin.quyen.create') }}" class="btn btn-primary">Thêm mới</a>
<!-- Tạo nút xem biểu mẫu khi in trên web -->
<a class="btn btn-outline-primary" href="{{ route('admin.quyen.print') }}">In ấn</a>
<!-- Tạo nút xuất ra bản in file Excel trên web -->
<a class="btn btn-outline-success" href="{{ route('admin.quyen.excel') }}">In Excel</a>
<!-- Tạo nút xuất ra bản in file PDF trên web -->
<a class="btn btn-outline-danger" href="{{ route('admin.quyen.pdf') }}">In PDF</a>
<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên quyền</th>
            <th>Diễn giải</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataQuyen as $quyen)
        <tr>
            <td>{{ $quyen->q_id }}</td>
            <td>{{ $quyen->q_ten }}</td>
            <td>{{ $quyen->q_dienGiai }}</td>
            <td>{{ $quyen->q_taoMoi }}</td>
            <td>{{ $quyen->q_capNhat }}</td>
            <td>
                <a href="{{ route('admin.quyen.edit', ['id' => $quyen->q_id]) }}" class="btn btn-warning">Sửa</a>
                <form method="POST" action="{{ route('admin.quyen.destroy', ['id' => $quyen->q_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataQuyen->links() }}
@endsection