<x-layout :cities="$cities" >


	<!-- page title -->
	<section class="section section--first section--bg" data-bg="{{ asset('img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">{{ $movie->title }}</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb" style="direction:ltr">
							<li class="breadcrumb__item"><a href="{{ route('home') }}">صفحه اصلی</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">{{ $movie->title }}</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- filter -->
	<div class="filter" >
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="filter__content">
						<div class="filter__items">
							<!-- filter item -->
							<div class="filter__item" id="filter__genre" >
							<span class="filter__item-label" style="  display: inline-block;">مدت زمان:</span>

								<div style="  display: inline-block;direction: ltr;" class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" >
									<input style="  direction: rtl;" type="button" value="{{ $movie->duration }}" style="  display: inline-block;" >
									
								</div>

								
							</div>
							<!-- end filter item -->

								<!-- filter item -->
								<div class="filter__item" id="filter__genre" >
							<span class="filter__item-label" style="  display: inline-block;">ژانر:</span>

								<div style="  display: inline-block;direction: ltr;" class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" >
									<input type="button" value="{{ $movie->genre }}" style="  display: inline-block;" >
									
								</div>

								
							</div>
							<!-- end filter item -->
								<!-- filter item -->
								<div class="filter__item" id="filter__genre" >
							<span class="filter__item-label" style="  display: inline-block;">سال ساخت:</span>

								<div style="  display: inline-block;direction: ltr;" class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" >
									<input type="button" value="{{ $movie->release_date }}" style="  display: inline-block;" >
									
								</div>

								
							</div>
							<!-- end filter item -->
								<!-- filter item -->
								<div class="filter__item" id="filter__genre" >
							<span class="filter__item-label" style="  display: inline-block;">امتیاز:</span>
							<span class="card__rate" style="margin-left: -10pt;"><i class="icon ion-ios-star"></i></span>
								<div style="  display: inline-block;direction: ltr;" class="filter__item-btn dropdown-toggle" role="navigation" id="filter-genre" >
								 <input type="button" value="{{ $movie->rate }}" style="  display: inline-block;" >
								 
								</div>

								
							</div>
							<!-- end filter item -->

						
							
						</div>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end filter -->

	<!-- details -->
	<section class="section details" style="margin-top: -35pt;">
		<!-- details background -->
		<div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				

				<!-- content -->
				<div class="col-10">
					<div class="card card--details card--series">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
								<div class="card__cover">
									<img src="{{ asset('img/posters/'. $movie->poster) }}" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-9" >
								<div class="card__content"style="margin-right:100pt;margin-top:20pt">
									

									<!-- title -->
				<div class="col-12">
					<h1 class="details__title"> اکران سینما {{ $movie->title }} </h1>
				</div>
				<!-- end title -->

									<div class="card__description card__description--details">
									{{ $movie->description }}
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				
				<div class="date-box2" >
					<!--تاریخ-->
				<div id="date-selection-container" >
            </div>
				</div>


<div class="date-box3" >
				
                <div class="header__search-content" style="width: 85%;margin-right: 77pt;margin-top:20pt;">
                    <!-- آیکون جستجو -->
                    <i class="fas fa-search fa-2x" ></i>
                    <!-- فیلد ورودی -->
					<input type="text" id="cinema-search" placeholder="جستجو نام سینما" >
					<button id="search-btn" style="margin-right: 87%;margin-top:-2pt">جستجو</button>
                </div>
				<label for="cinema-select" style="color: white;text-align:right;margin-top:30pt;margin-left:63%;font-size:15pt;">آریاشهر دو نفر در سینماهای زیر قابل خرید است.</label>
            </div>


		



<script>
function searchCinemas() {
    const searchTerm = document.getElementById('cinema-search').value.trim(); 

    if (searchTerm.length > 0) { 
        fetch(`/search-cinemas?search=${searchTerm}`)
            .then(response => response.json())
            .then(data => {
                const cinemaAccordion = document.getElementById('cinema-accordion');
                cinemaAccordion.innerHTML = ''; 

                if (data.length > 0) {
                    data.forEach((cinema, index) => {
                        const accordionCard = document.createElement("div");
                        accordionCard.classList.add("accordion__card");
                        accordionCard.innerHTML = `
                            <div class="card-header" id="heading${index}">
                                <button id="cinema-btn-${cinema.id}" type="button" data-cinema-id="${cinema.id}" data-toggle="collapse" data-target="#collapse${index}" aria-expanded="false" aria-controls="collapse${index}" style="display: flex; align-items: center; justify-content: flex-start; text-align: right;">
                                    <img src="/img/cinema/${cinema.image}" alt="${cinema.name}" style="width: 120px; height: 120px; margin-right: 10px; border-radius: 10px;">
                                    <div style="text-align:right; margin-right:20pt;margin-top:5pt;">
                                        <span style="margin-bottom:-10pt;"><strong>${cinema.name}</strong></span><br>
                                        <span class="card__rate"> <i class="icon ion-ios-star"></i> ${cinema.rate}</span>
                                        <span style="color:rgba(255,255,255,0.5);"><i class="fas fa-location-pin"></i> ${cinema.address}</span><br>
                                    </div>
                                </button>
                            </div>
                            <div id="collapse${index}" class="collapse" aria-labelledby="heading${index}" data-parent="#accordion">
                                <div class="card-body">
                                    <div id="cinema-showtimes-container-${cinema.id}" class="showtimes-container"></div>
                                </div>
                            </div>
                        `;
                        cinemaAccordion.appendChild(accordionCard);

                        const button = document.getElementById(`cinema-btn-${cinema.id}`);
                        button.addEventListener("click", () => {
                            const selectedDate = localStorage.getItem("selectedDate") || new Date().toISOString().split('T')[0]; 
                            const movieId = getMovieIdFromUrl(); 
                            loadShowtimesForCinema(cinema.id, selectedDate, movieId); 
                        });
                    });
                } else {
                    cinemaAccordion.innerHTML = "<p style='color:white'>هیچ سینمایی یافت نشد.</p>";
                }
            })
            .catch(error => {
                console.error('خطا در جستجو:', error);
            });

        document.getElementById('cinema-search').value = ''; 
    } else {
        loadCinemasForCity(1);  
    }
}

document.getElementById('search-btn').addEventListener('click', searchCinemas); 

document.getElementById('cinema-search').removeEventListener('input', searchCinemas); 

document.addEventListener('DOMContentLoaded', () => {
    loadCinemasForCity(1); 
});

function getMovieIdFromUrl() {
    const pathSegments = window.location.pathname.split('/');
    return pathSegments[pathSegments.length - 1]; 
}

function loadShowtimesForCinema(cinemaId, selectedDate, selectedMovieId) {
    fetch(`/cinema-showtimes/${cinemaId}?date=${selectedDate}`)
        .then((response) => response.json())
        .then((data) => {
            const container = document.getElementById(`cinema-showtimes-container-${cinemaId}`);
            container.innerHTML = '';

            if (data.length > 0) {
                const gridContainer = document.createElement("div");
                gridContainer.classList.add("grid-container");

                let hasShowtimesForMovie = false;  

                data.forEach((showtime) => {
                    if (showtime.movie_id === parseInt(selectedMovieId)) {
                        const gridItem = document.createElement("div");
                        gridItem.classList.add("grid-item");
                        gridItem.innerHTML = `
                            <div class="showtime-card">
                                <p style="color:white;"><strong></strong> ${showtime.time}</p>
                                <p><strong></strong> ${showtime.price} تومان</p>
                                <p><strong></strong> ${showtime.hall}</p>
                                <button class="btn-show" data-showtime-id="${showtime.id}">
                                    انتخاب
                                </button>
                            </div>
                        `;
                        gridContainer.appendChild(gridItem);
                        hasShowtimesForMovie = true;  
                    }
                });

                if (!hasShowtimesForMovie) {
                    container.innerHTML = "<p style='color:white'>هیچ سانسی برای این فیلم در تاریخ انتخابی موجود نیست.</p>";
                } else {
                    container.appendChild(gridContainer);
                }

            } else {
                container.innerHTML = "<p style='color:white'>هیچ سانسی برای این سینما در تاریخ انتخابی موجود نیست.</p>";
            }
        })
        .catch((error) => {
            console.error('خطا در بارگذاری سانس‌ها:', error);
            const container = document.getElementById(`cinema-showtimes-container-${cinemaId}`);
            container.innerHTML = "<p style='color:white'>خطا در بارگذاری سانس‌ها. لطفاً دوباره تلاش کنید.</p>";
        });
}



</script>

<div class="col-12 col-xl-6" style="margin-right:2pt;">
    <div class="accordion" id="accordion" style="width: 835pt;text-align:right;">
        <div id="cinema-accordion">
            <!-- سینماها از اینجا بارگذاری می‌شوند -->
        </div>
    </div>
</div>




	</section>
	<!-- end content -->


	</x-layout>

