<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Service,Room,Session,Appointment,User}; // import model 




class Website extends Controller
{
    public function index(Request $request){

        $users = User::all();
        $sessions = Session::all();
        $rooms = Room::all();

        $data['services'] = Service::get(["name_service","id"]);
        return view('appointment',$data,compact('users','rooms','sessions'));

    }

    public function getRoom(Request $request){
        $data['rooms'] = Room::where("service_id",$request->service_id)->Where('status','=','available')
        ->get(["name_room","id","service_id"]);
        
        return response()->json($data);

    }

    public function getSession(Request $request){
        $data['sessions'] = Session::where("service_id",$request->service_id)
        ->get(["name_session","cost_session","id"]);
        
        return response()->json($data);
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
        $session = Session::findOrFail($request->sessions_id);
        $room = Room::findOrFail($request->rooms_id);

        $request->validate([
            'date_appointment'=> 'required',
            'start_time'=> 'required|H:i',
            'end_time' => 'required|H:i|after:start_time',
        ]);
        
        $input = $request->all();
        
        Appointment::create($input);
        
        return redirect()->route('home')
                    ->with('success', 'We have received your appointment and would like to thank you for your confidence in us.');
        


    }
}
