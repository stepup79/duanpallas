@extends('frontend.layouts.master')

@section('title')
Thống kê số liệu
@endsection

@section('custom-css')
<style>
  .img-hinhdaidien {
    width: 50px;
    height: 50px;
  }
  .main {
      margin-top: 80px;
  }
</style>
@endsection

@section('main-content')

<div class="container main">
    <h1 class="text-center">Thống kê số liệu</h1>
    <div class="card mb-2" ng-controller="thongKeSanPhamController">
        <div class="card-header">Top 5 sản phẩm mới nhất</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Hình đại diện</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá</td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="sp in danhsach_top5_sanpham_moinhat">
                        <td><% $index + 1 %></td>
                        <td>
                            <img ng-src="/storage/photos/<% sp.sp_hinh %>" class="img-hinhdaidien"/>
                        </td>
                        <td><% sp.sp_ten %></td>
                        <td><% sp.sp_gia | number:0 %></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tìm kiếm -->
    <h1 class="text-center">Tìm kiếm sản phẩm</h1>
    <div ng-controller="timKiemSanPhamController">
        <label for="keyword_search_by_tensanpham">Tên sản phẩm</label>
            <input type="text" id="keyword_search_by_tensanpham" class="form-control"/>
        <label for="keyword_search_by_giatu">Giá từ</label>
            <input type="text" id="keyword_search_by_giatu" class="form-control"/>
        <label for="keyword_search_by_giaden">Giá đến</label>
            <input type="text" id="keyword_search_by_giaden" class="form-control"/>
        <button type="button" name="btnTimKiem" id="btnTimKiem" class="btn btn-primary" ng-click="timKiem()">Tìm kiếm</button>

        <h2 class="text-center mb-2">Kết quả tìm được</h2>
        <ul>
            <li ng-repeat="sp in ketquatimduoc">
                <% sp.sp_ten %> - <% sp.sp_gia | number %><u>đ</u>
            </li>
        </ul>
    </div>
</div>

@endsection

@section('custom-scripts')
<script>
    // Khai báo controller `thongKeSanPhamController`
    app.controller('thongKeSanPhamController', function($scope, $http) {
        // Dữ liệu
        $scope.danhsach_top5_sanpham_moinhat = [];

        // sử dụng service $http của AngularJS để gởi request GET đến route `api.thongke.top5_sanpham_moinhat`
        $http({
            url: "{{ route('api.thongke.top5_sanpham_moinhat') }}",
            method: "GET"
        }).then(function successCallback(response) {
        // Nếu gởi request thành công thì chuyển dữ liệu sang cho AngularJS hiển thị
        $scope.danhsach_top5_sanpham_moinhat = response.data.result;dd($scope.danhsach_top5_sanpham_moinhat);
        console.log(response.data.result);
        console.log($scope.danhsach_top5_sanpham_moinhat);

        }, function errorCallback(response) {
            // Lấy dữ liệu không thành công, thông báo lỗi cho khách hàng biết
            swal('Có lỗi trong quá trình lấy dữ liệu!', 'Vui lòng thử lại sau vài phút.', 'error');
            console.log(response);
        });
    });

    app.controller('timKiemSanPhamController', function($scope, $http) {
        $scope.ketquatimduoc = [];
        $scope.timKiem = function() {
            var sendData = {
                    keyword_search_by_tensanpham: $('#keyword_search_by_tensanpham').val(),
                    keyword_search_by_giatu: $('#keyword_search_by_giatu').val(),
                    keyword_search_by_giaden: $('#keyword_search_by_giaden').val(),
            };

            var url = "{{ route('api.sanpham.timkiem') }}";
            url += '?keyword_search_by_tensanpham=' + sendData.keyword_search_by_tensanpham;
            url += '&keyword_search_by_giatu=' + sendData.keyword_search_by_giatu;
            url += '&keyword_search_by_giaden=' + sendData.keyword_search_by_giaden;

            $http({
                    url: url,
                    method: "GET", // Nếu là POST thì sử dụng url cũ
                    data: JSON.stringify(sendData)
            }).then(function successCallback(response) {
                $scope.ketquatimduoc = response.data.result;
            }, function errorCallback(response) {

            });
        };
    });
</script>
@endsection