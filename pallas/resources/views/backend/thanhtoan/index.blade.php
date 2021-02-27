@extends('backend.layouts.master')

@section('title')
Danh mục Hình thức thanh toán
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
<a href="{{ route('admin.thanhtoan.create') }}" class="btn btn-primary">Thêm mới</a>
<!-- Tạo nút xem biểu mẫu khi in trên web -->
<a class="btn btn-outline-primary" href="{{ route('admin.thanhtoan.print') }}">In ấn</a>
<!-- Tạo nút xuất ra bản in file Excel trên web -->
<a class="btn btn-outline-success" href="{{ route('admin.thanhtoan.excel') }}">In Excel</a>
<!-- Tạo nút xuất ra bản in file PDF trên web -->
<a class="btn btn-outline-danger" href="{{ route('admin.thanhtoan.pdf') }}">In PDF</a>
<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tên thanh toán</th>
            <th>Diễn giải</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataThanhtoan as $thanhtoan)
        <tr>
            <td>{{ $thanhtoan->tt_id }}</td>
            <td>{{ $thanhtoan->tt_ten }}</td>
            <td>{{ $thanhtoan->tt_dienGiai }}</td>
            <td>{{ $thanhtoan->tt_taoMoi }}</td>
            <td>{{ $thanhtoan->tt_capNhat }}</td>
            <td>
                <a href="{{ route('admin.thanhtoan.edit', ['id' => $thanhtoan->tt_id]) }}" class="btn btn-warning">Sửa</a>
                <form method="POST" action="{{ route('admin.thanhtoan.destroy', ['id' => $thanhtoan->tt_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataThanhtoan->links() }}
@endsection