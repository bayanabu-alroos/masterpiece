@extends('layout.master')

@section('content')
    

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="http://127.0.0.1:8000/" class="nav-item nav-link ">Home</a>
                    <a href="http://127.0.0.1:8000/about" class="nav-item nav-link">About</a>
                    <a href="http://127.0.0.1:8000/service" class="nav-item nav-link">Services</a>
                    <a href="http://127.0.0.1:8000/rooms" class="nav-item nav-link ">Rooms</a>

                    <a href="http://127.0.0.1:8000/blogs" class="nav-item nav-link active">Blogs</a>
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

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
<div class="row py-5">
    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
        <h1 class="display-4 text-white animated zoomIn">Blogs</h1>
        <a href="" class="h5 text-white">Home</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="" class="h5 text-white">Blogs</a>
    </div>
</div>
</div>
</div>
<!-- Navbar End -->

<div class="container-fluid  wow fadeInUp" data-wow-delay="0.1s">
    <div class="container ">
    <div class="section-title text-center position-relative pb-3 mx-auto" >
        <h2 class="fw-bold text-uppercase" style="color:#3593c9 ;">Latest Blog</h2>
        <h4 class="mb-0">Read The Latest Articles from Our Blog Post</h4>
    </div>
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


<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container py-5">
<div class="row g-5">
    <!-- Blog list Start -->
    <div class="row g-5">
        @foreach($blogs as $blog)
        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
            <div class="blog-item bg-light rounded overflow-hidden">
                <div class="blog-img position-relative overflow-hidden">
                    <img class="img-fluid" src="/images/{{ $blog->image }}" style="height:330px ;width:100%">
                    {{-- <img class="img-fluid" src="img/5e0abb940bfc2a07b50719a6df47c190.jpg" alt=""
                        style="height:330px ;width:100%"> --}}
                    <a class="position-absolute top-0 start-0  text-white rounded-end mt-5 py-2 px-4"
                        href="" style="background-color:rgb(74, 0, 74) ;">Beauty</a>
                </div>
                
                <div class="p-4" style="height: 180px">
                    <div class="d-flex mb-3">
                        <small class="me-3"><i class="far fa-user me-2 text-primary"></i>{{ $blog->article }}</small>
                        <small><i class="far fa-calendar-alt me-2 text-primary"></i>{{ $blog->created_at }}</small>
                    </div>
                    <h4 class="mb-3">{{ $blog->title }}</h4>
                    <a class="text-uppercase" href="{{ route('blog_detail',$blog->id) }}">Read More <i class="bi bi-arrow-right"></i></a>
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

<!-- Blog End -->

@endsection 
