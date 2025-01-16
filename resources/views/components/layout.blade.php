<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	


	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-reboot.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
	<link rel="stylesheet" href="{{ asset('css/photoswipe.css') }}">
	<link rel="stylesheet" href="{{ asset('css/default-skin.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="{{ asset('icon/favicon-32x32.png') }}" sizes="32x32">
	<link rel="apple-touch-icon" href="{{ asset('icon/favicon-32x32.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('icon/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('icon/apple-touch-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('icon/apple-touch-icon-144x144.png') }}">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>CinemaTicket</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body class="body">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="{{ url('/') }}" class="header__logo">
								<img src="{{ asset('img/logo.svg')}}" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- dropdown -->
								<li class="header__nav-item">
									<a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuHome" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">برنامه ها</a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuHome">
									<li><a href="index.html"><i class="fas fa-film"></i> سینما</a></li><hr>
                                    <li><a href="index2.html"><i class="fas fa-theater-masks"></i> تئاتر</a></li><hr>
                                    <li><a href="index.html"><i class="fas fa-music"></i> کنسرت</a></li><hr>
                                    <li><a href="index2.html"><i class="fas fa-gamepad"></i> سرگرمی </a></li>
									</ul>
								</li>
								<!-- end dropdown -->

								

								<li class="header__nav-item">
									<a href="pricing.html" class="header__nav-link">سالن ها</a>
								</li>

								<li class="header__nav-item">
									<a href="faq.html" class="header__nav-link">اخبار</a>
								</li>

								<!-- dropdown -->
								<li class="dropdown header__nav-item">

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										<li><a href="about.html">About</a></li>
										
									</ul>
								</li>
								<!-- end dropdown -->
							</ul>
							<!-- end header nav -->

							<!-- header auth -->
						
							<div class="header__auth">
							

							<a href="#" id="city-selector-btn">
                              <i class="fas fa-location-pin"></i>
                                  <span id="city-tooltip" class="tooltip-text"></span>
                                   </a>
							 <hr style="margin-left: 10pt;">




							 @if (Auth::check())
    <!-- نمایش دکمه حساب کاربری -->
    <a href="{{ route('users.edit') }}" class="header__sign-in" style="width: 95pt;font-size:10pt" >
        <i class="fas fa-user-circle"></i>
        <span >حساب کاربری</span>
    </a>
	<hr style="margin-left: 10pt;margin-right: 10pt">
    <!-- نمایش دکمه خروج -->
    <a  href="{{ route('logout') }}" style="width: 100pt;font-size:10pt"  class="header__sign-in" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
        <span>خروج از سامانه</span>
    </a>
	
	<hr style="margin-left: 10pt;margin-right: 10pt">
    
            <a class="header__sign-in" style="width: 90pt;font-size:10pt;color:white"  href="{{ route('user.purchases') }}"><i class="fas fa-shopping-cart" style=" color: white;"></i>خرید های من 	</a>
		

   
  


    <!-- فرم خروج -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <!-- نمایش دکمه ورود -->
    <a href="/login?redirect_to=/" class="header__sign-in">
        <i class="fas fa-user"></i>
        <span>ورود به سامانه</span>
    </a>
@endif



							</div>

                             <!-- کادر انتخاب شهر -->
                             <div id="city-modal" class="modal">
                             <div class="modal-content">
                            <button id="close-modal" class="close-modal">
                            <i class="fas fa-times"></i>

                            </button>
							<br>
							<br>
							<h4>استان خود را انتخاب کنید</h4>

								<!-- header search -->
								<form action="#" class="header__search">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__search-content">
                    <!-- آیکون جستجو -->
                    <i class="fas fa-search fa-2x" ></i>
                    <!-- فیلد ورودی -->
                    <input type="text" id="search-city" placeholder="جستجو در نام استان">
                </div>
            </div>
        </div>
    </div>
</form>


		                     <!-- end header search -->
							
                             
                               <ul class="city-list">
                        @foreach($cities as $city)
                        <li class="city-item">
                          <button class="city-option" data-city-id="{{ $city->id }}">
                        <img src="{{ asset($city->image) }}" alt="{{ $city->name }}" class="city-image">
                         <span class="city-name">{{ $city->name }}</span>
                          </button>
                       </li>
                       @endforeach
                         </ul>
                                 </div>
                              </div>
                               
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</header>
	<!-- end header -->
	
	
    
      {{$slot}}
	
	<!-- partners -->
	<section class="section">
		<div class="container">
			
				
				<!-- end partner -->
			</div>
		</div>
	</section>
	<!-- end partners -->

	<!-- footer -->
	<footer class="footer" style="direction:ltr">
		<div class="container">
			<div class="row">
				<!-- footer list -->
				<div class="col-12 col-md-3">
					<h6 class="footer__title">اپلیکیشن مارا دانلود کنید</h6>
					<ul class="footer__app">
						<li><a href="#"><img src="{{ asset('img/Download_on_the_App_Store_Badge.svg')}}" alt=""></a></li>
						<li><a href="#"><img src="{{ asset('img/google-play-badge.png')}}" alt=""></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				

				

				<!-- footer list -->
				<div class="col-12 col-sm-4 col-md-3">
					<h6 class="footer__title">پشتیبانی</h6>
					<ul class="footer__list">
						<li><a href="tel:+18002345678">021-92005006 (ساعات 24-9)</a></li>
						<li><a href="mailto:support@moviego.com">sinfo@cinematic.com</a></li>
					</ul>
					<ul class="footer__social">
						<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
						<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
						<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
						<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						<small><a target="_blank" href="https://www.templateshub.net"></a></small>

						<ul>
							<li><a href="#">تمامی حقوق این وب سایت برای ایران‌تیک محفوظ می‌باشد</a></li>
						</ul>
					</div>
				</div>
				<!-- end footer copyright -->
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	@push('scripts')
	<script src="{{ asset('js/city-modal.js') }}"></script>     
	<script src="{{ asset('js/date-modal.js') }}"></script>       
	<script src="{{ asset('js/reserve-modal.js') }}"></script>                  
	<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
	<script src="{{ asset('js/jquery.mCustomScrollbar.min.js') }}"></script>
	<script src="{{ asset('js/wNumb.js') }}"></script>
	<script src="{{ asset('js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/plyr.min.js') }}"></script>
	<script src="{{ asset('js/jquery.morelines.min.js') }}"></script>
	<script src="{{ asset('js/photoswipe.min.js') }}"></script>
	<script src="{{ asset('js/photoswipe-ui-default.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
	@endpush
	@stack('scripts')
</body>

</html>