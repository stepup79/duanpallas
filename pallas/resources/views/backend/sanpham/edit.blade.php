@extends('backend.layouts.master')

@section('title')
Danh mục Sản phẩm
@endsection

@section('custom-css')
<!-- CSS dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form name="frmEdit" id="frmEdit" method="POST" action="{{ route('admin.sanpham.update', ['id' => $sp->sp_id]) }}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="sp_ma">Mã sản phẩm</label>
        <input type="text" class="form-control" name="sp_ma" id="sp_ma" value="{{ old('sp_ma', $sp->sp_ma) }}">
    </div>
    <div class="form-group">
        <label for="sp_ten">Tên sản phẩm</label>
        <input type="text" class="form-control" name="sp_ten" id="sp_ten" value="{{ old('sp_ten', $sp->sp_ten) }}">
    </div>   
    <div class="form-group">
        <label for="sp_gia">Giá bán</label>
        <input type="text" class="form-control" name="sp_gia" id="sp_gia" value="{{ old('sp_gia', $sp->sp_gia) }}">
    </div>
    <div class="form-group">
        <label for="sp_thongTin">Thông tin</label>
        <input type="text" class="form-control" name="sp_thongTin" id="sp_thongTin" value="{{ old('sp_thongTin', $sp->sp_thongTin) }}">
    </div>
    <div class="form-group">
        <label for="sp_danhGia">Đánh giá</label>
        <input type="text" class="form-control" name="sp_danhGia" id="sp_danhGia" value="{{ old('sp_danhGia', $sp->sp_danhGia) }}">
    </div>
    <div class="form-group">
        <label for="sp_trangThai">Trạng thái</label>
        <select class="form-control" name="sp_trangThai" id="sp_trangThai">
            <option value="1" {{ old('sp_trangThai', $sp->sp_trangThai) == 1 ?"selected" : "" }}>Khóa</option>
            <option value="2" {{ old('sp_trangThai', $sp->sp_trangThai) == 2 ?"selected" : "" }}>Khả dụng</option>
        </select>
    </div>
    <div class="form-group">
        <label for="l_id">Loại sản phẩm</label>
        <select class="form-control" name="l_id" id="l_id">
            @foreach($dsLoai as $loai)
                @if($loai->l_id == $sp->l_id)
                <option value="{{ $loai->l_id }}" selected>{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai->l_id }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="ncc_id">Nhà cung cấp</label>
        <select class="form-control" name="ncc_id" id="ncc_id">
            @foreach($dsNhacungcap as $ncc)
                @if($ncc->ncc_id == $sp->ncc_id)
                <option value="{{ $ncc->ncc_id }}" selected>{{ $ncc->ncc_ten }}</option>
                @else
                <option value="{{ $ncc->ncc_id }}">{{ $ncc->ncc_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="file-loading">
            <label for="sp_hinh">Hình</label>
            <input type="file" name="sp_hinh" id="sp_hinh">
        </div>
    </div>
    <div class="form-group">
        <div class="file-loading">
            <label>Hình ảnh liên quan sản phẩm</label>
            <input id="sp_hinhanhlienquan" type="file" name="sp_hinhanhlienquan[]" multiple>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
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
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        append: false,
        showRemove: false,
        autoReplace: true,
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewShowDelete: false,
        initialPreviewAsData: true,
        initialPreview: [
            "{{ asset('storage/photos/' . $sp->sp_hinh) }}"
        ],
        initialPreviewConfig: [
            {
                caption: "{{ $sp->sp_hinh }}", 
                size: {{ Storage::exists('public/photos/' . $sp->sp_hinh) ? Storage::size('public/photos/' . $sp->sp_hinh) : 0 }}, 
                width: "120px", 
                url: "{$url}", 
                key: 1
            },
        ]
    });

    // Ô nhập liệu cho phép chọn nhiều hình ảnh cùng lúc (các hình ảnh liên quan đến sản phẩm)
    $("#sp_hinhanhlienquan").fileinput({
        theme: 'fas',
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        append: false,
        showRemove: false,
        autoReplace: true,
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        allowedFileExtensions: ["jpg", "gif", "png", "txt"],
        initialPreviewShowDelete: false,
        initialPreviewAsData: true,
        initialPreview: [
            @foreach($sp->hinhanhlienquan()->get() as $hinhanh)
            "{{ asset('storage/photos/' . $hinhanh->ha_ten) }}",
            @endforeach
        ],
        initialPreviewConfig: [
            @foreach($sp->hinhanhlienquan()->get() as $index=>$hinhanh)
            {
                caption: "{{ $hinhanh->ha_ten }}", 
                size: {{ Storage::exists('public/photos/' . $hinhanh->ha_ten) ? Storage::size('public/photos/' . $hinhanh->ha_ten) : 0 }}, 
                width: "120px", 
                url: "{$url}", 
                key: {{ ($index + 1) }}
            },
            @endforeach
        ]
    });
});
</script>

<!-- SCRIPTS dành cho thư viện input-mask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}" type="text/javascript"></script>

@endsection