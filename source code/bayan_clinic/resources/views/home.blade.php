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
              <h4 class="page-title">User Profile </h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        User Profile
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
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">

                    <img class="img-account-profile rounded-circle mb-2"  width="85%" src="@if(!empty(auth()->user()->avatar)){{asset('storage/images/'.auth()->user()->avatar)}}@else https://www.bootdey.com/img/Content/avatar/avatar8.png @endif"alt="">
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
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}                        </div>
                    @endif
                    {{-- @if(session('error') === '')
                    <div class="alert alert-success">
                        Your personal information has been updated
                    </div>
                    @endif --}}
                    
                    <form  method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" name="firstname" type="text" placeholder="Enter your first name" value="{{ auth()->user()->firstname }}">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" name="lastname" type="text" placeholder="Enter your last name" value="{{ auth()->user()->lastname }}">

                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Age</label>
                                <input class="form-control" id="inputOrgName" type="text" name="age" placeholder="Enter your age" value="{{ auth()->user()->age }}">

                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Chronic Diseases	</label>
                                <input class="form-control" id="inputLocation" type="text" name="skin_allergy" placeholder="Enter Chronic Diseases	" value="{{ auth()->user()->skin_allergy}}">

                            </div>
                        </div>

                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Phone number</label>
                                <input class="form-control" id="inputOrgName" type="tel" name="phone" placeholder="Enter your number phone" value="{{ auth()->user()->phone }}">

                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Address	</label>
                                <input class="form-control" name="address" id="inputLocation" type="text" placeholder="Enter your address" value="{{ auth()->user()->address}}">

                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"> Email Address</label>
                                <input class="form-control" id="inputPhone" name="email" type="email" placeholder="Enter your phone number" value="{{ auth()->user()->email}}">

                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Upload Image</label>
                                <input class="form-control" id="inputBirthday" type="file" name="avatar" placeholder="Enter your Photo"  >

                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"> Link Linkedin </label>
                                <input class="form-control" id="inputPhone" name="linkedin" type="text" placeholder="Enter your Link Linkedin" value="{{ auth()->user()->linkedin}}">

                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Link snapchat</label>
                                <input class="form-control" id="inputBirthday" type="text" name="snapchat" placeholder="Enter your Link snapchat" value="{{ auth()->user()->snapchat}}">

                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"> Link Instagram  </label>
                                <input class="form-control" id="inputPhone" name="instagram" type="text" placeholder="Enter your Link Instagram" value="{{ auth()->user()->instagram}}">

                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Link Tiktok</label>
                                <input class="form-control" id="inputBirthday" type="text" name="tiktok" placeholder="Enter your Link Tiktok"value="{{ auth()->user()->tiktok}}">

                            </div>
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