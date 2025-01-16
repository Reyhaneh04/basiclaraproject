<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',], [
                'username.required' => 'نام کاربری الزامی است.',
                'username.unique' => 'این نام کاربری قبلاً ثبت شده است.', 
                'email.required' => 'ایمیل الزامی است.',
                'email.email' => 'فرمت ایمیل معتبر نیست.',
                'email.unique' => 'این ایمیل قبلاً ثبت شده است.',
                'password.required' => 'رمز عبور الزامی است.',
                'password.confirmed' => 'رمز عبور و تایید آن یکسان نیستند.',
                'password.min' => 'رمز عبور باید حداقل ۸ کاراکتر باشد.',
        ]);

        $user = new User();
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']); 
        $user->save();

        Auth::login($user);

        $redirectUrl = $request->input('redirect', '/');
        return redirect()->to($redirectUrl)->with('success', 'ثبت‌نام و ورود شما با موفقیت انجام شد!');
        
    }
}

