@extends('frontend.layouts.master')

@section('title')
Hướng dẫn đặt hoa & thanh toán
@endsection

@section('custom-css')
@endsection

@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('storage/img/bg-01.jpg') }}');">
    <h2 class="mtext-100 cl2 txt-center">
        Hướng dẫn đặt hoa và thanh toán
    </h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 p-b-30">
                <h2 class="mtext-105 cl2 p-b-16 text-center">HƯỚNG DẪN ĐẶT HOA</h2>
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="stext-105 cl2 p-b-16">
                        ĐẶT HOA TẠI PALLAS FLOWER
                    </h3>
                    <ul class="stext-115 cl6 p-b-16">
                        <li>1. Chọn một mẫu hoa rồi ấn vào nút <b>“Thêm vào giỏ hàng”</b></li>
                        <li>2. Xác nhận nội dung trong giỏ hàng rồi ấn nút <b>“Tiến hành thanh toán”</b></li>
                        <li>3. Nhập mã giảm giá (nếu có)</li>
                    </ul>
                    <h3 class="stext-105 cl2 p-b-16">
                        THANH TOÁN
                    </h3>
                    <ul class="stext-115 cl6 p-b-16">
                        <li>1. Nhập thông tin người đặt hoa</li>
                        <li>2. Nhập thông tin người nhận hoa</li>
                        <li>3. Nhập thời gian giao hoa & thông tin thiệp / ghi chú về đơn hàng (nếu có)</li>
                        <li>4. Lựa chọn phương thức thanh toán</li>
                        <li>5. Chọn <b>“Đặt hàng”</b> và tiến hành thanh toán</li>
                    </ul>
                    <h3 class="stext-105 cl2 p-b-16">
                        XÁC NHẬN ĐƠN HÀNG
                    </h3>
                    <ul class="stext-115 cl6 p-b-16">
                        <li>1. Nhận email xác nhận đặt hàng thành công từ Pallas Flower</li>
                        <li>2. Pallas Flower sẽ gọi cho bạn để xác nhận chi tiết đơn hàng (Với đơn hàng đặt sau 20:00, Pallas Flower sẽ xác nhận đơn hàng của bạn vào khung giờ 8:00 – 9:30 ngày hôm sau)</li>
                    </ul>
                    <h3 class="stext-105 cl2 p-b-16">
                        GIAO HOA ĐẾN NGƯỜI NHẬN
                    </h3>
                    <p class="stext-115 cl6 p-b-26">
                        Pallas Flower giao hoa đến tận tay người nhận theo thông tin đã được cung cấp
                    </p>
                </div>
                
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                <h2 class="mtext-105 cl2 p-b-16 text-center">HƯỚNG DẪN THANH TOÁN</h2>
                    <p class="stext-115 cl6 p-b-26">
                        Pallas Flower hỗ trợ các hình thức thanh toán sau:
                    </p>
                    <h3 class="stext-105 cl2 p-b-16">
                        THANH TOÁN TIỀN MẶT
                    </h3>
                    <ul class="stext-115 cl6 p-b-16">
                        <li>- Khách hàng thanh toán trực tiếp khi đến nhận hàng tại shop.</li>
                        <li>- Khách hàng thanh toán tiền mặt khi nhận hoa tại địa chỉ ship.</li>
                    </ul>
                    <h3 class="stext-105 cl2 p-b-16">
                        CHUYỂN KHOẢN NGÂN HÀNG
                    </h3>
                    <p class="stext-115 cl6 p-b-26">
                        Khách hàng thực hiện chuyển khoản theo thông tin như bên dưới
                    </p>
                    <ul class="stext-113 cl6 p-b-16">
                        <li><b>SACOMBANK</b> - Chi nhánh Ninh Kiều (TP. Cần Thơ).</li>
                        <li><b>CHỦ TÀI KHOẢN</b> - HỒ DUY THÁI</li>
                        <li><b>SỐ TÀI KHOẢN</b> - 0272944639214</li>
                    </ul>
                    <ul class="stext-111 cl6 p-b-16">
                        <li><i>*Khách hàng vui lòng ghi rõ nội dung chuyển khoản gồm: Họ & Tên người đặt hàng + Mã Đơn Hàng để Pallas Flower có thể kiểm tra chính xác thanh toán của quý khách.</i></li>
                        <li><i>*Vui lòng chuyển khoản trước thời gian mà món quà được ấn định giao ít nhất 02 giờ đồng hồ.</i></li>
                    </ul>
                    <h3 class="stext-105 cl2 p-b-16">
                        THANH TOÁN QUA THẺ ATM & VISA/MASTERCARD
                    </h3>
                    <p class="stext-115 cl6 p-b-26">
                        Khách hàng có thể thực hiện thanh toán bằng thẻ thanh toán nội địa ATM & thẻ thanh toán quốc tế (Visa/MasterCard) thông qua cổng thanh toán trực tuyến OnePay khi đặt hàng trực tiếp trên website.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom-scripts')
@endsection