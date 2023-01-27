<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\{Service,Room,Session,Appointment,User}; // import model 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Throwable;



class RoomlistingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = DB::select('SELECT rooms.*, users.firstname,users.lastname,users.level,services.name_service FROM ((rooms INNER JOIN users ON     rooms.user_id = users.id) INNER JOIN services ON rooms.service_id = services.id) WHERE status = "available"');
        $search = $request->q;
        if($search!=""){
            
            $rooms = Room::where(function ($query) use ($search){
                $query->Where('name_room', 'like', '%'.$search.'%')
                ->orWhere('service_id', 'like', '%'.$search.'%')
                ->orWhere('user_id', 'like', '%'.$search.'%');

            })
            ->paginate(2);
            $rooms->appends(['q' => $search]);
        }
        else{
            $rooms = DB::select('SELECT rooms.*, users.firstname,users.lastname,users.level, services.name_service FROM ((rooms INNER JOIN users ON rooms.user_id = users.id) INNER JOIN services ON rooms.service_id = services.id) WHERE status = "available"');
        }

            return view('rooms', ['rooms' => $rooms
         ]);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = DB::select('SELECT rooms.*, users.firstname,users.lastname,users.level,services.name_service FROM ((rooms INNER JOIN users ON  rooms.user_id = users.id) INNER JOIN services ON rooms.service_id = services.id) WHERE status = "available"');
        $sessions = DB::select('SELECT sessions.*,services.name_service FROM (sessions  INNER JOIN services ON sessions.service_id = services.id) WHERE service_id = service_id ');
        return view('appointment.create',['rooms' => $rooms, 'sessions'=>$sessions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room =  Room::findOrFail($request->rooms_id);
        $session =  Session::findOrFail($request->sessions_id);
        $user = Auth::user($request->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $rooms)
    {
        return view('appointment.create',compact('rooms','sessions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
