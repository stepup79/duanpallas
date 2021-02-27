<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Miễn phí vận chuyển với đơn hàng trên 500,000 đồng
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="{{ route('admin.khachhang.create') }}" class="flex-c-m trans-04 p-lr-25">
                        {{ __('pallas.signup') }}
                    </a>

                    <a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25">
                        {{ __('pallas.account') }}
                    </a>

                    <a href="{{ route('app.setLocale', ['locale' => 'en']) }}" class="flex-c-m trans-04 p-lr-25">
                        EN
                    </a>

                    <a href="{{ route('app.setLocale', ['locale' => 'vi']) }}" class="flex-c-m trans-04 p-lr-25">
                        VI
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->		
                <a href="{{ route('frontend.home') }}" class="logo">
                    <img src="{{ asset('storage/img/logo.jpg') }}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="{{ Request::is('/') ? 'active-menu' : '' }}">
                            <a href="{{ route('frontend.home') }}">{{ __('pallas.homepage') }}</a>
                        </li>

                        <li class="{{ Request::is('san-pham') ? 'active-menu' : '' }}">
                            <a href="{{ route('frontend.product') }}">{{ __('pallas.product') }}</a>
                        </li>

                        <li class="{{ Request::is('gio-hang') ? 'active-menu' : '' }}">
                            <a href="{{ route('frontend.cart') }}">{{ __('pallas.cart') }}</a>
                        </li>

                        <li class="{{ Request::is('gioi-thieu') ? 'active-menu' : '' }}">
                            <a href="{{ route('frontend.about') }}">{{ __('pallas.about') }}</a>
                        </li>

                        <li class="{{ Request::is('lien-he') ? 'active-menu' : '' }}">
                            <a href="{{ route('frontend.contact') }}">{{ __('pallas.contact') }}</a>
                        </li>
                    </ul>
                </div>	

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <!-- Hiển thị nút summart cart -->
                    <ngcart-summary class="js-show-cart" template-url="{{ asset('vendor/ngCart/template/ngCart/summary.html') }}"></ngcart-summary>

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>
            </nav>
        </div>	
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header"  ng-controller="timKiemSanPhamController">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{ asset('themes/cozastore/images/icons/icon-close2.png') }}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04"  ng-click="timKiem()">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input type="text" id="keyword_search_by_tensanpham" name="search" placeholder="Nhập tên sản phẩm">
                <h3 class="text-center">Kết quả tìm được</h3>
                <ul>
                    <li ng-repeat="sp in ketquatimduoc">
                        <% sp.sp_ten %> -- <% sp.sp_gia | number %><u>đ</u>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</header>