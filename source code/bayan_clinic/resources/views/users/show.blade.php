@extends('layout.masterdash')

@section('content')


@if(\Illuminate\Support\Facades\Auth::user()->level == 'admin')
@elseif(\Illuminate\Support\Facades\Auth::user()->level == 'reception')
@elseif(\Illuminate\Support\Facades\Auth::user()->level == 'doctor')


<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">View User</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  View User 
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid ">



        <div class="row">

          <div class="col-md-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
    
                    <img class="img-account-profile rounded-circle mb-2"  width="85%" src="/storage/images/{{ $user->avatar }}"alt="">
                </div>
            </div>
        </div>
            {{-- <div class="col-md-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <img src="/storage/images/{{ $user->avatar }}" width="100px" height="100px"> --}}

                        {{-- <img class="img-account-profile rounded-circle mb-2"  width="85%" src="@if(!empty(auth()->user()->avatar)){{asset('storage/images/'.auth()->user()->avatar)}}@else https://www.bootdey.com/img/Content/avatar/avatar8.png @endif"alt=""> --}}
                    {{-- </div>
                </div>
            </div> --}}
            <div class="col-md-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <h5 > First Name :   {{ $user->firstname }} </h5>
                        <h5 class="pt-2"> Last Name :   {{ $user->lastname }} </h5>
                        <h5 class="pt-2"> Skin Allergy :   {{ $user->skin_allergy }} </h5>
                        <h5 class="pt-2"> Number Phone :   {{ $user->phone }} </h5>
                        <h5 class="pt-2"> Address :   {{ $user->address	 }} </h5>
                        <h5 class="pt-2"> Age :   {{ $user->age	 }} </h5>
                        <h5 class="pt-2"> Email Address :   {{ $user->email	 }} </h5>
                        <h5 class="pt-2"> Role User :   {{$user->level	 }} </h5>
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