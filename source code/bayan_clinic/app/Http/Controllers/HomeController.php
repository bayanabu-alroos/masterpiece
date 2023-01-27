<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DB;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', array('user' => Auth::user()) );
    }


    public function show()
    {
        $users = DB::select('SELECT * FROM users WHERE level ="reception"  or level ="nurse" or  level ="doctor"');
        // $users = User::latest()->paginate(5);
        return view('about', ['users'=>$users])
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /////////////update profile 

    public function update(Request $request){
    	// Handle the user upload of avatar


        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'skin_allergy' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'age' => 'required',
            'email' => 'required',
            

        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('avatar')) {
            $destinationPath = 'storage/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['avatar'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        $user = Auth::user();

        $user->update($input);

        // return view('profile', array('user' => Auth::user()) );

        if ($user)
        {
            return view('home', array('user' => Auth::user()) )->with('error','');
            
        }



    }


    
}
