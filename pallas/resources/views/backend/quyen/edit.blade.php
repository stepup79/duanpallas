@extends('backend.layouts.master')

@section('title')
Chức năng CRUD
@endsection

@section('content')

<form name="frmEdit" id="frmEdit" method="POST" action="{{ route('admin.quyen.update', ['id' => $quyen->q_id]) }}">
    <input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="q_ten">Tên quyền</label>
        <input type="text" class="form-control" name="q_ten" id="q_ten" value="{{ old('q_ten', $quyen->q_ten) }}">
    </div>
    <div class="form-group">
        <label for="q_dienGiai">Diễn giải</label>
        <input type="text" class="form-control" name="q_dienGiai" id="q_dienGiai" value="{{ old('q_dienGiai', $quyen->q_dienGiai) }}">
    </div>
    <div class="form-group">
        <label for="q_trangThai">Trạng thái</label>
        <select class="form-group" name="q_trangThai" id="q_trangThai">
            <option value="1" {{ old('q_trangThai', $quyen->q_trangThai) == 1 ?'selected' :'' }}>Khóa</option>
            <option value="2" {{ old('q_trangThai', $quyen->q_trangThai) == 2 ?'selected' :'' }}>Khả dụng</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.quyen.index') }}" class="btn btn-warning">Quay về</a>
</form>
@endsection