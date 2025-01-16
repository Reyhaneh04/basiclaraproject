<?php

use App\Models\Showtime;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



Route::get('/all-cities', [CityController::class, 'getAllCities']);

Route::get('/search-cities', [CityController::class, 'searchCities']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/card', [MovieController::class, 'index']);

Route::get('/cinemas-for-city/{cityId}', [CinemaController::class, 'getCinemasForCity']);

Route::get('/cinema-showtimes/{cinemaId}', [ShowtimeController::class, 'getShowtimesForCinema']);

Route::get('/cinema-showtimes/{cinemaId}', [ShowtimeController::class, 'getShowtimes']);

Route::get('/search-cinemas', [CinemaController::class, 'searchCinemas']);

Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');

Route::get('/', function () {return view('listing.index');})->name('home');

Route::get('/register', function () { return view('users.register');})->name('register.view');

Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('/users/edit', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/delete', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/is-logged-in', [LoginController::class, 'isLoggedIn']);

Route::get('/booking', [BookingController::class, 'show'])->name('booking.show');

Route::get('/get-showtime-price/{id}', function ($id) {
    try {
        $showtime = App\Models\Showtime::find($id);

        if ($showtime) {
            return response()->json([
                'price' => $showtime->price
            ]);
        }

        return response()->json(['price' => 0], 404);
    } catch (\Exception $e) {
        \Log::error('Error fetching showtime price:', ['error' => $e->getMessage()]);
        return response()->json(['error' => 'Something went wrong'], 500);
    }
});

Route::get('/get-seats-status/{showtimeId}', [BookingController::class, 'getSeatsStatus']);

Route::get('/receipt/{id}', [BookingController::class, 'showReceipt'])->name('receipt');

Route::post('/reserve-seats', [BookingController::class, 'reserveSeats']);

Route::get('/movies/genre/{genre}', [MovieController::class, 'moviesByGenre'])->name('movies.byGenre');

Route::get('/purchases', [UserController::class, 'userpurchases'])->name('user.purchases');











