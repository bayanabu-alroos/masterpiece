@extends('layout.master')

@section('content')

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-0">
        <a href="http://127.0.0.1:8000/" class="nav-item nav-link active">Home</a>
        <a href="http://127.0.0.1:8000/about" class="nav-item nav-link">About</a>
        <a href="http://127.0.0.1:8000/service" class="nav-item nav-link">Services</a>
        {{-- <a href="http://127.0.0.1:8000/rooms" class="nav-item nav-link ">Rooms</a> --}}
        <a href="http://127.0.0.1:8000/blogs" class="nav-item nav-link ">Blogs</a>
        <a href="http://127.0.0.1:8000/contact" class="nav-item nav-link mx-4">Contact</a>

        {{-- <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                    class="fa fa-user-tie me-2"></i></a>
            <div class="dropdown-menu m-0">
                <a href="http://127.0.0.1:8000/register" class="dropdown-item">Sign up</a>
                <hr class="dropdown-divider">
                <a href="http://127.0.0.1:8000/login" class="dropdown-item">Login</a>
            </div>
        </div> --}}
    </div>

    <div class="nav-item dropdown text-info  me-5">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-user-tie me-2"></i>
        </a>
        <div class="dropdown-menu m-0">
    <!-- Authentication Links -->
    @guest
    @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
    @endif

    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
@else
<li class="nav-item dropdown">


    <a class="dropdown-item" href="http://127.0.0.1:8000/home"><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a>
    <a class="dropdown-item" href="http://127.0.0.1:8000/appointment"> Make Appointment</a>

    
    <a class="dropdown-item" href="{{route('processLogout')}}" class="text-body ms-0">
        <i class="fa fa-power-off me-1 ms-1"></i>
        Log Out
    </a>
    
  </li>
@endguest

</div>
</div>
{{-- <a href="http://127.0.0.1:8000/appointment" class="btn btn btn-opacity-75 py-2 px-4 mb-1 ms-3 text-white" style="background-color:#9b4abb ;">Make Appointment</a> --}}

</div>
</div>
</nav>

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
<div class="row py-5">
    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
        <h1 class="display-4 text-white animated zoomIn">Appointment</h1>
        <a href="" class="h5 text-white">Home</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="appointment.html" class="h5 text-white">Appointment</a>
    </div>
</div>
</div>
</div>


<div class="container">
<div class="row">
    <div class="col-xl-8 mx-auto">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h2 class="fw-bold text-primary text-uppercase">Make Appointment</h2>
            <h3 class="mb-0 mt-4">We have the right solutions for your skin, book your appointment</h3>
        </div>
    </div>
</div>
</div>



    <!-- Appointment Start -->
    <div class="container-fluid  bg-appointment mb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 py-5">
                    <div class="py-5">
                        <h1 class="display-5  mb-4">Opening Hours</h1>
                        <div class="d-flex justify-content-between  mb-3">
                            <h6 class=" mb-0">Every Day </h6>
                            <p class="mb-0"> 8:00 AM - 8:00 PM</p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-8 ">
                    <div class="appointment-form bg-primary h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <form action="{{ route('appointment.store') }}"method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                {{-- <div class="col-12 col-sm-4">
                                    <label class="float-start text-light">Select  service</label>
                                    <select id="service" class="form-select bg-light border-0" style="height: 55px;">
                                        <option value=""> Select Service</option>
                                            @foreach($services as $list)
                                                <option value="{{$list ->id}}">{{$list ->name_service }}</option>
                                            @endforeach
                                    </select>
                                </div> --}}
                                {{-- <div class="col-12 col-sm-4">
                                    <label class="float-start text-light">Select  room service</label>
                                    <select id="room" class="form-select bg-light border-0" name="rooms_id" style="height: 55px;">
                                        <option value=""> Select Room</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="col-12 col-sm-4">
                                    <label class="float-start text-light">Select  session service</label>
                                    <select id="session" class="form-select bg-light border-0" name="sessions_id" style="height: 55px;">
                                        <option value=""> Select Session </option>
                                    </select>
                                </div> --}}
                                {{-- <div class="col-12 col-sm-6">
                                    <label class="float-start text-light">Name </label>
                                    <input type="text" type="hidden" class="form-control bg-light border-0" placeholder="Name" name="user_id"value="{{ auth()->user()->id }}" style="height: 55px;">
                                </div> --}}
                                <div class="col-12 col-sm-12">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <label class="float-start text-light">Select date appointment session </label>
                                        <input type="date" class="form-control bg-light border-0 datetimepicker-input" name="date_appointment"
                                            placeholder="Appointment Date"   style="height: 55px;">
                                            @error('date_appointment')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time1" data-target-input="nearest">
                                        <label class="float-start text-light">Select start time session </label>
                                        <input type="time" class="form-control bg-light border-0 datetimepicker-input" name="start_time"
                                            placeholder="Appointment Time" style="height: 55px;">
                                            @error('start_time')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time1" data-target-input="nearest">
                                        <label class="float-start text-light">Select end time Session </label>
                                        <input type="time" class="form-control bg-light border-0 datetimepicker-input" name="end_time"
                                            placeholder="Appointment Time" style="height: 55px;">
                                            @error('end_time')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Make Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->

{{-- <select id="service">
    <option value=""> Select Service</option>
    @foreach($services as $list)
        <option value="{{$list ->id}}">{{$list ->name_service }}</option>
    @endforeach
</select>

<select id="room">
    <option value=""> Select Room</option>
</select>


<select id="session">
    <option value=""> Select Session </option>
</select> --}}


</div>


<script>
    $(document).ready(function() {
    $('#service').on('change', function() {
    var service_id = this.value;
    $("#room").html('');
    $.ajax({
    url:"{{url('get-room')}}",
    type: "POST",
    data: {
    service_id: service_id,
    _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
    $('#room').html('<option value="">Select Room</option>'); 
    $.each(result.rooms,function(key,value){
    $("#room").append('<option value="'+value.id+'">'+value.name_room+'</option>');
    });
    $('#session').html('<option value="">Select Session</option>'); 
    }
    });
    });    
    $('#service').on('change', function() {
    var service_id = this.value;
    $("#session").html('');
    $.ajax({
    url:"{{url('get-session')}}",
    type: "POST",
    data: { 
        service_id: service_id,
    _token: '{{csrf_token()}}' 
    },
    dataType : 'json',
    success: function(result){
    $('#session').html('<option value="">Select Session</option>');
    $('#session').html('<option value="">Select Session</option>');

    $.each(result.sessions,function(key,value){
    $("#session").append('<option value="'+value.id+'">'+value.name_session+'</option>');
    });
    }
    });
    });
    });
    </script>


@endsection