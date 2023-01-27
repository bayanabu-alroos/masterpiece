@extends('layout.master')

@section('content')
    

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="http://127.0.0.1:8000/" class="nav-item nav-link ">Home</a>
                    <a href="http://127.0.0.1:8000/about" class="nav-item nav-link">About</a>
                    <a href="http://127.0.0.1:8000/service" class="nav-item nav-link">Services</a>
                    <a href="http://127.0.0.1:8000/rooms" class="nav-item nav-link ">Rooms</a>
                    <a href="http://127.0.0.1:8000/blogs" class="nav-item nav-link  active">Blogs</a>
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
        <h1 class="display-4 text-white animated zoomIn mb-3">{{ $blog->title }}</h1>
        <a href="" class="h5 text-white">Home</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="" class="h5 text-white">Blogs</a>
        <i class="far fa-circle text-white px-2"></i>
        <a href="" class="h5 text-white ">Blog Detail</a>


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


<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container py-5">
<div class="row g-5">
    <div class="col-lg-8">
        <!-- Blog Detail Start -->
        <div class="mb-5">
            <img class="img-fluid" src="/images/{{ $blog->image }}" >

            {{-- <img class="img-fluid w-100 rounded mb-5" src="img/blog-1.jpg" alt=""> --}}
            {{-- <h1 class="mb-4"></h1> --}}

            <div class="d-flex mb-3 mt-5">
                <small class="me-3"><i class="far fa-user me-2 text-primary"></i>{{ $blog->article }}</small>
                <small><i class="far fa-calendar-alt me-2 text-primary"></i>{{ $blog->created_at }}</small>
            </div>
            <p>{{ $blog->detail }}</p>

            
        </div>
        <!-- Blog Detail End -->

        <!-- Comment List Start -->
        {{-- <div class="mb-5">
            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                <h3 class="mb-0">3 Comments</h3>
            </div>
            <div class="d-flex mb-4">
                <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                <div class="ps-3">
                    <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                    <button class="btn btn-sm btn-light">Reply</button>
                </div>
            </div>
            <div class="d-flex mb-4">
                <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                <div class="ps-3">
                    <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                    <button class="btn btn-sm btn-light">Reply</button>
                </div>
            </div>
            <div class="d-flex ms-5 mb-4">
                <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                <div class="ps-3">
                    <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                    <button class="btn btn-sm btn-light">Reply</button>
                </div>
            </div>
        </div> --}}
        <!-- Comment List End -->

        <!-- Comment Form Start -->
        {{-- <div class="bg-light rounded p-5">
            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                <h3 class="mb-0">Leave A Comment</h3>
            </div>
            <form>
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control bg-white border-0" placeholder="Your Name"
                            style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="email" class="form-control bg-white border-0" placeholder="Your Email"
                            style="height: 55px;">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control bg-white border-0" placeholder="Website"
                            style="height: 55px;">
                    </div>
                    <div class="col-12">
                        <textarea class="form-control bg-white border-0" rows="5"
                            placeholder="Comment"></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Comment Form End -->
    </div> --}}

    <!-- Sidebar Start -->
    <div class="col-lg-4">


        <!-- Recent Post Start -->
        {{-- <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                <h3 class="mb-0">Recent Post</h3>
            </div>
            @foreach($blogs as $blog)
            <div class="d-flex rounded overflow-hidden mb-3">
                <img class="img-fluid" src="/images/{{ $blog->image }}" style="width: 100px; height: 100px; object-fit: cover;" alt=""> --}}
                {{-- <img class="img-fluid" src="img/blog-1.jpg"
                    > --}}
                {{-- <a href="{{ route('blog_detail',$blog->id) }}" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">{{ $blog->title }}</a>
            </div>
            @endforeach --}}
            {{-- <div class="d-flex rounded overflow-hidden mb-3">
                <img class="img-fluid" src="img/blog-2.jpg"
                    style="width: 100px; height: 100px; object-fit: cover;" alt="">
                <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                    dolor sit amet adipis elit
                </a>
            </div>
            <div class="d-flex rounded overflow-hidden mb-3">
                <img class="img-fluid" src="img/blog-3.jpg"
                    style="width: 100px; height: 100px; object-fit: cover;" alt="">
                <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                    dolor sit amet adipis elit
                </a>
            </div>
            <div class="d-flex rounded overflow-hidden mb-3">
                <img class="img-fluid" src="img/blog-1.jpg"
                    style="width: 100px; height: 100px; object-fit: cover;" alt="">
                <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                    dolor sit amet adipis elit
                </a>
            </div>
            <div class="d-flex rounded overflow-hidden mb-3">
                <img class="img-fluid" src="img/blog-2.jpg"
                    style="width: 100px; height: 100px; object-fit: cover;" alt="">
                <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                    dolor sit amet adipis elit
                </a>
            </div>
            <div class="d-flex rounded overflow-hidden mb-3">
                <img class="img-fluid" src="img/blog-3.jpg"
                    style="width: 100px; height: 100px; object-fit: cover;" alt="">
                <a href="" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                    dolor sit amet adipis elit
                </a>
            </div> --}}
        </div>
        <!-- Recent Post End -->

        <!-- Image Start -->
        <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
            <img src="img/blog-1.jpg" alt="" class="img-fluid rounded">
        </div>
        <!-- Image End -->


    </div>
    <!-- Sidebar End -->
</div>
</div>
</div>
<!-- Blog End -->








@endsection 