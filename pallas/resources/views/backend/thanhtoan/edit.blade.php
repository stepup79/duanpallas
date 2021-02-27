@extends('backend.layouts.master')

@section('title')
Danh mục Hình thức thanh toán
@endsection

@section('content')

<form name="frmEdit" id="frmEdit" method="POST" action="{{ route('admin.thanhtoan.update', ['id' => $thanhtoan->tt_id]) }}">
    <input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="tt_ten">Tên loại thanh toán</label>
        <input type="text" class="form-control" name="tt_ten" id="tt_ten" value="{{ old('tt_ten', $thanhtoan->tt_ten) }}">
    </div>
    <div class="form-group">
        <label for="tt_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" name="tt_dienGiai" id="tt_dienGiai" value="{{ old('tt_dienGiai', $thanhtoan->tt_dienGiai) }}">
    </div>
    <div class="form-group">
        <label for="tt_trangThai">Trạng thái</label>
        <select class="form-control" name="tt_trangThai" id="tt_trangThai">
            <option value="1" {{ old('tt_trangThai', $thanhtoan->tt_trangThai) == 1 ?'selected' :'' }}>Khóa</option>
            <option value="2" {{ old('tt_trangThai', $thanhtoan->tt_trangThai) == 2 ?'selected' :'' }}>Khả dụng</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.thanhtoan.index') }}" class="btn btn-warning">Quay về</a>
</form>
@endsection