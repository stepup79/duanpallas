@extends('frontend.layouts.master')

@section('title')
Cập nhật tài khoản
@endsection

@section('custom-css')
<style>
.main-content {
    margin-top: 80px;
}
</style>
@endsection

@section('main-content')
<div class="container mb-2">
    <div class="row main-content">
        <div class="col-md-12">
        @include('backend.layouts.partials.error-message')
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">CẬP NHẬT TÀI KHOẢN</h3>
                </div>
                <div class="card-body">
                    <form name="frmEdit" id="frmEdit" method="POST" action="{{ route('admin.khachhang.update', ['id' => $khachhang->kh_id]) }}">
                        <input type="hidden" name="_method" value="PUT"/>
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kh_taiKhoan">Tên tài khoản</label>
                                <input type="text" class="form-control" name="kh_taiKhoan" id="kh_taiKhoan" value="{{ old('kh_taiKhoan', $khachhang->kh_taiKhoan) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kh_matKhau">Mật khẩu</label>
                                <input type="text" class="form-control" name="kh_matKhau" id="kh_matKhau" value="{{ old('kh_matKhau', $khachhang->kh_matKhau) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kh_hoTen">Họ tên</label>
                            <input type="text" class="form-control" name="kh_hoTen" id="kh_hoTen" value="{{ old('kh_hoTen', $khachhang->kh_hoTen) }}">
                        </div>
                        <div class="form-group">
                            <label for="kh_ngaySinh">Ngày sinh</label>
                            <input type="text" class="form-control" name="kh_ngaySinh" id="kh_ngaySinh" value="{{ old('kh_ngaySinh', $khachhang->kh_ngaySinh) }}">
                        </div>
                        <div class="form-group">
                            <label for="kh_gioiTinh">Giới tính</label>
                            <select class="form-control" name="kh_gioiTinh" id="kh_gioiTinh">
                                <option value="0" {{ old('kh_gioiTinh', $khachhang->kh_gioiTinh) == 0 ?'selected' :'' }}>Nữ</option>
                                <option value="1" {{ old('kh_gioiTinh', $khachhang->kh_gioiTinh) == 1 ?'selected' :'' }}>Nam</option>
                                <option value="2" {{ old('kh_gioiTinh', $khachhang->kh_gioiTinh) == 2 ?'selected' :'' }}>Khác</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kh_dienThoai">Số điện thoại</label>
                                <input type="text" class="form-control" name="kh_dienThoai" id="kh_dienThoai" value="{{ old('kh_dienThoai', $khachhang->kh_dienThoai) }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kh_email">Email</label>
                                <input type="text" class="form-control" name="kh_email" id="kh_email" value="{{ old('kh_email', $khachhang->kh_email) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kh_diaChi">Địa chỉ</label>
                            <input type="text" class="form-control" name="kh_diaChi" id="kh_diaChi" value="{{ old('kh_diaChi', $khachhang->kh_diaChi) }}">
                        </div>
                        <div class="form-row justify-content-center">
                            <button type="submit" class="btn btn-success col-md-2">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<script>
$(function() {
  $('input[name="kh_ngaySinh"]').daterangepicker({
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