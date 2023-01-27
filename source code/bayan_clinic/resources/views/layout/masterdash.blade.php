@include('layout.dashhead')

      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="http://127.0.0.1:8000/"
                  aria-expanded="false"
                  ><i class="fas fa-home"></i>
                  <span class="hide-menu">Home Page</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="http://127.0.0.1:8000/dashboard"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i >
                    <span class="hide-menu">Dashboard</span></a
                >
              </li>

              @if(\Illuminate\Support\Facades\Auth::user()->level == 'admin'  || 'reception' ||'doctor')

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-chart-bubble"></i
                    ><span class="hide-menu"> Servies</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="http://127.0.0.1:8000/services" class="sidebar-link"
                      ><i class="fas fa-braille"></i
                      ><span class="hide-menu">Servies  </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('services.create') }}" class="sidebar-link"
                      ><i class="fas fa-plus-circle"></i
                      ><span class="hide-menu"> Create Servies  </span></a
                    >
                  </li>
                  

                </ul>
              </li>
              @endif

              @if(\Illuminate\Support\Facades\Auth::user()->level == 'admin'  || 'reception'||'doctor')

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="me-2 mdi mdi-material-ui"></i
                    ><span class="hide-menu">Rooms Servies </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="http://127.0.0.1:8000/rooms_services" class="sidebar-link"
                      ><i class="me-2 mdi mdi-washing-machine"></i >
                      <span class="hide-menu">Rooms Servies </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('rooms_services.create') }}" class="sidebar-link"
                      ><i class="fas fa-plus-square"></i>
                      <span class="hide-menu"> Create Room Servie  </span></a
                    >
                  </li>
                  

                </ul>
              </li>
              @endif


              @if(\Illuminate\Support\Facades\Auth::user()->level == 'admin'  || 'reception'||'doctor')

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="me-2 mdi mdi-bio"></i
                    ><span class="hide-menu"> Sessions Name</span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="http://127.0.0.1:8000/sessions" class="sidebar-link"
                      ><i class="fab fa-servicestack"></i
                        >
                      <span class="hide-menu"> Sessions Name</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('sessions.create') }}" class="sidebar-link"
                      ><i class="me-2 mdi mdi-book-plus"></i
                        >
                      <span class="hide-menu"> Create  Sessions Name  </span></a
                    >
                  </li>
                  

                </ul>
              </li>
              @endif


              @if(\Illuminate\Support\Facades\Auth::user()->level == 'admin'  || 'reception'||'doctor')

                <li class="sidebar-item">
                  <a
                    class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)"
                    aria-expanded="false" >
                    <i class="me-2 mdi mdi-account-multiple-outline"></i >
                      <span class="hide-menu">Users </span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                      <a href="http://127.0.0.1:8000/users" class="sidebar-link"
                        ><i class="me-2 mdi mdi-account-multiple-outline"></i >
                          <span class="hide-menu"> Users </span></a
                      >
                    </li>
                    <li class="sidebar-item">
                      <a  href="{{ route('users.create') }}" class="sidebar-link"
                        ><i class="me-2 mdi mdi-account-multiple-plus"></i >
                          <span class="hide-menu"> Create User </span></a
                      >
                    </li>
  
                  </ul>
                </li>

                @endif

                {{-- @if(\Illuminate\Support\Facades\Auth::user()->level ==2)

                <li class="sidebar-item">
                  <a
                    class="sidebar-link has-arrow waves-effect waves-dark"
                    href="javascript:void(0)"
                    aria-expanded="false" >
                    <i class="me-2 mdi mdi-account-multiple-outline"></i >
                      <span class="hide-menu">Users </span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                      <a href="http://127.0.0.1:8000/users" class="sidebar-link"
                        ><i class="me-2 mdi mdi-account-multiple-outline"></i >
                          <span class="hide-menu"> Users </span></a
                      >
                    </li>

  
                  </ul>
                </li>

                @endif --}}

                @if(\Illuminate\Support\Facades\Auth::user()->level == 'admin'  || 'doctor')

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Blogs </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="http://127.0.0.1:8000/blog" class="sidebar-link"
                      ><i class="mdi mdi-note-outline"></i
                      ><span class="hide-menu"> Blogs </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="{{ route('blog.create') }}" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> Create Blog </span></a
                    >
                  </li>
                  

                </ul>
              </li>
              @endif
              {{-- <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="pages-buttons.html"
                  aria-expanded="false"
                  ><i class="mdi mdi-relative-scale"></i
                  ><span class="hide-menu">Buttons</span></a
                >
              </li> --}}

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-face"></i
                  ><span class="hide-menu">Profile </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="http://127.0.0.1:8000/home" class="sidebar-link"
                      ><i class="mdi mdi-emoticon"></i>
                      <span class="hide-menu"> User Profile</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a href="http://127.0.0.1:8000/changePassword" class="sidebar-link"
                      ><i class="fas fa-key"></i>
                      <span class="hide-menu"> Update Password</span>
                    </a>
                  </li>
                  
                </ul>
              </li>
              {{-- <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="pages-elements.html"
                  aria-expanded="false"
                  ><i class="mdi mdi-pencil"></i
                  ><span class="hide-menu">Elements</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-move-resize-variant"></i
                  ><span class="hide-menu">Addons </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="index2.html" class="sidebar-link"
                      ><i class="mdi mdi-view-dashboard"></i
                      ><span class="hide-menu"> Dashboard-2 </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="pages-gallery.html" class="sidebar-link"
                      ><i class="mdi mdi-multiplication-box"></i
                      ><span class="hide-menu"> Gallery </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="pages-calendar.html" class="sidebar-link"
                      ><i class="mdi mdi-calendar-check"></i
                      ><span class="hide-menu"> Calendar </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="pages-invoice.html" class="sidebar-link"
                      ><i class="mdi mdi-bulletin-board"></i
                      ><span class="hide-menu"> Invoice </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="pages-chat.html" class="sidebar-link"
                      ><i class="mdi mdi-message-outline"></i
                      ><span class="hide-menu"> Chat Option </span></a
                    >
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-account-key"></i
                  ><span class="hide-menu">Authentication </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="authentication-login.html" class="sidebar-link"
                      ><i class="mdi mdi-all-inclusive"></i
                      ><span class="hide-menu"> Login </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="authentication-register.html" class="sidebar-link"
                      ><i class="mdi mdi-all-inclusive"></i
                      ><span class="hide-menu"> Register </span></a
                    >
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)"
                  aria-expanded="false"
                  ><i class="mdi mdi-alert"></i
                  ><span class="hide-menu">Errors </span></a
                >
                <ul aria-expanded="false" class="collapse first-level">
                  <li class="sidebar-item">
                    <a href="error-403.html" class="sidebar-link"
                      ><i class="mdi mdi-alert-octagon"></i
                      ><span class="hide-menu"> Error 403 </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="error-404.html" class="sidebar-link"
                      ><i class="mdi mdi-alert-octagon"></i
                      ><span class="hide-menu"> Error 404 </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="error-405.html" class="sidebar-link"
                      ><i class="mdi mdi-alert-octagon"></i
                      ><span class="hide-menu"> Error 405 </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="error-500.html" class="sidebar-link"
                      ><i class="mdi mdi-alert-octagon"></i
                      ><span class="hide-menu"> Error 500 </span></a
                    >
                  </li>
                </ul>
              </li>
              
            
            </ul> --}}
            {{-- <li class="sidebar-item">
              <a
                class="sidebar-link waves-effect waves-dark sidebar-link"
                aria-expanded="false"
                href="http://127.0.0.1:8000/profile" >
                <i class="mdi mdi-face"></i>
                  <span class="hide-menu">User Profile</span></a
              >
            </li> --}}
            <li class="sidebar-item">
              <a
                class="sidebar-link waves-effect waves-dark sidebar-link"
                aria-expanded="false"
                href="{{route('processLogout')}}" >
                <i class="fa fa-power-off me-1 ms-1"></i>
                  <span class="hide-menu">Log Out</span></a
              >
            </li>

          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>

@yield('content')

@include('layout.dashfooter')