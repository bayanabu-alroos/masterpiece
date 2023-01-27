@extends('layout.master')

@section('content')

<div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto py-0">
        <a href="http://127.0.0.1:8000/" class="nav-item nav-link active">Home</a>
        <a href="http://127.0.0.1:8000/about" class="nav-item nav-link">About</a>
        <a href="http://127.0.0.1:8000/service" class="nav-item nav-link">Services</a>
        <a href="http://127.0.0.1:8000/blogs" class="nav-item nav-link">Blogs</a>

        {{-- <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
            <div class="dropdown-menu m-0">
                <a href="http://127.0.0.1:8000/blogs" class="dropdown-item">Blog Grid</a>
                <a href="http://127.0.0.1:8000/detail" class="dropdown-item"> Blog Detail</a>
            </div>
        </div> --}}
        <a href="http://127.0.0.1:8000/contact" class="nav-item nav-link mx-4">Contact</a>
    </div>
    <div class="nav-item dropdown  me-5">
        <a href="#" class="nav-link dropdown-toggle text-info" data-bs-toggle="dropdown">
            <i class="fa fa-user-tie me-2"></i>
        </a>
        <div class="dropdown-menu m-0">
    <!-- Authentication Links -->
    @guest
    @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('login') }}">{{ __('Login') }}</a>
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
                        <h1 class="display-4 text-white animated zoomIn">Reset Password</h1>
                        <a href="" class="h5 text-white">Home</a>
                        <i class="far fa-circle text-white px-2"></i>
                        <a href="" class="h5 text-white">Reset Password</a>
                    </div>
                </div>
            </div>
        </div>
<div class="container  mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
