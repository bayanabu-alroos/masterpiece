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
        $rooms = DB::select('SELECT rooms.*, users.firstname,users.lastname,users.level FROM (rooms INNER JOIN users ON rooms.user_id = users.id) WHERE status = "available"');
        $search = $request->q;
        if($search!=""){
            
            $rooms = Room::where(function ($query) use ($search){
                $query->Where('name_room', 'like', '%'.$search.'%')
                    ->orWhere('user_id', 'like', '%'.$search.'%');

            })
            ->paginate(2);
            $rooms->appends(['q' => $search]);
        }
        else{
            $rooms = DB::select('SELECT rooms.*, users.firstname,users.lastname,users.level FROM (rooms INNER JOIN users ON rooms.user_id = users.id) WHERE status = "available"');
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
      

        return view('show-room',compact('sessions', 'rooms','user'));

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
        $room = Room::findOrFail($request->room_id);	 
        $session = Room::findOrFail($request->session_id);

        $request->validate([
            'date_appointment'=> 'required',
            'start_time'=> 'required|date_format:H:i',
            'end_time' => 'required|after:start_time|date_format:H:i',
        ]);
            $appointment = new Appointment;
            $appointment->user_id = $request->user_id;
            $appointment->room_id = $request->room_id;
            $appointment->session_id = $request->session_id;
            $appointment->date_appointment = $request->date_appointment;
            $appointment->start_time = $request->start_time;
            $appointment->end_time = $request->end_time;

          
            $appointment->save();
            return redirect()->route('home')
            ->with('success','We have received your appointment and would like to thank you for your confidence in us.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    public function show(Room $room){

        // $sessions = Session::all();
        $sessions = Session::select('sessions.*')
            ->join('rooms', 'rooms.id', '=', 'sessions.room_id')
            ->join('services', 'services.id', '=', 'sessions.service_id')
            ->where('rooms.id', $room->id)
            ->get();

        $user = Auth::user();
        return view('show-room',compact('sessions', 'room','user'));
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexs(Request $request)
    {
        $user = Auth::user();

        $appointments =  DB::table('appointment')
            ->join('users', 'appointment.user_id', '=', 'users.id')
            ->join('sessions','appointment.session_id', '=','sessions.id')
            ->join('rooms', 'appointment.room_id' , '=', 'rooms.id')
            ->select('appointment.*','rooms.name_room','sessions.name_session', 'sessions.cost_session')
            ->where('users.id', $user->id)
            ->get();




        return view('appointment', ['appointments' => $appointments ,'user'=>$user])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    

    }

    public function appointment(Request $request)
    {

        $appointments =  DB::table('appointment')
            ->join('users', 'appointment.user_id', '=', 'users.id')
            ->join('sessions','appointment.session_id', '=','sessions.id')
            ->join('rooms', 'appointment.room_id' , '=', 'rooms.id')
            ->select('appointment.*','rooms.name_room','sessions.name_session', 'sessions.cost_session','users.firstname','users.lastname')
            ->get();




        return view('appointments', ['appointments' => $appointments ])
            ->with('i', (request()->input('page', 1) - 1) * 5);

    

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
        $userDestroy = Appointment::find($id);
        $userDestroy->destroy($id);
        return back()->with ('success', ' Make Appointment force deleted successfully.');
    }
}
