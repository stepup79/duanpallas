@extends('backend.layouts.master')

@section('title')
Danh mục Chủ đề sản phẩm
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
<a href="{{ route('admin.chude.create') }}" class="btn btn-primary">Thêm mới</a>
<!-- Tạo nút xem biểu mẫu khi in trên web -->
<a class="btn btn-outline-primary" href="{{ route('admin.chude.print') }}">In ấn</a>
<!-- Tạo nút xuất ra bản in file Excel trên web -->
<a class="btn btn-outline-success" href="{{ route('admin.chude.excel') }}">In Excel</a>
<!-- Tạo nút xuất ra bản in file PDF trên web -->
<a class="btn btn-outline-danger" href="{{ route('admin.chude.pdf') }}">In PDF</a>
<!-- Table danh mục Loại -->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Chủ đề</th>
            <th>Ngày tạo mới</th>
            <th>Ngày cập nhật</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataChude as $chude)
        <tr>
            <td>{{ $chude->cd_id }}</td>
            <td>{{ $chude->cd_ten }}</td>
            <td>{{ $chude->cd_taoMoi }}</td>
            <td>{{ $chude->cd_capNhat }}</td>
            <td>
                <a href="{{ route('admin.chude.edit', ['id' => $chude->cd_id]) }}" class="btn btn-warning">Sửa</a>
                <form name="frmDelete" id="frmDelete" method="POST" action="{{ route('admin.chude.destroy', ['id' => $chude->cd_id]) }}">
                    <input type="hidden" name="_method" value="DELETE"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $dataChude->links() }}
@endsection

@section('custom-scripts')

@endsection