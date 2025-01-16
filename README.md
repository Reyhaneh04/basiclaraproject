<x-layout :cities="$cities">

@if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

@include('partials._banner')




<!-- catalog -->
<div class="catalog">
		<div class="container">
			<div class="row">
@foreach($movies as $movie)  
        <x-listing-card :movie="$movie" />
         
        @endforeach
    

        </section>

</x-layout>
