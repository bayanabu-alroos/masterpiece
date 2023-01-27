<?php

namespace App\Http\Controllers;
use App\Models\{Service,Room,Session,Appointment,User}; // import model 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AppointmentController extends Controller
{
    public function index(Request $request){

        // $users = User::all();
        // $sessions = Session::all();
        // $rooms = Room::all();

        // $data['services'] = Service::get(["name_service","id"]);
        // return view('appointment',$data,compact('users','rooms','sessions'));
        return view('appointment');


    }

    // public function getRoom(Request $request){
    //     $data['rooms'] = Room::where("service_id",$request->service_id)->Where('status','=','available')
    //     ->get(["name_room","id","service_id"]);
        
    //     return response()->json($data);

    // }

    // public function getSession(Request $request){
    //     $data['sessions'] = Session::where("service_id",$request->service_id)
    //     ->get(["name_session","cost_session","id"]);
        
    //     return response()->json($data);
    // }


    public function create()
    {
        return view('appointment');
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
            'date_appointment'=> 'required',
            'start_time'=> 'required|date_format:H:i',
            'end_time' => 'required|after:start_time|date_format:H:i',
        ]);
            $appointment = new Appointment;
            $appointment->date_appointment = $request->date_appointment;
            $appointment->start_time = $request->start_time;
            $appointment->end_time = $request->end_time;

          
            $appointment->save();
            return redirect()->route('home')
            ->with('success','We have received your appointment and would like to thank you for your confidence in us.');
    }
    
    // public function create(Request $request) {
    //     return view('contact');
    //   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {
    //     $users = User::all();
    //     $sessions = Session::all();
    //     $rooms = Room::all();

    //     $data['services'] = Service::get(["name_service","id"]);
    //     return view('appointment',$data,compact('users','rooms','sessions'));

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function store(Request $request)
    // {
    //     $user = User::findOrFail($request->user_id);
    //     $session = Session::findOrFail($request->sessions_id);
    //     $room = Room::findOrFail($request->rooms_id);

    //     $request->validate([
    //         'date_appointment'=> 'required',
    //         'start_time'=> 'required|H:i',
    //         'end_time' => 'required|H:i|after:start_time',
    //     ]);
        
    //     $input = $request->all();
        
    //     Appointment::create($input);
        
    //     return redirect()->route('home')
    //                 ->with('success', 'We have received your appointment and would like to thank you for your confidence in us.');
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
