@extends('backend.layouts.master')

@section('title')
Danh mục Loại sản phẩm
@endsection

@section('content')

<form name="frmEdit" id="frmEdit" method="POST" action="{{ route('admin.loai.update', ['id' => $loai->l_id]) }}">
    <input type="hidden" name="_method" value="PUT"/>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ten">Tên loại</label>
        <input type="text" class="form-control" name="l_ten" id="l_ten" value="{{ old('l_ten', $loai->l_ten) }}">
    </div>
    <div class="form-group">
        <label for="cd_id">Chủ đề</label>
        <select class="form-control" name="cd_id" id="cd_id">
            @foreach($dsChude as $cd)
                @if($cd->cd_id == $loai->cd_id)
                <option value="{{ $cd->cd_id }}" selected>{{ $cd->cd_ten }}</option>
                @else
                <option value="{{ $cd->cd_id }}">{{ $cd->cd_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="l_trangThai">Trạng thái</label>
        <select class="form-control" name="l_trangThai" id="l_trangThai">
            <option value="1" {{ old('l_trangThai', $loai->l_trangThai) == 1 ?'selected' :'' }}>Khóa</option>
            <option value="2" {{ old('l_trangThai', $loai->l_trangThai) == 2 ?'selected' :'' }}>Khả dụng</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>
    <a href="{{ route('admin.loai.index') }}" class="btn btn-warning">Quay về</a>
</form>
@endsection