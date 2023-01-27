<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['services'] = Service::orderBy('id','desc')->paginate(5);
            return view('services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
            'name_service' => 'required',
            'detail_service'=> 'required',
            'image'=> 'required',
        ]);
            $service = new Service;
            $service->name_service = $request->name_service;
            $service->detail_service = $request->detail_service;

            if ($image = $request->file('image')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $service['image'] = "$profileImage";
            }else{
                unset($service['image']);
            }
            $service->save();
            return redirect()->route('services.index')
            ->with('success','Service has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['services'] = Service::orderBy('id','desc')->paginate(5);
            return view('service', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {

        $request->validate([
            'name_service' => 'required',
            'detail_service'=> 'required',

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


            $service->update($input);

            return redirect()->route('services.index')
            ->with('success','Service Has Been updated successfully');
            
            

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Service $service)
    // {
    //     $service->delete();
    //     return redirect()->route('services.index')
    //     ->with('success','Company has been deleted successfully');
    // }


    public function destroy($id)
    {
        $service = Service::find($id);
        $service->destroy($id);
        return redirect()->route('services.index')
                ->with('success', ' Services force deleted successfully.');
    }
}
