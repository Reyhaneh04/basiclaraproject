<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    
    
    public function showLoginForm()
    {
        return view('users.login'); 
    }

    public function isLoggedIn(Request $request)
{
    return response()->json(['loggedIn' => Auth::check()]);
}


public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ], [
        'username.required' => 'نام کاربری الزامی است.',
        'password.required' => 'رمز عبور الزامی است.',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        

        $redirectUrl = $request->input('redirect', '/'); 

        return redirect()->to($redirectUrl)->with('success', 'خوش آمدید، ' . Auth::user()->username . '!');
    }

    return back()->withErrors([
        'username' => '  ',
    ]);
}



   


    


public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/'); 
}

}
