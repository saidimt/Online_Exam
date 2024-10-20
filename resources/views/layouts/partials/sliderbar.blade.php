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
  <img src="{{asset('assets/images/profile.jpg')}}" class="profile-thumb rounded-circle p-1 d-lg-flex d-none"
    alt="Bootstrap Gallery" />
  <h5 class="profile-name lh-lg mt-2 text-truncate">SAID SAIDI</h5>
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
                <li class="{{Route::is('welcome')?'active current-page':''}} ">
                  <a href="{{route('welcome')}}">
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
                <li class="{{Route::is('exam.create')?'active current-page ':''}} ">
                  <a href="{{route('exam.create')}}">
                    <i class="bi bi-calendar4"></i>
                    <span class="menu-text">Create Exam</span>
                  </a>
                </li>
                
                <li class="treeview">
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
                      <ul class="treeview-menu">
                        <li>
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
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- Sidebar menu ends -->



</nav>
<!-- Sidebar wrapper end -->
  