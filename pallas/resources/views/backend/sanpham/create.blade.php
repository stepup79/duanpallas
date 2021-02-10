@extends('backend.layouts.master')

@section('title')
Chức năng CRUD
@endsection

@section('custom-css')
<!-- CSS dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

<form name="frmCreate" id="frmCreate" method="POST" action="{{ route('admin.sanpham.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="sp_ma">Mã sản phẩm</label>
            <input type="text" class="form-control" name="sp_ma" id="sp_ma" value="{{ old('sp_ma') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="sp_ten">Tên sản phẩm</label>
            <input type="text" class="form-control" name="sp_ten" id="sp_ten" value="{{ old('sp_ten') }}">
        </div>
        <div class="form-group col-md-4">
            <label for="sp_gia">Giá bán</label>
            <input type="text" class="form-control" name="sp_gia" id="sp_gia" value="{{ old('sp_gia') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="sp_thongTin">Thông tin</label>
        <input type="text" class="form-control" name="sp_thongTin" id="sp_thongTin" value="{{ old('sp_thongTin') }}">
    </div>
    <div class="form-group">
        <label for="sp_danhGia">Đánh giá</label>
        <input type="text" class="form-control" name="sp_danhGia" id="sp_danhGia" value="{{ old('sp_danhGia') }}">
    </div>
    <div class="form-group">
        <label for="sp_trangThai">Trạng thái</label>
        <select class="form-control" name="sp_trangThai" id="sp_trangThai">
            <option value="1" {{ old('sp_trangThai') == 1 ?'selected' :'' }}>Khóa</option>
            <option value="2" {{ old('sp_trangThai') == 2 ?'selected' :'' }}>Khả dụng</option>
        </select>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="l_id">Loại sản phẩm</label>
            <select class="form-control" name="l_id" id="l_id">
                <option value="">Chọn loại sản phẩm</option>
                @foreach($dataLoai as $loai)
                <option value="{{ $loai->l_id }}">{{ $loai->l_ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="ncc_id">Nhà cung cấp</label>
            <select class="form-control" name="ncc_id" id="ncc_id">
                <option value="">Chọn nhà cung cấp</option>
                @foreach($dataNhacungcap as $ncc)
                <option value="{{ $ncc->ncc_id }}">{{ $ncc->ncc_ten }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="sp_hinh">Hình đại diện</label>
            <div class="file-loading">                
                <input type="file" name="sp_hinh" id="sp_hinh">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="sp_hinhanhlienquan">Hình ảnh liên quan sản phẩm</label>
            <div class="file-loading">                
                <input id="sp_hinhanhlienquan" type="file" name="sp_hinhanhlienquan[]" multiple>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
    <a href="{{ route('admin.sanpham.index') }}" class="btn btn-warning">Quay về</a>
</form>
@endsection

@section('custom-scripts')
<!-- SCRIPTS dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

<script>
$(function() {
    $("#sp_hinh").fileinput({
        theme: 'fas',
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false
    });
    // Ô nhập liệu cho phép chọn nhiều hình ảnh cùng lúc (các hình ảnh liên quan đến sản phẩm)
    $("#sp_hinhanhlienquan").fileinput({
        theme: 'fas',
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        allowedFileExtensions: ["jpg", "gif", "png", "txt"]
    });
});
</script>

<!-- SCRIPTS dành cho thư viện input-mask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}" type="text/javascript"></script>

<script>
$(document).ready(function() {
    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá
    $('#sp_gia').inputmask({
      alias: 'currency',
      positionCaretOnClick: "radixFocus",
      radixPoint: ".",
      _radixDance: true,
      numericInput: true,
      groupSeparator: ",",
      suffix: ' vnđ',
      min: 0,         // 0 ngàn
      max: 100000000, // 1 trăm triệu
      autoUnmask: true,
      removeMaskOnSubmit: true,
      unmaskAsNumber: true,
      inputtype: 'text',
      placeholder: "0",
      definitions: {
        "0": {
          validator: "[0-9\uFF11-\uFF19]"
        }
      }
    });
});
</script>
@endsection