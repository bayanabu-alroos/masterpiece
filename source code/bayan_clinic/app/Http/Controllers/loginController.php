<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){

        

        // cek if user has logged

        if (Auth::check())
        {
            return redirect(route('dashboard'));
        }
        return view('login')->with('error', 0);
    
    }


    public function processLogin(Request $request)
    {

        $input = $request->all();
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email','password')))
        {
            return redirect('/');
        }
        return redirect(route('login'))->with('error',1);
    }


    public function processLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
