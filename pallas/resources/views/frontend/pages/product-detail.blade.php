@extends('frontend.layouts.master')

@section('title')
Sản phẩm Shop Hoa tươi - Pallas
@endsection

@section('custom-css')
@endsection

@section('main-content')

<!-- Product info -->
@include('frontend.widgets.product-info', ['sp' => $sp, 'hinhanhlienquan' => $danhsachhinhanhlienquan])

@endsection

@section('custom-scripts')
@endsection