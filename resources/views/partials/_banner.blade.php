
	<!-- home -->
	<section class="home">
		<!-- home bg -->
		<div class="owl-carousel home__bg">
			<div class="item home__cover" data-bg="{{ asset('img/home/home__bg.jpg')}}"></div>
			<div class="item home__cover" data-bg="{{ asset('img/home/home__bg2.jpg')}}"></div>
			<div class="item home__cover" data-bg="{{ asset('img/home/home__bg3.jpg')}}"></div>
			<div class="item home__cover" data-bg="{{ asset('img/home/home__bg4.jpg')}}"></div>
		</div>
		<!-- end home bg -->

		<div class="container">
			<div class="row">
				<div class="col-12">

					<button class="home__nav home__nav--prev" type="button">
						<i class="icon ion-ios-arrow-round-back"></i>
					</button>
					<button class="home__nav home__nav--next" type="button">
						<i class="icon ion-ios-arrow-round-forward"></i>
					</button>
				</div>

				<div class="col-12">
					<div class="owl-carousel home__carousel2" >
						
						<div class="item" >
							<!-- card -->
							<div class="card card--big" >
								
									<img src="{{ asset('img/banner/banner1.jpg')}}" alt="" >
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								
								
							</div>
							<!-- end card -->
						</div>

                        <div class="item">
							<!-- card -->
							<div class="card card--big" >
								
									<img src="{{ asset('img/banner/banner2.jpg')}}" alt="" >
									<a href="#" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								
								
							</div>
							<!-- end card -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end home -->

	<!-- content -->
	<section class="content" >
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title" style="text-underline-offset: none;" > فیلم ها و تئاترهای در حال اکران</h2>
						<!-- end content title -->

						<div  style="text-align: right;">
						
    <a class="tag"  href="{{ route('movies.byGenre', 'انیمیشن') }}">انیمیشن</a>
    <a  class="tag"href="{{ route('movies.byGenre', 'کمدی') }}">کمدی</a>
    <a  class="tag" href="{{ route('movies.byGenre', 'خانوادگی') }}">خانوادگی</a>
	<a  class="tag" href="{{ route('movies.byGenre', 'اجتماعی') }}">اجتماعی</a>
	<a  class="tag" href="{{ route('movies.byGenre', 'اکشن') }}">اکشن</a>
	<a  class="tag" href="{{ route('movies.byGenre', 'ترسناک') }}">ترسناک</a>
	<a  class="tag" href="{{ route('movies.byGenre', 'کودک و نوجوان') }}">کودک و نوجوان</a>
</div>

						<!-- content tabs nav -->
						<ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist" style="margin-top: 40pt;">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true" ><i class="fas fa-film" style="margin-left: 5pt;"></i>سینما</a>
							</li>

							<li class="nav-item"style="margin-right:30pt ;">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-theater-masks" style="margin-left: 5pt;"></i>تئاتر</a>
							</li>

							<li class="nav-item" style="margin-right:30pt ;">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-music" style="margin-left: 5pt;"></i>کنسرت</a>
							</li>

							<li class="nav-item" style="margin-right:30pt ;">
								<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-gamepad" style="margin-left: 5pt;"></i>سرگرمی</a>
							</li>
						</ul>
						<!-- end content tabs nav -->

						<!-- content mobile tabs nav -->
						<div class="content__mobile-tabs" id="content__mobile-tabs">
							<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<input type="button" value="New items">
								<span></span>
							</div>

							<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">NEW RELEASES</a></li>

									<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">MOVIES</a></li>

									<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">TV SERIES</a></li>

									<li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">CARTOONS</a></li>
								</ul>
							</div>
						</div>
						<!-- end content mobile tabs nav -->
					</div>
				</div>
			</div>
		</div>


	
						
						
