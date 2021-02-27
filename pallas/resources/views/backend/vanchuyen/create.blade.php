@extends('backend.layouts.master')

@section('title')
Danh mục Hình thức vận chuyển
@endsection

@section('content')

<form name="frmCreate" id="frmCreate" method="POST" action="{{ route('admin.vanchuyen.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="vc_ten">Tên loại vận chuyển</label>
        <input type="text" class="form-control" name="vc_ten" id="vc_ten" value="{{ old('vc_ten') }}">
    </div>
    <div class="form-group">
        <label for="vc_chiPhi">Chi phí</label>
        <input type="text" class="form-control" name="vc_chiPhi" id="vc_chiPhi" value="{{ old('vc_chiPhi') }}">
    </div>
    <div class="form-group">
        <label for="vc_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" name="vc_dienGiai" id="vc_dienGiai" value="{{ old('vc_dienGiai') }}">
    </div>
    <div class="form-group">
        <label for="vc_trangThai">Trạng thái</label>
        <select class="form-control" name="vc_trangThai" id="vc_trangThai">
            <option value="1" {{ old('vc_trangThai') == 1 ?'selected' :'' }}>Khóa</option>
            <option value="2" {{ old('vc_trangThai') == 2 ?'selected' :'' }}>Khả dụng</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.vanchuyen.index') }}" class="btn btn-warning">Quay về</a>
</form>
@endsection