@extends('layout.masterdash')

@section('content')
@if(\Illuminate\Support\Facades\Auth::user()->level == 'admin')
@elseif(\Illuminate\Support\Facades\Auth::user()->level == 'doctor')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">View Blog</h4>
          <div class="ms-auto text-end">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  View Blog
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
                    <div class="card-header">Blog Image</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="/images/{{ $blog->image }}" width="100px" height="100px">

                        {{-- <img class="img-account-profile rounded-circle mb-2"  width="85%" src="@if(!empty(auth()->user()->avatar)){{asset('storage/images/'.auth()->user()->avatar)}}@else https://www.bootdey.com/img/Content/avatar/avatar8.png @endif"alt=""> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header"> Details  Blog</div>
                    <div class="card-body">
                        <h5 > Blog Title :   {{ $blog->title }} </h5>
                        <h5 class="pt-2"> Article Blog :   {{ $blog->article }} </h5>
                        <h5 class="pt-2"> Time Create Blog :   {{ $blog->created_at }}</h5>
                        <h5 class="pt-2">Detail Blog :   {{ $blog->detail }} </h5>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection