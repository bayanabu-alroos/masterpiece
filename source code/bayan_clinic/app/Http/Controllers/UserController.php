<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::select('SELECT * FROM users WHERE level ="reception"  or level ="nurse" or level ="patient"or level ="doctor"');
        $search = $request->q;
        if($search!=""){
            $users = User::where(function ($query) use ($search){
                $query->where('firstname', 'like', '%'.$search.'%')
                    ->orWhere('lastname', 'like', '%'.$search.'%')
                    ->orWhere('address', 'like', '%'.$search.'%')
                    ->orWhere('level', 'like', '%'.$search.'%');
                    
            })
            ->paginate(2);
            $users->appends(['q' => $search]);
        }
        else{
            $users = DB::select('SELECT * FROM users WHERE level ="reception"  or level ="nurse" or level ="patient"or level ="doctor"');
        }

        // return view('users.index', compact('users'));

        return view('users.index', ['users'=>$users])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'age'=> 'required',
            'skin_allergy' => 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'email'=> 'required',
            'password'=> 'required|min:8', 
            'role' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = new User;
        $input->firstname = $request->firstname;
        $input->lastname = $request->lastname;
        $input->age = $request->age;
        $input->skin_allergy = $request->skin_allergy;
        $input->phone = $request->phone;
        $input->address = $request->address;
        $input->email = $request->email;
        $input->password = Hash::make($request->password);
        $input->level = $request->role;
        $input->remember_token = Str::random(60);
   
        // $input = $request->all();
        
        if ($avatar = $request->file('avatar')) {
            $destinationPath = 'storage/images/';
            $profileImage = date('YmdHis') . "." . $avatar->getClientOriginalExtension();
            $avatar->move($destinationPath, $profileImage);
            $input['avatar'] = "$profileImage";
        }else{
            unset($input['avatar']);
        }
        
        
        // User::create($input);
        $input->save();
        
        return redirect()->route('users.index')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'age'=> 'required',
            'skin_allergy' => 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'email'=> 'required',
            'password'=> 'required', 
            'level' => 'required',
            'avatar'

        ]);

        if ($request->avatar != "") {
            $avatar = time() . '.' . request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('storage/images/'), $avatar);
        } else {
            $avatar = $request->hidden_img;
        }

        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname= $request->lastname;
        $user->age = $request->age;
        $user->skin_allergy = $request->skin_allergy;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->avatar = $avatar;

        $user->save();

        return redirect()->route('users.index')
                ->with('success','User Has Been updated successfully');
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
     
        return redirect()->route('users.index')
                        ->with('success','User has been deleted successfully');
    }
     
}
