@props(['movie'])

				<!-- card -->
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
    <div class="card">
        <div class="card__cover">
            <img src="{{ asset('img/posters/'. $movie->poster) }}" alt="" height="230pt" >

            <a href="{{ route('movie.show', $movie->id) }}" class="card__play" style="height: 50pt;width:80pt;text-align:center;margin-right:80pt;margin-left:-40pt;margin-bottom:50pt;font-size:15pt">
                خرید بلیت
            </a>
        </div>
        <div class="card__content">
            <h3 class="card__title">
                <!-- لینک به صفحه جزئیات فیلم -->
                <a href="{{ route('movie.show', $movie->id) }}">{{ $movie->title }}</a>
            </h3>
            <span class="card__category">
                <a href="#" style="direction: rtl;"> {{ $movie->duration }}</a>
                <a href="#">{{ $movie->genre }}</a>
            </span>
            <span class="card__rate">
                <i class="icon ion-ios-star"></i>{{ $movie->rate }}
            </span>
        </div>
    </div>
</div>
				<!-- end card -->
					
			
				

	<!-- end expected premiere -->
