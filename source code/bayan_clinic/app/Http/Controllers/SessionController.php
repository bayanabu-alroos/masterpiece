<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Service;
use App\Models\Room;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = DB::table('sessions')
        ->join('services', 'sessions.service_id', '=', 'services.id')
        ->join('rooms', 'sessions.room_id', '=', 'rooms.id')

        ->select('sessions.*', 'services.name_service','rooms.name_room')
        ->get();
    
        return view('sessions.index', ['sessions' => $sessions])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $rooms = DB::select('select * from rooms WHERE status="available"');
        return view('sessions.create',compact('services', 'rooms'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = Service::findOrFail($request->service_id);
        $room = Room::findOrFail($request->room_id);

        $request->validate([
            'name_session'=> 'required',
            'cost_session'=> 'required',
            'detail_session'=> 'required',
        ]);
        
        $input = $request->all();
        
    
        
        Session::create($input);
        
        return redirect()->route('sessions.index')
                        ->with('success','Session Services created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    
    {

        $services = Service::all();
        $rooms = DB::select('select * from rooms WHERE status="available"');
        $session = Session::find($id);
        return view('sessions.edit', [
            'services'=>$services,
            'session'=>$session,
            'rooms'=>$rooms,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_session'=> 'required',
            'cost_session'=> 'required',
            'detail_session'=> 'required',
            'service_id'=> 'required',
            'room_id'=> 'required',
        ]);



 


        $session = Session::find($id);
        $session->name_session = $request->name_session;
        $session->service_id = $request->service_id;
        $session->room_id = $request->room_id;
        $session->cost_session = $request->cost_session;
        $session->detail_session = $request->detail_session;


        $session->save();

        return redirect()->route('sessions.index')
                        ->with('success', 'Session  Services Data update successfully');

        // return redirect('sessions.index')->with('success', 'Session  Services Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDestroy = Session::find($id);
        $userDestroy->destroy($id);
     
        return redirect()->route('sessions.index')
                        ->with('success','Session Services force deleted successfully.');
    }
}
