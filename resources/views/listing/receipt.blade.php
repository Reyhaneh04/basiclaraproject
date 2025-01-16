<x-layout >

<!-- page title -->
<section class="section section--first section--bg" data-bg="{{ asset('img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title" >رسید خرید</h2>
						<!-- end section title -->
	<!-- breadcrumb -->
    <ul class="breadcrumb" style="direction:ltr">
							<li class="breadcrumb__item"><a href="{{ route('home') }}">صفحه اصلی</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">رسید</li>
						</ul>
						<!-- end breadcrumb -->
					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- pricing -->
	<div class="section">
		<div class="container">
			<div class="row">
				

			

				<!-- price -->
				<div class="col-12 col-md-6 col-lg-4" >
					<div class="price price--premium" style="width: 500pt;margin-right:60%">
						<div class="price__item price__item--first" style="margin-right:43%"><span>رسید خرید</span></div>
						<div class="price__item"><span class="price__item--first">کد رهگیری:</span><span> {{ $reservation->id }}</span></div>
						<div class="price__item"><span class="price__item--first">فیلم: </span><span> {{ $reservation->showtime->movie->title ?? 'عنوان موجود نیست' }}</span></div>
						<div class="price__item"><span class="price__item--first">سینما: </span><span> {{ $reservation->showtime->cinema->name ?? 'سینما موجود نیست' }}</span></div>
						<div class="price__item"><span class="price__item--first">تاریخ و زمان سانس: </span><span>{{ $showtimeDate }} </span></div>
						<div class="price__item"><span class="price__item--first">صندلی ها:  </span><span>{{ implode(', ', $seatNumbers) }}</span></div>
                        <div class="price__item"><span class="price__item--first">شماره سالن:</span><span>  {{$reservation->showtime->hall}}</span></div>
						<a href="#" class="price__btn">برای پیگیری رزرو، کد رهگیری را یادداشت کنید.</a>
					</div>
				</div>
				<!-- end price -->

			
			</div>
		</div>
	</div>
	<!-- end pricing -->

	


</x-layout>