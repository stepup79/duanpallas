@extends('backend.layouts.master')

@section('title')
Danh mục Nhà cung cấp
@endsection

@section('content')

<form name="frmCreate" id="frmCreate" method="POST" action="{{ route('admin.nhacungcap.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="ncc_ten">Tên nhà cung cấp</label>
        <input type="text" class="form-control" name="ncc_ten" id="ncc_ten" value="{{ old('ncc_ten') }}">
    </div>
    <div class="form-group">
        <label for="ncc_daiDien">Người đại diện</label>
        <input type="text" class="form-control" name="ncc_daiDien" id="ncc_daiDien" value="{{ old('ncc_daiDien') }}">
    </div>
    <div class="form-group">
        <label for="ncc_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" name="ncc_diaChi" id="ncc_diaChi" value="{{ old('ncc_diaChi') }}">
    </div>
    <div class="form-group">
        <label for="ncc_dienThoai">Điện thoại</label>
        <input type="text" class="form-control" name="ncc_dienThoai" id="ncc_dienThoai" value="{{ old('ncc_dienThoai') }}">
    </div>
    <div class="form-group">
        <label for="ncc_email">Email</label>
        <input type="text" class="form-control" name="ncc_email" id="ncc_email" value="{{ old('ncc_email') }}">
    </div>
    <div class="form-group">
        <label for="ncc_trangThai">Trạng thái</label>
        <select class="form-control" name="ncc_trangThai" id="ncc_trangThai">
            <option value="1" {{ old('ncc_trangThai') == 1 ?'selected' :'' }}>Khóa</option>
            <option value="2" {{ old('ncc_trangThai') == 2 ?'selected' :'' }}>Khả dụng</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.nhacungcap.index') }}" class="btn btn-warning">Quay về</a>
</form>
@endsection