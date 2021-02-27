@extends('frontend.layouts.master')

@section('title')
Chính sách giao hàng | Đổi trả - Pallas
@endsection

@section('custom-css')
@endsection

@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('storage/img/bg-01.jpg') }}');">
    <h2 class="mtext-100 cl2 txt-center">
        Chính sách giao hàng - Đổi trả
    </h2>
</section>


<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-105 cl2 p-b-16">
                        Chính sách giao hàng
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Hàng sẽ được giao tại địa chỉ được cung cấp bởi khách hàng khi đặt mua. Khách hàng có trách nhiệm 
                        cung cấp đầy đủ các thông tin cần thiết để quá trình giao hàng được diễn ra thuận lợi như: địa chỉ 
                        chính xác, số nhà, quận, huyện, phường, xã, số điện thoại cần liên hệ. Chúng tôi không chịu trách 
                        nhiệm đối với các trường hợp chuyển hàng sai địa chỉ do lỗi của khách hàng. <br/>
                        Chi phí vận chuyển được tính tùy vào địa chỉ nhận của khách hàng. <br/>
                        - Với hóa đơn từ 500.000 VND trở lên, Pallas Flower vận chuyển miễn phí một số quận nội 
                        thành TP.Cần Thơ như Quận Ninh Kiều, Bình Thủy, Cái Răng. <br/>
                        Trong trường hợp không có người nhận, vấn đề sẽ xử lý sẽ như sau: <br/>
                        - Các mặt hàng không thể để lâu được (Hoa, bánh kem): Khách hàng phải trả 100% giá trị. <br/>
                        - Các mặt hàng khác (Bánh kẹo, gấu bông): Khách hàng không phải trả.            
                    </p>

                    <h3 class="mtext-105 cl2 p-b-16">
                        Thời gian giao hàng
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Sau khi đơn hàng được xác nhận, chúng tôi sẽ giao đúng thời gian khách hàng yêu cầu, trong 
                        trường hợp giờ giao không phù hợp chúng tôi sẽ trao đổi trước. Đơn hàng chỉ được thực hiện 
                        khi có sự đồng ý của cả 2 bên.
                    </p>

                    <h3 class="mtext-105 cl2 p-b-16">
                        Các vấn đề khi giao hàng
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                        Việc giao hàng sẽ được thực hiện bởi các nhân viên giao hàng của chúng tôi. Hàng hóa trong 
                        quá trình vận chuyển có thể chịu rủi ro ngoài ý muốn như gãy, hỏng … Khách hàng cần kiểm tra 
                        kỹ tình trạng gói hàng cũng như số lượng đơn hàng. Mọi khiếu nại liên quan đến việc vận chuyển 
                        hàng hóa cần phải được khách hàng thông báo lại cho chúng tôi trong ngày sau khi nhận được hàng. 
                        Khách hàng có thể thông báo bằng cách: <br/>
                        - Liên hệ trực tiếp qua điện thoại trong phần liên hệ. <br/>
                        - Gửi thông tin ý kiến phản hồi về địa chỉ email: info@pallasflower.vn
                    </p>
                    <h3 class="mtext-105 cl2 p-b-16">
                        Theo dõi đơn hàng
                    </h3>
                    <p class="stext-113 cl6 p-b-26">
                        Khách hàng có thể theo dõi tình trạng giao hàng bằng cách gọi điện về tổng đài chăm sóc khách 
                        hàng của chúng tôi. Nhân viên của chúng tôi sẽ có trách nhiệm thông báo tới khách hàng về tình 
                        trạng đơn hàng. Ngay khi nhận được đơn đặt hàng của khách hàng, nhân viên của chúng tôi sẽ liên 
                        lạc với khách hàng để thông báo về tình trạng của đơn hàng đó và các bước cần làm tiếp theo. 
                        Nhân viên đó sẽ chịu trách nhiệm giữ liên lạc đến khi khách hàng nhận được hàng của mình.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-105 cl2 p-b-16">
                        Chính sách đổi trả
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Chúng tôi chịu trách nhiệm cung cấp thông tin đầy đủ, chính xác nhất về các mẫu sản phẩm trên 
                        trang web homepallas.vn như hình ảnh, màu sắc, kiểu dáng, kích cỡ, số lượng, chất liệu,… Khách 
                        hàng cần xem xét kỹ trước khi quyết định đặt mua. Chúng tôi chỉ nhận lại sản phẩm khi sản phẩm 
                        đó không đúng với miêu tả trên trang web của chúng tôi và không đúng với yêu cầu trong đơn đặt 
                        mua hàng của khách hàng. Trong trường hợp này, khách hàng sẽ được nhận lại 100% số tiền giá sản 
                        phẩm. Thời hạn hoàn trả tiền chậm nhất là 5 ngày kể từ ngày nhận được trả lời chính thức của 
                        chúng tôi. Khách hàng có thể nhận lại tiền qua chuyển khoản, hoặc tiền mặt. <br/>
                        Trong tất cả các trường hợp khác, chúng tôi không chịu trách nhiệm đối với các lỗi không phải do chúng tôi gây ra. <br/>
                        Sản phẩm trả lại không đầy đủ, gãy, hỏng, bẩn, rách, mất tag … do lỗi của khách hàng sẽ không được chấp nhận đổi trả.
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom-scripts')
@endsection