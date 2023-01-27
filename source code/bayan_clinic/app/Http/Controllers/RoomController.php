<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rooms = DB::table('rooms')
            ->join('users', 'rooms.user_id', '=', 'users.id')
            ->select('rooms.*', 'users.firstname', 'users.lastname', 'users.level')
            ->get();

        return view('rooms_services.index', ['rooms' => $rooms])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::select('select * from users WHERE level="nurse" OR level="doctor"');
        // $services = Service::all();
        return view('rooms_services.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        // $service = Service::findOrFail($request->service_id);

        $request->validate([
            'name_room'=> 'required',
            'status'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $input = $request->all();
        
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
        
        Room::create($input);
        
        return redirect()->route('rooms_services.index')
                        ->with('success','Room Services created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = DB::select('select * from users WHERE level="nurse" OR level="doctor"');
        // $services = Service::all();
        $rooms = Room::find($id);
        return view('rooms_services.edit', [
            'users'=>$users,
            // 'services'=>$services,
            'rooms'=>$rooms,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name_room'=> 'required',
            'status'=> 'required',
            'user_id' => 'required',
            // 'service_id'=> 'required',
            'image' => 'required',

        ]);

        if ($request->image != "") {
            $image = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $image);
        } else {
            $image = $request->hidden_img;
        }

        $room = Room::find($id);
        // $devices->number_rooms_service = $request->number_rooms_service;
        $room->user_id= $request->user_id;
        // $room->service_id= $request->service_id;
        $room->name_room = $request->name_room;
        $room->status = $request->status;

        $room->image = $image;

        $room->save();

        return redirect()->route('rooms_services.index')
            ->with('success', 'Room Services Data update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = Room::find($id);
        $userDestroy->destroy($id);
        return redirect()->route('rooms_services.index')
                ->with('success', ' Room Services force deleted successfully.');
    }
}
