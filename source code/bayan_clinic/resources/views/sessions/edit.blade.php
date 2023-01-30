@extends('layout.masterdash')

@section('content')
@if(\Illuminate\Support\Facades\Auth::user()->level == 'admin')
@elseif(\Illuminate\Support\Facades\Auth::user()->level == 'reception')
@elseif(\Illuminate\Support\Facades\Auth::user()->level == 'doctor')


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
   
                <div class="card-body">
                    You are a Admin User.
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Edit Sessions  </h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Sessions
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


        
<div class="container-fluid ">

    <div class="row">

        <div class="col-md-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Edit Sessions </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    @endif
                    
                    {{-- @if(session('error') === '')
                    <div class="alert alert-success">
                        Your personal information has been updated
                    </div>
                    @endif --}}
                    
                    <form class="row g-3 "action="{{ route('sessions.update',$session->id) }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        <!-- Form Row-->
                        <div class="row gx-3 ">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6  mb-2">
                                <label class="small mb-1" for="inputFirstName">Select Name Service</label>
                                
                                <select name="service_id" class="form-control text-black">
                                    @foreach ($services as $service)
                                        <option class="text-black" value="{{$service->id}}">{{$service->name_service}}</option>
                                    @endforeach
                                </select>
                            </div>
                                  

                            <!-- Form Group (last name)-->
                            <div class="col-md-6 mb-2">
                               

                            </div>
                            
                        </div>
                        <!-- Form Row        -->

                        <div class="row gx-3 ">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6  mb-2">
                                <label class="small mb-1" for="inputFirstName">Select Name Service</label>
                                
                                <select name="room_id" class="form-control text-black">
                                    @foreach ($rooms as $room)
                                        <option class="text-black" value="{{$room->id}}">{{$room->name_room}}</option>
                                    @endforeach
                                </select>
                            </div>
                                  
  
                            <!-- Form Group (last name)-->
                            <div class="col-md-6 mb-2">
                               
  
                            </div>
                            
                        </div>

                        <div class="row gx-3 ">
                            <!-- Form Group (organization name)-->


                            <div class="col-md-6 mb-2">

                                <label class="small mb-1" for="inputPhone"> Name Session</label>
                                <input class="form-control" name="name_session"  value="{{ $session->name_session}}" type="text" placeholder="Enter Name Session " >
                                

                            </div>


                            <div class="col-md-6 mb-2">
                                
                            </div>
                            <!-- Form Group (location)-->
                            
                        </div>

                        
                        <div class="row gx-3 ">
                          <!-- Form Group (organization name)-->


                          <div class="col-md-6 mb-2">

                            <label class="small mb-1" for="inputLocation">Cost Session</label>
                            <input class="form-control" name="cost_session"  value="{{ $session->cost_session}}" type="text" placeholder="Enter Cost Session" >
                              

                          </div>


                          <div class="col-md-6 mb-2">
                              
                            
                          </div>
                          <!-- Form Group (location)-->
                          
                      </div>

                        <div class="row gx-3  mb-3">
                          <!-- Form Group (organization name)-->
                          <div class="col-md-6 mb-2">

                            <label class="small mb-1" for="inputLocation">Detail Session</label>
                          <input class="form-control" name="detail_session" value="{{ $session->detail_session}}"  type="text" placeholder="Enter Detail Session" >
                            

                        </div>


                        <div class="col-md-6 mb-2">

                          

                          
                          
                      </div>
                    </div>

                    <div class="row gx-3  mb-3">
                      <!-- Form Group (organization name)-->
                      <div class="col-md-6 mb-2">

                        {{-- <label class="small mb-1" for="inputLocation">Session Duration</label>
                      <input class="form-control" name="session_duration"  type="time" placeholder="Enter Session Duration" > --}}
                        

                    </div>


                    <div class="col-md-6 mb-2">
                        
                    </div>
                </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="submit">Save </button>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                            
                        </div>


                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@else
<div class="main-wrapper">
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Login box.scss -->
  <!-- ============================================================== -->
  <div class="error-box">
    <div class="error-body text-center">
      <h1 class="error-title text-danger">403</h1>
      <h3 class="text-uppercase error-subtitle">PAGE NOT FOUND !</h3>
      <p class="text-muted mt-4 mb-4">
        YOU SEEM TO BE TRYING TO FIND HIS WAY HOME
      </p>
      {{-- <a
        href="index.html"
        class="
          btn btn-danger btn-rounded
          waves-effect waves-light
          mb-5
          text-white
        "
        >Back to home</a
      > --}}
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Login box.scss -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Page wrapper scss in scafholding.scss -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Page wrapper scss in scafholding.scss -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Right Sidebar -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Right Sidebar -->
  <!-- ============================================================== -->
</div>

@endif
    
@endsection