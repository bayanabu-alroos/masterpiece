@extends('layout.master')

@section('content')
    

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="http://127.0.0.1:8000/" class="nav-item nav-link ">Home</a>
                    <a href="http://127.0.0.1:8000/about" class="nav-item nav-link active">About</a>

                    <a href="http://127.0.0.1:8000/service" class="nav-item nav-link">Services</a>
                    <a href="http://127.0.0.1:8000/rooms" class="nav-item nav-link ">Rooms</a>

                    <a href="http://127.0.0.1:8000/blogs" class="nav-item nav-link ">Blogs</a>

                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu m-0">
                            <a href="http://127.0.0.1:8000/blog" class="dropdown-item">Blog Grid</a>
                            <a href="http://127.0.0.1:8000/detail" class="dropdown-item"> Blog Detail</a>
                        </div>
                    </div> --}}
                    <a href="http://127.0.0.1:8000/contact" class="nav-item nav-link   mx-4">Contact</a>

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
                    <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">About Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-7">
            <div class="section-title position-relative pb-3 mb-5">
                {{-- <h2 class="fw-bold text-primary text-uppercase">About Us</h2> --}}
                <h4 class="mb-0">Prima Care Speciality Clinic Your Neighborhood Family Clinic</h4>
            </div>
            <p class="mb-4">Primacare Speciality Clinic is a highly-reputed multi-speciality medical centre which continues to strengthen the rapidly growing healthcare infrastructure of Amman - Jordan. Uniquely positioned in the heart of Amman & Operational since 2003
                The multi-speciality clinic delivers cost-effective and patient-centred medical care at par with global standards for all age groups, from infants to older adults. The team of healthcare professionals at Primacare relies a great deal on innovation, introspection, and improvement to render tender loving care to patients in a soothing and tranquil atmosphere.
                At Primacare, healthcare services involve prevention, treatment, rehabilitation, and health education for patients, their families, and corporates. A proper staff-patient ratio is always maintained in the clinic to ensure each patient is handled with the utmost care and attention. The multi-speciality medical centre is also affiliated with most of the leading insurance providers in the Amman, assuring smooth and efficient services to all customers.</p>
            <div class="row g-0 mb-5">
                <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                    <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Award Winning</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Staff</h5>
                </div>
                <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                    <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i> Every Day Support</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fair Prices</h5>
                </div>
            </div>
            <div class="d-flex align-items-center mt-5 wow fadeIn" data-wow-delay="0.6s">
                <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fa fa-phone-alt text-white"></i>
                </div>
                <div class="ps-4">
                    <h5 class="mb-2">Call to ask any question</h5>
                    <h4 class="text-primary mb-0">+962 77 9642 516 </h4>
                </div>
            </div>
            <!-- <a href="quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a> -->
        </div>
        <div class="col-lg-5" style="min-height: 500px;">
            <div class="position-relative h-100">
                <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                    src="img/6d5f013bab5c541889ab9cf96977371f.jpg" style="object-fit: cover;">
            </div>
        </div>
    </div>
    </div>
    </div>
<!-- About End -->


<!-- Team Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h2 class="fw-bold text-primary text-uppercase">Team Members</h2>
            <h4 class="mb-0">Professional Stuffs Ready to Help Your Business</h4>
        </div>
        <div class="row g-5">
            @foreach($users as $user)
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img src="/storage/images/{{ $user->avatar }}" class="img-fluid w-100" style="height: 350px">
                        {{-- <img class="img-fluid w-100" src="img/pexels-gustavo-fring-3985353.jpg" alt=""> --}}
                        <div class="team-social">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href='{{ $user->facebook}}' ><i
                                class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href="{{ $user->snapchat}}">
                                <i class="fab fa-snapchat fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href="{{ $user->instagram}}"><i
                                    class="fab fa-instagram fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                    <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
                            </svg></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h4 class="text-primary">{{ $user->firstname}}
                            {{ $user->lastname}}</h4>
                        <p class="text-uppercase m-0">{{ $user->level}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/pexels-los-muertos-crew-8460373.jpg" alt="">
                        <div class="team-social">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                    class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                    class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                    class="fab fa-instagram fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                    class="fab fa-linkedin-in fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h4 class="text-primary">Full Name</h4>
                        <p class="text-uppercase m-0">Designation</p>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/pexels-tima-miroshnichenko-5407215.jpg" alt="">
                        <div class="team-social">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                    class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                    class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                    class="fab fa-instagram fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i
                                    class="fab fa-linkedin-in fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h4 class="text-primary">Full Name</h4>
                        <p class="text-uppercase m-0">Designation</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- Team End -->




    @endsection