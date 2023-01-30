@extends('layout.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="http://127.0.0.1:8000/" class="nav-item nav-link ">Home</a>
                    <a href="http://127.0.0.1:8000/about" class="nav-item nav-link">About</a>
                    <a href="http://127.0.0.1:8000/service" class="nav-item nav-link">Services</a>
                    <a href="http://127.0.0.1:8000/rooms" class="nav-item nav-link active">Rooms</a>
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
        <div class="container-fluid bg-primary py-5 bg-header">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Rooms</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Rooms</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


        <!-- Booking Start -->
        <div class="container-fluid booking  wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
    
           <form action="{{ route('room') }}" > 
            @csrf    
                <div class="bg-white shadow" style="padding: 35px;">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-4">

                         
                                <div class="col-md-12">

                                  
                                    <input type="text" class="form-control" name="q" placeholder="search by rooms " />
                                    
                                    {{-- <select  name="q" class="form-control">
                                        <option  >Select a Service</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name_service }}</option>
                                        @endforeach
                                    </select> --}}
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
    
                    </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                    <div class="row g-5">
                        @foreach ($rooms as $room)
                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="/images/{{ $room->image}}" style="height:300px ;width:100%">
                                    {{-- <img class="img-fluid" src="img/5e0abb940bfc2a07b50719a6df47c190.jpg" alt=""
                                        style="height:330px ;width:100%"> --}}
                                </div>
                                
                                <div class="p-4" style="height: 200px">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user me-2 text-primary"></i>  {{ $room->firstname }}  {{ $room->lastname }}</small>
                                        <small class="me-3"><i class="far fa-user me-2 text-primary"></i>  {{ $room->level }}  </small>

                                    </div>
                                    {{-- <p class="mb-2">{{ $room->name_service}}</p> --}}

                                    <p class="mb-2">{{ $room->name_room }}</p>

                                    {{-- <a class="text-uppercase" href="">Read More <i class="bi bi-arrow-right"></i></a> --}}
                                    <a href="{{ route('show_room', $room->id) }}" class="btn  btn-opacity-75 mt-2 me-3 animated slideInLeft text-white" style="background-color:#9b4abb ;">Make Appointment</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection 