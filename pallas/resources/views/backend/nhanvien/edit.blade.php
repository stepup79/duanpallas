@extends('backend.layouts.master')

@section('title')
Danh mục Nhân viên
@endsection

@section('content')

<form name="frmEdit" id="frmEdit" method="POST" action="{{ route('admin.nhanvien.update', ['id' => $nhanvien->nv_id]) }}">
    <input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nv_taiKhoan">Tên tài khoản</label>
        <input type="text" class="form-control" name="nv_taiKhoan" id="nv_taiKhoan" value="{{ old('nv_taiKhoan', $nhanvien->nv_taiKhoan) }}">
    </div>
    <div class="form-group">
        <label for="nv_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" name="nv_matKhau" id="nv_matKhau" value="{{ old('nv_matKhau', $nhanvien->nv_matKhau) }}">
    </div>
    <div class="form-group">
        <label for="nv_hoTen">Họ tên</label>
        <input type="text" class="form-control" name="nv_hoTen" id="nv_hoTen" value="{{ old('nv_hoTen', $nhanvien->nv_hoTen) }}">
    </div>
    <div class="form-group">
        <label for="nv_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" name="nv_ngaySinh" id="nv_ngaySinh" value="{{ old('nv_ngaySinh', $nhanvien->nv_ngaySinh) }}">
    </div>
    <div class="form-group">
        <label for="nv_gioiTinh">Giới tính</label>
        <input type="text" class="form-control" name="nv_gioiTinh" id="nv_gioiTinh" value="{{ old('nv_gioiTinh', $nhanvien->nv_gioiTinh) }}">
    </div>
    <div class="form-group">
        <label for="nv_dienThoai">Số điện thoại</label>
        <input type="text" class="form-control" name="nv_dienThoai" id="nv_dienThoai" value="{{ old('nv_dienThoai', $nhanvien->nv_dienThoai) }}">
    </div>
    <div class="form-group">
        <label for="nv_email">Email</label>
        <input type="text" class="form-control" name="nv_email" id="nv_email" value="{{ old('nv_email', $nhanvien->nv_email) }}">
    </div>
    <div class="form-group">
        <label for="nv_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" name="nv_diaChi" id="nv_diaChi" value="{{ old('nv_diaChi', $nhanvien->nv_diaChi) }}">
    </div>
    <div class="form-group">
        <label for="q_id">Quyền</label>
        <select class="form-control" name="q_id" id="q_id">
            @foreach($dsQuyen as $q)
                @if($q->q_id == $nhanvien->q_id)
                <option value="{{ $q->q_id }}" selected>{{ $q->q_ten }}</option>
                @else
                <option value="{{ $q->q_id }}">{{ $q->q_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nv_trangThai">Trạng thái</label>
        <select class="form-control" name="nv_trangThai" id="nv_trangThai">
            <option value="1" {{ old('nv_trangThai', $nhanvien->nv_trangThai) == 1 ?'selected' :'' }}>Khóa</option>
            <option value="2" {{ old('nv_trangThai', $nhanvien->nv_trangThai) == 2 ?'selected' :'' }}>Khả dụng</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.nhanvien.index') }}" class="btn btn-warning">Quay về</a>
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