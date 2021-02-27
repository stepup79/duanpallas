<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Chức năng CRUD table Loai
Route::get('admin/loai/print', 'Backend\LoaiController@print') ->name('admin.loai.print');
Route::get('admin/loai/excel', 'Backend\LoaiController@excel') ->name('admin.loai.excel');
Route::get('admin/loai/pdf', 'Backend\LoaiController@pdf') ->name('admin.loai.pdf');
Route::resource('/admin/loai', 'Backend\LoaiController', ['as' => 'admin']);

// Chức năng CRUD table Vanchuyen
Route::get('admin/vanchuyen/print', 'Backend\VanChuyenController@print') ->name('admin.vanchuyen.print');
Route::get('admin/vanchuyen/excel', 'Backend\VanChuyenController@excel') ->name('admin.vanchuyen.excel');
Route::get('admin/vanchuyen/pdf', 'Backend\VanChuyenController@pdf') ->name('admin.vanchuyen.pdf');
Route::resource('/admin/vanchuyen', 'Backend\VanChuyenController', ['as' => 'admin']);

// Chức năng CRUD table Thanhtoan
Route::get('admin/thanhtoan/print', 'Backend\ThanhToanController@print') ->name('admin.thanhtoan.print');
Route::get('admin/thanhtoan/excel', 'Backend\ThanhToanController@excel') ->name('admin.thanhtoan.excel');
Route::get('admin/thanhtoan/pdf', 'Backend\ThanhToanController@pdf') ->name('admin.thanhtoan.pdf');
Route::resource('/admin/thanhtoan', 'Backend\ThanhToanController', ['as' => 'admin']);

// Chức năng CRUD table Nhacungcap
Route::get('admin/nhacungcap/print', 'Backend\NhaCungCapController@print') ->name('admin.nhacungcap.print');
Route::get('admin/nhacungcap/excel', 'Backend\NhaCungCapController@excel') ->name('admin.nhacungcap.excel');
Route::get('admin/nhacungcap/pdf', 'Backend\NhaCungCapController@pdf') ->name('admin.nhacungcap.pdf');
Route::resource('/admin/nhacungcap', 'Backend\NhaCungCapController', ['as' => 'admin']);

// Chức năng CRUD table Quyen
Route::get('admin/quyen/print', 'Backend\QuyenController@print') ->name('admin.quyen.print');
Route::get('admin/quyen/excel', 'Backend\QuyenController@excel') ->name('admin.quyen.excel');
Route::get('admin/quyen/pdf', 'Backend\QuyenController@pdf') ->name('admin.quyen.pdf');
Route::resource('/admin/quyen', 'Backend\QuyenController', ['as' => 'admin']);

// Chức năng CRUD table Chude
Route::get('admin/chude/print', 'Backend\ChuDeController@print') ->name('admin.chude.print');
Route::get('admin/chude/excel', 'Backend\ChuDeController@excel') ->name('admin.chude.excel');
Route::get('admin/chude/pdf', 'Backend\ChuDeController@pdf') ->name('admin.chude.pdf');
Route::resource('/admin/chude', 'Backend\ChuDeController', ['as' => 'admin']);

// Chức năng CRUD table Sanpham
Route::get('admin/sanpham/print', 'Backend\SanPhamController@print') ->name('admin.sanpham.print');
Route::get('admin/sanpham/excel', 'Backend\SanPhamController@excel') ->name('admin.sanpham.excel');
Route::get('admin/sanpham/pdf', 'Backend\SanPhamController@pdf') ->name('admin.sanpham.pdf');
Route::resource('/admin/sanpham', 'Backend\SanPhamController', ['as' => 'admin']);

// Chức năng CRUD table Khachhang
Route::get('admin/khachhang/print', 'Backend\KhachHangController@print') ->name('admin.khachhang.print');
Route::get('admin/khachhang/excel', 'Backend\KhachHangController@excel') ->name('admin.khachhang.excel');
Route::get('admin/khachhang/pdf', 'Backend\KhachHangController@pdf') ->name('admin.khachhang.pdf');
Route::resource('/admin/khachhang', 'Backend\KhachHangController', ['as' => 'admin']);
Route::get('dang-ky', 'Backend\KhachHangController@create') ->name('admin.khachhang.create');

// Chức năng CRUD table Nhanvien
Route::get('admin/nhanvien/print', 'Backend\NhanVienController@print') ->name('admin.nhanvien.print');
Route::get('admin/nhanvien/excel', 'Backend\NhanVienController@excel') ->name('admin.nhanvien.excel');
Route::get('admin/nhanvien/pdf', 'Backend\NhanVienController@pdf') ->name('admin.nhanvien.pdf');
Route::resource('/admin/nhanvien', 'Backend\NhanVienController', ['as' => 'admin']);

// Chức năng CRUD table Donhang
Route::get('admin/donhang/print', 'Backend\DonHangController@print') ->name('admin.donhang.print');
Route::get('admin/donhang/excel', 'Backend\DonHangController@excel') ->name('admin.donhang.excel');
Route::get('admin/donhang/pdf', 'Backend\DonHangController@pdf') ->name('admin.donhang.pdf');
Route::resource('/admin/donhang', 'Backend\DonHangController', ['as' => 'admin']);

// Route chức năng đăng nhập
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Backend dashboard
Route::get('/dashboard', 'Backend\BackendController@dashboard')->name('backend.dashboard');

// Frontend index
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');

// Frontend about
Route::get('/gioi-thieu', 'Frontend\FrontendController@about')->name('frontend.about');

// Frontend policy
Route::get('/chinh-sach', 'Frontend\FrontendController@policy')->name('frontend.policy');

// Frontend tutorial
Route::get('/huong-dan-dat-hoa-va-thanh-toan', 'Frontend\FrontendController@tutorial')->name('frontend.tutorial');

// Frontend contact
Route::get('/lien-he', 'Frontend\FrontendController@contact')->name('frontend.contact');
Route::post('/lien-he/gui-loi-nhan', 'Frontend\FrontendController@sendMailContactForm')->name('frontend.contact.sendMailContactForm');

// Frontend product
Route::get('/san-pham', 'Frontend\FrontendController@product')->name('frontend.product');
Route::get('/san-pham/{id}', 'Frontend\FrontendController@productDetail')->name('frontend.productDetail');

// Frontend cart
Route::get('/gio-hang', 'Frontend\FrontendController@cart')->name('frontend.cart');
Route::post('/dat-hang', 'Frontend\FrontendController@order')->name('frontend.order');
Route::get('/dat-hang/hoan-tat', 'Frontend\FrontendController@orderFinish')->name('frontend.orderFinish');

// Tạo route Báo cáo Đơn hàng
Route::get('/admin/baocao/donhang', 'Backend\BaoCaoController@donhang')->name('backend.baocao.donhang');
Route::get('/admin/baocao/donhang/data', 'Backend\BaoCaoController@donhangData')->name('backend.baocao.donhang.data');

// Route chuyển đổi ngôn ngữ
Route::get('setLocale/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
      Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('app.setLocale');

// Route thống kê
Route::get('/thong-ke', 'Frontend\FrontendController@thongke')->name('frontend.pages.thongke');
