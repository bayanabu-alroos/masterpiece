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
        <h4 class="page-title">Users</h4>
        <div class="ms-auto text-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Users
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
    
    

    
  <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col col-md-8"></div>
              
                <div class="col col-md-4">
                  <a href="{{ route('users.create') }}"class="btn btn-success btn-sm float-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                    </svg>&nbsp;&nbsp;Add user </a>
              </div>
              
          </div>
      </div>
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-12">

                  <form action="{{ route('user') }}" method="POST">
                    @csrf    
                        <div class="bg-white shadow" style="padding: 35px;">
                            <div class="row g-2">
                                <div class="col-md-10">
                                    <div class="row g-4">
                                        <div class="col-md-12">
                                          <input type="text" class="form-control" name="q" placeholder="search by user " />
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
      <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-dark table-striped table-hover">
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>First Name </th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Number Phone</th>
                <th>Address</th>
                <th>Role User</th>
                <th scope="col" width="15%" colspan="3">Action</th>
              </tr>
              @foreach($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="/storage/images/{{ $user->avatar }}" width="100px" height="100px"></td>
                    <td>{{ $user->firstname}}</td>
                    <td>{{ $user->lastname}}</td>
                    <td>{{ $user->age}}</td>
                    <td>{{ $user->phone}}</td>
                    <td>{{ $user->address}}</td>
                    <td>{{ $user->level}}</td>

                          
                          <td>
                            <form action="{{ route('users.destroy',$user->id) }}" method="Post">
                              

  

                              <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>
                              </a>
                              
                              <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                              </a>
        
        
                              
        
        
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5  text-dark"  id="exampleModalLabel  ">Delete User </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body text-dark">
                                        Are you sure delete ????
                                      </div>
                                      <div class="modal-footer">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-danger">Yes</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </form>
                              </td>
                            
                          
                          
                          
                      </tr>
  
                  @endforeach

          </table>
          {{-- {!! $uers->links() !!} --}}

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