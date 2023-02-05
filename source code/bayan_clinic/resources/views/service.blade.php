@extends('layout.master')

@section('content')
    

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="http://127.0.0.1:8000/" class="nav-item nav-link ">Home</a>
                    <a href="http://127.0.0.1:8000/about" class="nav-item nav-link">About</a>
                    <a href="http://127.0.0.1:8000/service" class="nav-item nav-link active">Services</a>
                    <a href="http://127.0.0.1:8000/rooms" class="nav-item nav-link">Rooms</a>

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
                    <h1 class="display-4 text-white animated zoomIn">Services</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">Services</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-primary p-3"
                                placeholder="Type search keyword">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->


        <!--========================= service-section start ========================= -->
    <section id="services" class="service-section pt-150">
        <div class="shape shape-3">
            <img src="assets/img/shapes/shape-3.svg" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto"
                        style="max-width: 600px;">
                        <h2 class="fw-bold text-primary text-uppercase">Our Services</h2>

                        <!-- <h5 class="fw-bold text-uppercase"></h5> -->
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-6 col-md-6 mb-4"  >
                    <div class="service-item mb-30 ">
                        <div class="service-icon  ">
                            <!-- <img loading="lazy" src="img/3.png" alt="features image"> -->
                            <img loading="lazy" src="/images/{{ $service->image  }}" width="80px" height="80px">
                            


                        </div>
                        <div class="service-content">
                            <h4>{{ $service->name_service  }}</h4>
                            <p>{{ $service->detail_service  }}</p>
                            
                        </div>
                        <div class="service-overlay img-bg"></div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!--========================= service-section end ========================= -->


    @endsection 