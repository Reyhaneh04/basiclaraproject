<x-layout>
    <!-- page title -->
<section class="section section--first section--bg" data-bg="{{ asset('img/section/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title" > لیست خریدها</h2>
						<!-- end section title -->
	<!-- breadcrumb -->
    <ul class="breadcrumb" style="direction:ltr">
							<li class="breadcrumb__item"><a href="{{ route('home') }}">صفحه اصلی</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">لیست خریدها</li>
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
				

			
            @if($purchases->isEmpty())
        <p>شما تاکنون خریدی انجام نداده‌اید.</p>
    @else
				<!-- price -->
                @foreach ($purchases as $purchase)
				<div class="col-12 col-md-6 col-lg-4" >
					<div class="price price--premium">
						<div class="price__item price__item--first" ><span>کد رهگیری: </span><span> {{  $purchase->id }}</span></div>
						<div class="price__item"><span >فیلم: </span><span>{{ $purchase->showtime->movie->title ?? 'ناموجود' }} </span></div>
						<div class="price__item"><span >سینما: </span><span>{{ $purchase->showtime->cinema->name ?? 'ناموجود' }} </span></div>
						<div class="price__item"><span >تاریخ سانس: </span><span>{{ \Morilog\Jalali\Jalalian::fromDateTime($purchase->showtime->date)->format('Y/m/d') }} </span></div>
						<div class="price__item"><span >صندلی ها:  </span><span>{{ implode(', ', $purchase->seat_numbers ?? []) }}</span></div>
                        <div class="price__item"><span >شماره سالن:</span><span> {{ $purchase->showtime->hall?? 'ناموجود' }} </span></div>
					</div>
				</div>
                @endforeach

        </ul>
    @endif
				<!-- end price -->

			
			</div>
		</div>
	</div>
	<!-- end pricing -->
   
</x-layout>
