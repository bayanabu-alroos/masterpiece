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
          <h4 class="page-title">Create Blog</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Edit User
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
                    <img src="/storage/images/{{ $user->avatar }}" width="100px" height="100px">
                      {{-- <img class="img-account-profile rounded-circle mb-2"  width="85%" src="@if(!empty(auth()->user()->avatar)){{asset('storage/images/'.auth()->user()->avatar)}}@else https://www.bootdey.com/img/Content/avatar/avatar8.png @endif"alt=""> --}}
                  {{-- </div>
              </div>
          </div>  --}}
          <div class="col-md-8">
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

                    <form class="row g-3" action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                        
                        <div class="row gx-3 mb-3">
                          <!-- Form Group (first name)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputFirstName">First name</label>
                              <input class="form-control" id="inputFirstName" name="firstname" type="text" value="{{ $user->firstname}}" placeholder="Enter  first name" >
                          </div>
                          <!-- Form Group (last name)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputLastName">Last name</label>
                              <input class="form-control" id="inputLastName" name="lastname" value="{{ $user->lastname}}" type="text" placeholder="Enter last name" >

                          </div>
                      </div>
                      <!-- Form Row        -->
                      <div class="row gx-3 mb-3">
                          <!-- Form Group (organization name)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputOrgName">Age</label>
                              <input class="form-control" id="inputOrgName" type="text" name="age" value="{{ $user->age}}" placeholder="Enter  age" >

                          </div>
                          <!-- Form Group (location)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputLocation">Skin Allergy	</label>
                              <input class="form-control" id="inputLocation" type="text" name="skin_allergy" value="{{ $user->skin_allergy}}" placeholder="Enter skin allergy" >

                          </div>
                      </div>

                      <!-- Form Row        -->
                      <div class="row gx-3 mb-3">
                          <!-- Form Group (organization name)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputOrgName">Phone number</label>
                              <input class="form-control" id="inputOrgName" type="tel" name="phone" value="{{ $user->phone}}" placeholder="Enter number phone">

                          </div>
                          <!-- Form Group (location)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputLocation">Address	</label>
                              <input class="form-control" name="address" id="inputLocation" type="text" value="{{ $user->address}}" placeholder="Enter  address" >

                          </div>
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                          <!-- Form Group (phone number)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputPhone"> Email Address</label>
                              <input class="form-control" id="inputPhone" name="email" type="email" value="{{ $user->email}}" placeholder="Enter email address " >

                          </div>
                          <!-- Form Group (birthday)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputBirthday">Upload Image</label>
                              <input class="form-control" id="inputBirthday" type="file" name="avatar" placeholder="Enter  Photo">

                          </div>
                      </div>

                      <div class="row gx-3 mb-3">
                          <!-- Form Group (phone number)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputPhone"> Password</label>
                              <input class="form-control" id="inputPhone" name="password" type="password" placeholder="Enter Password" >

                          </div>
                          <!-- Form Group (birthday)-->
                          <div class="col-md-6">
                              <label class="small mb-1" for="inputPhone">Role user</label>
                              <input class="form-control" list="datalistOptions" id="exampleDataList" name="level" placeholder="Select role ....">
                              <datalist id="datalistOptions">
                                  <option value="admin"></option>
                                  <option value="doctor"></option>
                                  <option value="reception"></option>
                                  <option value="nurse"></option>
                                  <option value="patient"></option>
                              </datalist>
                              {{-- <input class="form-control" id="inputPhone" name="email" type="password" placeholder="Enter Confirm Password" > --}}

                          </div>
                      </div>

                      <div class="row gx-3 mb-3">
                          <div class="col-md-6">
                              <!-- Save changes button-->
                              <button class="btn btn-primary" type="submit">Save Change </button>
                          </div>
                          <div class="col-md-6">
                              
                          </div>
                         
                      </div>
                    </form>

                </div>

  
              </div>
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