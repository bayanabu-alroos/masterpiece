@extends('layout.masterdash')

@section('content')

<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
        <h4 class="page-title">Dashboard</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Dashboard
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
  <div class="container-fluid">


        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
          <!-- Column -->
          <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
              <div class="box bg-cyan text-center">
                <h1 class="font-light text-white">
                  <i class="me-2 mdi mdi-account-multiple"></i
                    >{{\DB::table('users')->where('users.level', '=' ,'patient')->count()}}</h1>
                <h6 class="text-white">Number Patient</h6>
              </div>
            </div>
          </div>
          <!-- Column -->
          <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
              <div class="box bg-success text-center">
                <h1 class="font-light text-white">
                  <i class="me-2 mdi mdi-account-multiple"></i
                    >
                  {{\DB::table('users')->where('users.level', '=' ,'nurse')->count()}}
                </h1>
                <h6 class="text-white">Number Nurse</h6>
              </div>
            </div>
          </div>
          <!-- Column -->
          <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
              <div class="box bg-warning text-center">
                <h1 class="font-light text-white">
                  <i class="me-2 mdi mdi-account-multiple"></i
                    >
                  {{\DB::table('users')->where('users.level', '=' ,'doctor')->count()}}
                </h1>
                <h6 class="text-white">Number Doctor</h6>
              </div>
            </div>
          </div>
          <!-- Column -->
          <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
              <div class="box bg-danger text-center">
                <h1 class="font-light text-white">
                  <i class="fas fa-couch"></i>
                  {{\DB::table('rooms')->count()}}
                </h1>
                <h6 class="text-white">Number Rooms</h6>
              </div>
            </div>
          </div>
          <!-- Column -->
          <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
              <div class="box bg-info text-center">
                <h1 class="font-light text-white">
                  <i class="fab fa-servicestack"></i
                    >{{\DB::table('services')->count()}}
                </h1>
                <h6 class="text-white">Number Services</h6>
              </div>
            </div>
          </div>
          <!-- Column -->
          <!-- Column -->
          <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
              <div class="box bg-danger text-center">
                <h1 class="font-light text-white">
                  <i class="me-2 mdi mdi-bio"></i
                    >{{\DB::table('sessions')->count()}}
                </h1>
                <h6 class="text-white">Number Sessions</h6>
              </div>
            </div>
          </div>


          
        </div>
    
    @if(\Illuminate\Support\Facades\Auth::user()->level == 'admin'  || 'reception'||'doctor')

  <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col col-md-8"><h3><b>Contact</b></h3></div>
                <div class="col col-md-4">
              </div>
              
          </div>
      </div>
      <div class="card-body">

          <table class="table table-striped table-bordered table-dark table-striped table-hover">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subject</th>
                <th >Message</th>
            </tr>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
            </tr>
            
            @endforeach
        
        </table>
        {!! $contacts ->links() !!}
    </div>
</div>
@endif


</div>

@endsection