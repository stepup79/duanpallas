@extends('backend.layouts.master')

@section('title')
Danh mục Chủ đề sản phẩm
@endsection

@section('content')

<form name="frmCreate" id="frmCreate" method="POST" action="{{ route('admin.chude.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="cd_ten">Chủ đề</label>
        <input type="text" class="form-control" name="cd_ten" id="cd_ten" value="{{ old('cd_ten') }}">
    </div>
    <div class="form-group">
        <label for="cd_trangThai">Trạng thái</label>
        <select class="form-control" name="cd_trangThai" id="cd_trangThai">
            <option value="1" {{ old('cd_trangThai') == 1 ?'selected' :'' }}>Khóa</option>
            <option value="2" {{ old('cd_trangThai') == 2 ?'selected' :'' }}>Khả dụng</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.chude.index') }}" class="btn btn-warning">Quay về</a>
</form>
@endsection