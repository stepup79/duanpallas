<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						{{ __('pallas.agency') }}
					</h4>
					<ul>
						<h4 class="stext-103 cl7">{{ __('pallas.area') }} Cần Thơ</h4>
						<li class="p-b-10">
							<p class="stext-107 cl7 hov-cl1 trans-04">
								<b>Store Cần Thơ : </b>130 Xô Viết Nghệ Tỉnh, Phường An Hội, Quận Ninh Kiều, TP Cần Thơ
							</p>
						</li>
					</ul>
					<ul>
						<h4 class="stext-103 cl7">{{ __('pallas.area') }} Hồ Chí Minh</h4>
						<li class="p-b-10">
							<p class="stext-107 cl7 hov-cl1 trans-04">
								<b>Store Hồ Chí Minh : </b>118 Lê Thị Hồng Gấm, P. Nguyễn Thái Bình, Quận 1, TP.HCM
							</p>
						</li>
					</ul>
					<p class="stext-107 cl7 hov-cl1 trans-04"><b>Hotline : </b>(0292)3-665-012 # 0939-860-197</p>
					<p class="stext-107 cl7 hov-cl1 trans-04"><b>Email : </b>info@pallasflower.vn</p>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						{{ __('pallas.question') }}
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="{{ route('frontend.about') }}" class="stext-107 cl7 hov-cl1 trans-04">
								Về Pallas
							</a>
						</li>
						<li class="p-b-10">
							<a href="{{ route('frontend.policy') }}" class="stext-107 cl7 hov-cl1 trans-04">
								Chính sách giao hàng / đổi trả
							</a>
						</li>
						<li class="p-b-10">
							<a href="{{ route('frontend.tutorial') }}" class="stext-107 cl7 hov-cl1 trans-04">
								Hướng dẫn đặt hoa & thanh toán
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						{{ __('pallas.contact') }}
					</h4>

					<p class="stext-107 cl7 size-201">
						Bạn còn câu hỏi nào khác? Hãy đến với chúng tôi tại 130 Xô Viết Nghệ Tỉnh, 
						Phường An Hội, Quận Ninh Kiều, TP Cần Thơ hoặc gọi cho chúng tôi (0292)3.665.012 # 0939.860.197.
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						{{ __('pallas.news') }}
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
							{{ __('pallas.signup') }}
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/cozastore/images/icons/icon-pay-01.png') }}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/cozastore/images/icons/icon-pay-02.png') }}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/cozastore/images/icons/icon-pay-03.png') }}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/cozastore/images/icons/icon-pay-04.png') }}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ asset('themes/cozastore/images/icons/icon-pay-05.png') }}" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="{{ route('frontend.home') }}" target="_blank">Home Pallas</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>