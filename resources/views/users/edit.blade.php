<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
   

</head>
<body class="body">

	<div class="sign section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">

					<!-- registration form -->

    <form action="{{ route('users.update') }}" method="POST" class="sign__form" style="direction:rtl;">
        @csrf
        @method('PUT') 
        <a href="{{ route('home') }}" class="sign__logo">
        <img src="{{ asset('img/logo.svg') }}" alt="" style="width: 150pt;height:50pt;">
    </a>
        <div class="sign__group-wrapper">
        <div class="sign__group">
        <input type="text" class="sign__input" name="username" 
               value="{{ old('username', $user->username) }}" placeholder="نام کاربری">
        @error('username')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="sign__group">
        <input type="text" class="sign__input" name="email" 
               value="{{ old('email', $user->email) }}" placeholder="ایمیل">
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="sign__group">
        <input type="text" class="sign__input" name="name" 
               value="{{ old('name', $user->name) }}" placeholder="نام">
        @error('name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="sign__group">
        <input type="text" class="sign__input" name="last_name" 
               value="{{ old('last_name', $user->last_name) }}" placeholder="نام خانوادگی">
        @error('last_name')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="sign__group">
        <input type="text" class="sign__input" name="phone" 
               value="{{ old('phone', $user->phone) }}" placeholder="شماره تلفن همراه">
        @error('phone')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="sign__group">
        <input type="password" class="sign__input" name="password" placeholder="رمز عبور (در صورت تغییر)">
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
        </div>
        
        <div class="sign__buttons">
            <button class="sign__btn" type="submit">اعمال تغییرات</button>
            </form>

    <form action="{{ route('users.destroy') }}" method="POST" >
    @csrf
    @method('DELETE') 
    <button type="submit" class="sign__btn" style="background-color: red;">حذف حساب</button>
</form>
    </div>

    

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
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
</body>

</html>