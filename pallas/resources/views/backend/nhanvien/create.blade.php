@extends('backend.layouts.master')

@section('title')
Danh mục Nhân viên
@endsection

@section('custom-css')
@endsection

@section('content')
<h3 class="text-center">Nhân Viên</h3>
<form name="frmCreate" id="frmCreate" method="POST" action="{{ route('admin.nhanvien.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nv_taiKhoan">Tên tài khoản</label>
        <input type="text" class="form-control" name="nv_taiKhoan" id="nv_taiKhoan" value="{{ old('nv_taiKhoan') }}">
    </div>
    <div class="form-group">
        <label for="nv_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" name="nv_matKhau" id="nv_matKhau" value="{{ old('nv_matKhau') }}">
    </div>
    <div class="form-group">
        <label for="nv_hoTen">Họ tên</label>
        <input type="text" class="form-control" name="nv_hoTen" id="nv_hoTen" value="{{ old('nv_hoTen') }}">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nv_ngaySinh">Ngày sinh</label>
            <input type="text" class="form-control" name="nv_ngaySinh" id="nv_ngaySinh" value="{{ old('nv_ngaySinh') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="nv_gioiTinh">Giới tính</label>
            <select class="form-control" name="nv_gioiTinh" id="nv_gioiTinh">
                <option value="0" {{ old('nv_gioiTinh') == 0 ?'selected' :'' }}>Nữ</option>
                <option value="1" {{ old('nv_gioiTinh') == 1 ?'selected' :'' }}>Nam</option>
                <option value="2" {{ old('nv_gioiTinh') == 2 ?'selected' :'' }}>Khác</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nv_dienThoai">Số điện thoại</label>
            <input type="text" class="form-control" name="nv_dienThoai" id="nv_dienThoai" value="{{ old('nv_dienThoai') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="nv_email">Email</label>
            <input type="text" class="form-control" name="nv_email" id="nv_email" value="{{ old('nv_email') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="nv_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" name="nv_diaChi" id="nv_diaChi" value="{{ old('nv_diaChi') }}">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="q_id">Quyền</label>
            <select class="form-control" name="q_id" id="q_id">
                <option value="">Chọn quyền</option>
                @foreach($dataQuyen as $q)
                <option value="{{ $q->q_id }}">{{ $q->q_ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="nv_trangThai">Trạng thái</label>
            <select class="form-control" name="nv_trangThai" id="nv_trangThai">
                <option value="1" {{ old('nv_trangThai') == 1 ?'selected' :'' }}>Khóa</option>
                <option value="2" {{ old('nv_trangThai') == 2 ?'selected' :'' }}>Khả dụng</option>
            </select>
        </div>
    </div>
    <div class="form-row justify-content-center">
        <button type="submit" class="btn btn-success col-md-1">Lưu</button>
        <a href="{{ route('admin.nhanvien.index') }}" class="btn btn-warning col-md-1">Quay về</a>
    </div>
</form>
@endsection

@section('custom-scripts')
<script>
$(function() {
  $('input[name="nv_ngaySinh"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10),
    locale: {
          format: 'YYYY-MM-DD'
      }
  })
});
</script>
@endsection