    <!-- Sidebar wrapper start -->
    <nav id="sidebar" class="sidebar-wrapper">

<!-- App brand starts -->
<div class="app-brand px-3 py-3 d-flex align-items-center">
  <a href="#">
    <img src="{{asset('assets/images/logo/tcca.png')}}" class="logo" alt="Bootstrap Gallery" />
  </a>
</div>
<!-- App brand ends -->

<!-- Sidebar profile starts -->
<div class="sidebar-user-profile">
  @role('instructor')

  <img src="{{asset('assets/images/mweya.png')}}" class="rounded-4 img-3x" alt="Bootstrap Gallery" />
@endrole
@role('student')

  <img src="{{asset('assets/images/profile.jpg')}}" class="rounded-4 img-3x" alt="Bootstrap Gallery" />
@endrole

  <h5 class="profile-name lh-lg mt-2 text-truncate">{{auth()->user()->name}}</h5>
  <!-- <ul class="profile-actions d-flex m-0 p-0">
    <li>
      <a href="javascript:void(0)">
        <i class="bi bi-skype fs-4"></i>
        <span class="count-label"></span>
      </a>
    </li>
    <li>
      <a href="javascript:void(0)">
        <i class="bi bi-dribbble fs-4"></i>
      </a>
    </li>
    <li>
      <a href="javascript:void(0)">
        <i class="bi bi-twitter fs-4"></i>
      </a>
    </li>
  </ul> -->
</div>
<!-- Sidebar profile ends -->
  <!-- Sidebar menu starts -->
  <div class="sidebarMenuScroll">
              <ul class="sidebar-menu">
                @role('instructor')
                <li class="{{Route::is('instructor.dashboard')?'active current-page':''}} ">
                  <a href="{{route('instructor.dashboard')}}">
                    <i class="bi bi-tv"></i>
                    <span class="menu-text">Dashboard</span>
                  </a>
                </li>
                <li class="{{Route::is('exam.create')?'active current-page ':''}} ">
                  <a href="{{route('exam.create')}}">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Create Exam</span>
                  </a>
                </li>
                <li class="{{Route::is('quizy.create')?'active current-page ':''}} ">
                  <a href="{{route('quizy.create')}}">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Create Quizy</span>
                  </a>
                </li>
                <li class="{{Route::is('test.create')?'active current-page ':''}} ">
                  <a href="{{route('test.create')}}">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Create Test</span>
                  </a>
                </li>
                @endrole
                @role('student')
                <li class="{{Route::is('student.dashboard')?'active current-page':''}} ">
                  <a href="{{route('student.dashboard')}}">
                    <i class="bi bi-tv"></i>
                    <span class="menu-text">Dashboard</span>
                  </a>
                </li>

                <li class="{{Route::is('take_quizy')?'active current-page ':''}} ">
                  <a href="{{route('take_quizy')}}">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Take Quizy</span>
                  </a>
                </li>
                <li class="{{Route::is('take_test')?'active current-page ':''}} ">
                  <a href="{{route('take_test')}}">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Take Test</span>
                  </a>
                </li>
                <li class="{{Route::is('take_exam')?'active current-page ':''}} ">
                  <a href="{{route('take_exam')}}">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Take Exam</span>
                  </a>
                </li>

                @endrole
                <!-- <li class="{{Route::is('take_exam')?'active current-page ':''}} ">
                  <a href="{{route('take_exam')}}">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Take Aptitude Tests</span>
                  </a>
                </li> -->
                
                
                <!-- <li class="treeview">
                  <a href="#!">
                    <i class="bi bi-code-square"></i>
                    <span class="menu-text">Multi Level</span>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="#!">Level One Link</a>
                    </li>
                    <li>
                      <a href="#!">
                        Level One Menu
                        <i class="bi bi-chevron-right"></i>
                      </a>
                      <ul class="treeview-menu"> -->
                        <!-- <li>
                          <a href="#!">Level Two Link</a>
                        </li>
                        <li>
                          <a href="#!">Level Two Menu
                            <i class="bi bi-chevron-right"></i>
                          </a>
                          <ul class="treeview-menu">
                            <li>
                              <a href="#!">Level Three Link</a>
                            </li>
                            <li>
                              <a href="#!">Level Three Link</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="#!">Level One Link</a>
                    </li> -->
                  </ul>
                </li>
              </ul>
            </div>
            <!-- Sidebar menu ends -->



</nav>
<!-- Sidebar wrapper end -->
  