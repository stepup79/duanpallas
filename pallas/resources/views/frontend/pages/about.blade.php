@extends('frontend.layouts.master')

@section('title')
Giới thiệu - Pallas
@endsection

@section('custom-css')
@endsection

@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-10 p-tb-92" style="background-image: url('{{ asset('storage/img/bg-01.jpg') }}');">
    <h1 class="mtext-100 cl2 txt-center">
        Giới Thiệu
    </h1>
</section>


<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-105 cl2 p-b-16">
                        ĐIỀU GÌ LÀM BẠN THẤY VUI VÀ HẠNH PHÚC HÔM NAY?
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Đó là câu hỏi mà tôi đã đặt ra cho bản thân mỗi sáng thức giấc. Vào cuối năm 2019, với Pallas Flower, 
                        chúng tôi đã tìm ra được câu trả lời cho chính mình. Pallas Flower được thành lập vì chúng tôi tin 
                        rằng “Hạnh phúc là được yêu thương, chia sẻ và quan tâm mỗi ngày.” Thông qua các sản phẩm đột phá 
                        từ hoa tươi, trái cậy, kẹo bông gòn, chocolate…Chúng tôi muốn tạo ra những sản phẩm hoa và quà tặng 
                        đặc biệt nhất thị trường Việt Nam để mọi người có thể trao tay nhau mỗi ngày.
                    </p>

                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="{{ asset('storage/img/about-us.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-105 cl2 p-b-16">
                        MONG MUỐN CỦA CHÚNG TÔI!
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Pallas Flower mong muốn trở thành dịch vụ số 1 Việt Nam về việc chia sẻ cảm xúc và gắn kết yêu thương 
                        thông qua các sản phẩm hoa và quà tặng. Tôi hy vọng cuộc hành trình của Pallas Flower sẽ mang nhiều 
                        niềm vui hơn đến nhiều người Việt Nam trong việc thể hiện sự quan tâm, yêu thương hàng ngày.
                    </p>

                    <div class="bor16 p-l-29 p-b-9 m-t-22">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                            Creativity is just connecting things. When you ask creative people how they did something,
                            they feel a little guilty because they didn't really do it, they just saw something. It
                            seemed obvious to them after a while.
                        </p>

                        <span class="stext-111 cl8">
                            - Steve Job’s
                        </span>
                    </div>
                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{ asset('storage/img/about-us1.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('custom-scripts')
@endsection