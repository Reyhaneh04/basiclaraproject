<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); 
        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user(); 
    
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:15',
            'password' => 'nullable|string|min:8'], [
                'username.required' => 'نام کاربری الزامی است.',
                'email.required' => 'ایمیل الزامی است.',
                'email.email' => 'فرمت ایمیل صحیح نیست.',
                'name.required' => 'نام الزامی است.',
                'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
        ]);
    
    
        $user->update([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password, 
        ]);
    
        return redirect()->route('home')->with('success', 'اطلاعات شما با موفقیت بروزرسانی شد.');
    }

    public function destroy()
    {
        $user = Auth::user(); 

        $user->delete();

        Auth::logout();
        return redirect()->route('home')->with('success', 'حساب کاربری شما با موفقیت حذف شد.');
    }


    public function userPurchases()
    {
        $userId = auth()->id();
        $purchases = Reservation::with('showtime.movie', 'showtime.cinema')
            ->where('user_id', $userId)
            ->get()
            ->map(function ($reservation) {
                $seatNumbers = $reservation->seat_numbers;
                if (is_string($seatNumbers)) {
                    $seatNumbers = json_decode($seatNumbers, true);
                }
                $reservation->seat_numbers = $seatNumbers; 
                return $reservation;
            });
    
        return view('listing.purchases', compact('purchases'));
    }
    
}


