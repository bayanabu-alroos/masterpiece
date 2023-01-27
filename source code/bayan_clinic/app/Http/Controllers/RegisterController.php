<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('register')->with('error', 0);
    }

    public function processRegister(Request $request)
    {
        $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'password'=> 'required|min:8|string|confirmed', 

        ]);

        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = 1; // 1 =user
        $user->remember_token = Str::random(60);
        $user->save();
        if ($user)
        {
            return redirect(route('register'))->with('error','');
        }
    }
}
