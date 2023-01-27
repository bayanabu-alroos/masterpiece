{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layout.masterdash')

@section('content')

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
              <h4 class="page-title">Edit Devices Servies</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Edit Devices Servies
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>


        
<div class="container-fluid ">

    <div class="row">
        <div class="col-md-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Image Device</div>
                <div class="card-body text-center">

                    <img class="img-account-profile rounded-circle mb-2"  width="85%" src="/images/{{ $rooms->image  }}">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
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

                    
                    <form  action="{{ route('rooms_services.update',$rooms->id) }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        <!-- Form Row-->
                        <div class="row gx-3 ">
                            <!-- Form Group (first name)-->
                            <div class="col-md-8  mb-2">
                                <label class="small mb-1" for="inputFirstName">Select First Name Nurse</label>
                                
                                <select name="user_id" class="form-control">
                                    
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->firstname}}</option>
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
                            {{-- <div class="col-md-8  mb-2">
                                <label class="small mb-1" for="inputFirstName">Select Name Service</label>
                                
                                <select name="service_id" class="form-control">
                                    @foreach ($services as $service)
                                        <option value="{{$service->id}}">{{$service->name_service}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <!-- Form Group (last name)-->
                            <div class="col-md-6 mb-2">
                              
  
                            </div>
                            
                        </div>


                        <div class="row gx-3 ">
                          <!-- Form Group (first name)-->


                          <div class="col-md-8 mb-2">
                            <label class="small mb-1" for="inputFirstName">Select Status</label>
                                
                              <select name="status" class="form-control">
                                  
                                      <option value="available">Available</option>
                                      <option value="unavailable">Unavailable</option>
                                  
                              </select>

                        </div>
                        
                          <div class="col-md-6  mb-2">
                            {{-- <label class="small mb-1" for="inputFirstName">Select Status </label>
                                
                            <select name="user_id" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->level}}</option>
                                @endforeach
                            </select> --}}
                          </div>
                          <!-- Form Group (last name)-->
                         
                      </div>
                      <div class="row gx-3 ">
                      <div class="col-md-8 mb-2">
                        <label class="small mb-1" for="inputFirstName">Name Room Service</label>
                            
                          <input class="form-control" id="inputBirthday" type="text" value="{{ $rooms->name_room}}" name="name_room" placeholder="Enter Name Room Service">

                    </div>
                    
                      <div class="col-md-4  mb-2">
                        {{-- <label class="small mb-1" for="inputFirstName">Select Status </label>
                            
                        <select name="user_id" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->level}}</option>
                            @endforeach
                        </select> --}}
                      </div>
                      <!-- Form Group (last name)-->
                     
                  </div>

                        <div class="row gx-3 ">
                            <!-- Form Group (organization name)-->


                            <div class="col-md-8 mb-3">
                              <label class="small mb-1" for="inputBirthday">Upload Image</label>
                              <input class="form-control" id="inputBirthday" type="file" name="image" placeholder="Upload Image">
                                {{-- <label class="small mb-1" for="inputLocation">Number Rooms Service</label>
                                <input class="form-control" name="number_rooms_service"  type="text" placeholder="Enter Number Rooms Service" > --}}

                            </div>


                            <div class="col-md-4 mb-2">
                                
                              
                            </div>
                            <!-- Form Group (location)-->
                            
                        </div>


                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

        
    
@endsection