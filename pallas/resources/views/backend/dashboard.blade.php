@extends('backend.layouts.master')

@section('title')
Dashboard
@endsection

@section('custom-css')
<style>
  .img-hinhdaidien {
    width: 50px;
    height: 50px;
  }
  .notice {
        font-style: italic;
        font-size: 0.8em;
    }
</style>
@endsection

@section('content')
<!-- Info boxes -->
<div class="row" >
          <div class="col-12 col-sm-6 col-md-3" ng-controller="SanPhamController">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-bars"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sản Phẩm</span>
                <span class="info-box-number" ng-repeat="sp in danhsach_sanpham"><% sp.soluong %></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3" ng-controller="KhachHangController">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Khách Hàng</span>
                <span class="info-box-number" ng-repeat="kh in danhsach_khachhang"><% kh.soluong %></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3" ng-controller="DonHangController">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Đơn Hàng</span>
                <span class="info-box-number" ng-repeat="dh in danhsach_donhang"><% dh.soluong %></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3" ng-controller="LoaiSanPhamController">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Loại Sản Phẩm</span>
                <span class="info-box-number" ng-repeat="lsp in danhsach_loaisanpham"><% lsp.soluong %></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
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
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- ./card-body -->
        <div class="card-footer">
          <div class="row">
            <div class="col-md-12">
                <form method="get" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="thoigianLapBaoCao">Thời gian lập báo cáo</label>
                        <input type="text" class="form-control" id="thoigianLapBaoCao">
                        <span id="thoigianLapBaoCaoText" class="notice"></span>
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="tuNgay">Từ ngày</label>
                        <input type="text" class="form-control" id="tuNgay" name="tuNgay">
                    </div>
                    <div class="form-group" style="display: none;">
                        <label for="denNgay">Đến ngày</label>
                        <input type="text" class="form-control" id="denNgay" name="denNgay">
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnLapBaoCao">Lập báo cáo</button>
                </form>
            </div>
            <div class="col-md-12">
                <canvas id="chartOfobjChart" style="width: 100%;height: 400px;"></canvas>
            </div>
        </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

@endsection

@section('custom-scripts')
<script>
  // Khai báo controller `SanPhamController`
  app.controller('SanPhamController', function($scope, $http) {
    // Dữ liệu
    $scope.danhsach_sanpham = [];

    // sử dụng service $http của AngularJS để gởi request GET đến route `api.thongke.sanpham`
    $http({
        url: "{{ route('api.thongke.sanpham') }}",
        method: "GET"
    }).then(function successCallback(response) {
      // Nếu gởi request thành công thì chuyển dữ liệu sang cho AngularJS hiển thị
      $scope.danhsach_sanpham = response.data.result;
      console.log(response.data.result);
      console.log($scope.danhsach_sanpham);

    }, function errorCallback(response) {
        // Lấy dữ liệu không thành công, thông báo lỗi cho khách hàng biết
        swal('Có lỗi trong quá trình lấy dữ liệu!', 'Vui lòng thử lại sau vài phút.', 'error');
        console.log(response);
    });
  });
  // Khai báo controller `KhachHangController`
  app.controller('KhachHangController', function($scope, $http) {
    // Dữ liệu
    $scope.danhsach_khachhang = [];

    // sử dụng service $http của AngularJS để gởi request GET đến route `api.thongke.sanpham`
    $http({
        url: "{{ route('api.thongke.khachhang') }}",
        method: "GET"
    }).then(function successCallback(response) {
      // Nếu gởi request thành công thì chuyển dữ liệu sang cho AngularJS hiển thị
      $scope.danhsach_khachhang = response.data.result;
      console.log(response.data.result);
      console.log($scope.danhsach_khachhang);

    }, function errorCallback(response) {
        // Lấy dữ liệu không thành công, thông báo lỗi cho khách hàng biết
        swal('Có lỗi trong quá trình lấy dữ liệu!', 'Vui lòng thử lại sau vài phút.', 'error');
        console.log(response);
    });
  });
  // Khai báo controller `DonHangController`
  app.controller('DonHangController', function($scope, $http) {
    // Dữ liệu
    $scope.danhsach_donhang = [];

    // sử dụng service $http của AngularJS để gởi request GET đến route `api.thongke.sanpham`
    $http({
        url: "{{ route('api.thongke.donhang') }}",
        method: "GET"
    }).then(function successCallback(response) {
      // Nếu gởi request thành công thì chuyển dữ liệu sang cho AngularJS hiển thị
      $scope.danhsach_donhang = response.data.result;
      console.log(response.data.result);
      console.log($scope.danhsach_donhang);

    }, function errorCallback(response) {
        // Lấy dữ liệu không thành công, thông báo lỗi cho khách hàng biết
        swal('Có lỗi trong quá trình lấy dữ liệu!', 'Vui lòng thử lại sau vài phút.', 'error');
        console.log(response);
    });
  });
  // Khai báo controller `LoaiSanPhamController`
  app.controller('LoaiSanPhamController', function($scope, $http) {
    // Dữ liệu
    $scope.danhsach_loaisanpham = [];

    // sử dụng service $http của AngularJS để gởi request GET đến route `api.thongke.loaisanpham`
    $http({
        url: "{{ route('api.thongke.loaisanpham') }}",
        method: "GET"
    }).then(function successCallback(response) {
      // Nếu gởi request thành công thì chuyển dữ liệu sang cho AngularJS hiển thị
      $scope.danhsach_loaisanpham = response.data.result;
      console.log(response.data.result);
      console.log($scope.danhsach_loaisanpham);

    }, function errorCallback(response) {
        // Lấy dữ liệu không thành công, thông báo lỗi cho khách hàng biết
        swal('Có lỗi trong quá trình lấy dữ liệu!', 'Vui lòng thử lại sau vài phút.', 'error');
        console.log(response);
    });
  });
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
</script>
<!-- Xử lý daterangepicker -->
<script>
    $(document).ready(function() {
        $('#thoigianLapBaoCao').daterangepicker({
            "showWeekNumbers": true,
                "showISOWeekNumbers": true,
                "timePicker": true,
                "timePicker24Hour": true,
                "locale": {
                    "format": "DD/MM/YYYY HH:mm:ss",
                    "separator": " - ",
                    "applyLabel": "Đồng ý",
                    "cancelLabel": "Hủy",
                    "fromLabel": "Từ",
                    "toLabel": "Đến",
                    "customRangeLabel": "Tùy chọn",
                    "weekLabel": "T",
                    "daysOfWeek": [
                        "CN",
                        "T2",
                        "T3",
                        "T4",
                        "T5",
                        "T6",
                        "T7"
                    ],
                    "monthNames": [
                        "Tháng 1",
                        "Tháng 2",
                        "Tháng 3",
                        "Tháng 4",
                        "Tháng 5",
                        "Tháng 6",
                        "Tháng 7",
                        "Tháng 8",
                        "Tháng 9",
                        "Tháng 10",
                        "Tháng 11",
                        "Tháng 12",
                    ],
                    "firstDay": 1
                },
                "startDate": "15/07/2019",
                "endDate": "21/07/2019",
                ranges: {
                    'Hôm nay': [moment(), moment()],
                    'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 ngày gần nhất': [moment().subtract(6, 'days'), moment()],
                    '30 ngày gần nhất': [moment().subtract(29, 'days'), moment()],
                    'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                    'Tháng rồi': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, function(start, end, label) {
                // Hiển thị thời gian đã chọn
                $('#thoigianLapBaoCaoText').html('Dữ liệu sẽ được thống kê từ <span style="font-weight: bold">' + start.format('DD/MM/YYYY, HH:mm') + '</span> đến <span style="font-weight: bold">' + end.format('DD/MM/YYYY, HH:mm') + '</span><br />Thời gian lập báo cáo có thể tốn vài phút, vui lòng bấm nút <span style="font-weight: bold">"Lập báo cáo"</span> và chờ đợi trong giây lát!');

                // Gán giá trị cho Ngày để gởi dữ liệu về Backend
                $('#tuNgay').val(start.format('YYYY-MM-DD HH:mm:ss'));
                $('#denNgay').val(end.format('YYYY-MM-DD HH:mm:ss'));
        });
    });
</script>

<!-- Xử lý Numeraljs -->
<script>
    // Đăng ký tiền tệ VNĐ
    numeral.register('locale', 'vi', {
        delimiters: {
            thousands: ',',
            decimal: '.'
        },
        abbreviations: {
            thousand: 'k',
            million: 'm',
            billion: 'b',
            trillion: 't'
        },
        ordinal: function(number) {
            return number === 1 ? 'một' : 'không';
        },
        currency: {
            symbol: 'vnđ'
        }
    });

    // Sử dụng locate vi (Việt nam)
    numeral.locale('vi');
</script>

<!-- Các script dành cho thư viện ChartJS -->
<script src="{{ asset('vendor/Chart.js/Chart.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var objChart;
        var $chartOfobjChart = document.getElementById("chartOfobjChart").getContext("2d");

        $("#btnLapBaoCao").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('backend.baocao.donhang.data') }}',
                type: "GET",
                data: {
                    tuNgay: $('#tuNgay').val(),
                    denNgay: $('#denNgay').val(),
                },
                success: function(response) {
                    var myLabels = [];
                    var myData = [];
                    $(response.data).each(function() {
                        myLabels.push(moment(this.thoiGian).format('DD/MM/YYYY'));
                        myData.push(this.tongThanhTien);
                    });
                    myData.push(0); // creates a '0' index on the graph

                    if (typeof $objChart !== "undefined") {
                        $objChart.destroy();
                    }

                    $objChart = new Chart($chartOfobjChart, {
                        // The type of chart we want to create
                        type: "bar",

                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                borderColor: "#9ad0f5",
                                backgroundColor: "#9ad0f5",
                                borderWidth: 1
                            }]
                        },

                        // Configuration options go here
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Báo cáo đơn hàng"
                            },
                            scales: {
                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Ngày nhận đơn hàng'
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            return numeral(value).format('0,0 $')
                                        }
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Tổng thành tiền'
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(tooltipItem, data) {
                                        return numeral(tooltipItem.value).format('0,0 $')
                                    }
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                        }
                    });
                }
            });
        });
    });
</script>
@endsection