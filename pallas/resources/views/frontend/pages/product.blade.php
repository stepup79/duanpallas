@extends('frontend.layouts.master')

@section('title')
Danh mục Hoa tươi - Pallas
@endsection

@section('custom-css')
@endsection

@section('main-content')

@include('frontend.widgets.product-list', [$data = $danhsachsanpham])

@endsection

@section('custom-scripts')
@endsection