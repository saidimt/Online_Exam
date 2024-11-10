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

          <img src="{{asset(auth()->user()->picture)}}" class="rounded-4 img-3x" alt="Bootstrap Gallery" />


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
                        <li class="{{Route::is('instructor.dashboard') ? 'active current-page' : ''}}">
                          <a href="{{route('instructor.dashboard')}}">
                            <i class="bi bi-tv"></i>
                            <span class="menu-text">Dashboard</span>
                          </a>
                        </li>

                        <!-- Exam Section -->
                        <li class="treeview {{Route::is('exam.create') || Route::is('exam.results') ? 'active current-page' : ''}}">
                          <a href="#!">
                            <i class="bi bi-slash-square"></i>
                            <span class="menu-text">Exam</span>
                          </a>
                          <ul class="treeview-menu">
                            <li>
                              <a href="{{route('exam.create')}}" class="{{Route::is('exam.create') ? 'active-sub' : ''}}">
                                Create Exam
                              </a>
                            </li>
                            <li>
                              <a href="{{route('exam.results')}}" class="{{Route::is('exam.results') ? 'active-sub' : ''}}">
                                Results
                              </a>
                            </li>
                          </ul>
                        </li>

                        <!-- Quiz Section -->
                        <li class="treeview {{Route::is('quiz.create') || Route::is('quiz.results') ? 'active current-page' : ''}}">
                          <a href="#!">
                            <i class="bi bi-slash-square"></i>
                            <span class="menu-text">Quiz</span>
                          </a>
                          <ul class="treeview-menu">
                            <li>
                              <a href="{{route('quiz.create')}}" class="{{Route::is('quiz.create') ? 'active-sub' : ''}}">
                                Create Quiz
                              </a>
                            </li>
                            <li>
                              <a href="{{route('quiz.results')}}" class="{{Route::is('quiz.results') ? 'active-sub' : ''}}">
                                Results
                              </a>
                            </li>
                          </ul>
                        </li>

                        <!-- Test Section -->
                        <li class="treeview {{Route::is('test.create') || Route::is('test.results') ? 'active current-page' : ''}}">
                          <a href="#!">
                            <i class="bi bi-slash-square"></i>
                            <span class="menu-text">Test</span>
                          </a>
                          <ul class="treeview-menu">
                            <li>
                              <a href="{{route('test.create')}}" class="{{Route::is('test.create') ? 'active-sub' : ''}}">
                                Create Test
                              </a>
                            </li>
                            <li>
                              <a href="{{route('test.results')}}" class="{{Route::is('test.results') ? 'active-sub' : ''}}">
                                Results
                              </a>
                            </li>
                          </ul>
                        </li>
                      @endrole





                        @role('student')
                        <li class="{{Route::is('student.dashboard')?'active current-page':''}} ">
                          <a href="{{route('student.dashboard')}}">
                            <i class="bi bi-tv"></i>
                            <span class="menu-text">Dashboard</span>
                          </a>
                        </li>

                        <li class="{{Route::is('take_quiz')?'active current-page ':''}} ">
                          <a href="{{route('take_quiz')}}">
                            {{-- <i class="bi bi-calendar4"></i>
                            <span class="menu-text">Take Quiz</span> --}}
                            <i class="bi bi-clipboard-check"></i>
                           <span class="menu-text">Quiz</span>

                          </a>
                        </li>
                        <li class="{{Route::is('take_test')?'active current-page ':''}} ">
                          <a href="{{route('take_test')}}">
                            {{-- <i class="bi bi-calendar4"></i>
                            <span class="menu-text">Take Test</span> --}}
                            <i class="bi bi-clipboard"></i>
                           <span class="menu-text">Test</span>

                          </a>
                        </li>
                        <li class="{{Route::is('take_exam')?'active current-page ':''}} ">
                          <a href="{{route('take_exam')}}">
                            <i class="bi bi-file-earmark-text"></i>
                            <span class="menu-text">Exam</span>

                            {{-- <i class="bi bi-calendar4"></i>
                            <span class="menu-text">Take Exam</span> --}}
                          </a>
                        </li>
                        @endrole


                        @role('academic')
                        <li class="{{Route::is('academic.dashboard')?'active current-page':''}} ">
                          <a href="{{route('academic.dashboard')}}">
                            <i class="bi bi-tv"></i>
                            <span class="menu-text">Dashboard</span>
                          </a>
                        </li>
                        <li class="{{Route::is('academic.exam-types')?'active current-page ':''}} ">
                          <a href="{{route('academic.exam-types')}}">
                            <i class="bi bi-calendar4"></i>
                            <span class="menu-text"> Exam Types</span>
                          </a>
                        </li>
                        <li class="{{Route::is('academic.students')?'active current-page ':''}} ">
                          <a href="{{route('academic.students')}}">
                            <i class="bi bi-wallet2"></i>
                            <span class="menu-text"> Students </span>
                          </a>
                        </li>
                        @endrole


                        @role('registrar')
                        <li class="{{Route::is('registrar.dashboard')?'active current-page':''}} ">
                          <a href="{{route('registrar.dashboard')}}">
                            <i class="bi bi-tv"></i>
                            <span class="menu-text">Dashboard</span>
                          </a>
                        </li>
                       <li class="treeview {{Route::is('registrar.students')|| Route::is('registrar.students.registerStudent')|| Route::is('registrar.students.import') || Route::is('registrar.students.import') ?' active current-page':''}}">
                          <a href="#!">
                            <i class="bi bi-people"></i>
                         <span class="menu-text">Students</span>

                          </a>
                          <ul class="treeview-menu">
                            <li>
                          <a href="{{route('registrar.students')}}" class="treeview {{Route::is('registrar.students') || Route::is('registrar.students.registerStudent')|| Route::is('registrar.students.import') || Route::is('registrar.students.import')?' active-sub':''}}">
                            Enrolled Students</a>
                            </li>

                              </ul>
                            </li>
                              <li class="treeview {{Route::is('registrar.instructors')|| Route::is('registrar.instructors.registerInstructor')|| Route::is('registrar.instructors.import')?' active current-page':''}}">
                                <a href="#!">
                                  {{-- <i class="bi bi-bag"></i>
                                  <span class="menu-text">Instructor</span> --}}
                                  <i class="bi bi-person"></i>
                                 <span class="menu-text">Instructor</span>
                                </a>
                                <ul class="treeview-menu">
                                  {{-- <li>
                                <a href="{{route('registrar.instructors.registerInstructor')}}">
                                      Register Instructor</a>
                                  </li> --}}
                                  <li>
                                <a href="{{route('registrar.instructors')}}" class="{{Route::is('registrar.instructors') || Route::is('registrar.instructor.registerInstructor')|| Route::is('registrar.instructors.import')?' active-sub':''}}">
                                      Enrolled Instructor</a>
                                  </li>

                                    </ul>
                                  </li>
                                    <li class="treeview {{Route::is('registrar.course.index')|| Route::is('registrar.course.create')|| Route::is('registrar.course.edit')|| Route::is('registrar.course-list.index')|| Route::is('registrar.course-list.create')|| Route::is('registrar.course-list.edit')?' active current-page':''}}">
                                          <a href="#!">
                                            {{-- <i class="bi bi-folder"></i>
                                            <span class="menu-text">Course</span> --}}
                                            <i class="bi bi-journal"></i>
                                           <span class="menu-text">Courses</span>

                                          </a>
                                          <ul class="treeview-menu">
                                              <li>
                                              <a href="{{route('registrar.course-list.index')}}" class="{{Route::is('registrar.course-list.index')|| Route::is('registrar.course-list.create')|| Route::is('registrar.course-list.edit')?' active-sub':''}}">
                                                Register course</a>
                                              </li>
                                              <li>
                                                <a href="{{route('registrar.course.index')}}" class="{{Route::is('registrar.course.index')|| Route::is('registrar.course.create')|| Route::is('registrar.course.edit')?' active-sub':''}}">
                                                    Starting Courses</a>
                                              </li>

                                          </ul>
                                    </li>

                                    <li class="treeview {{Route::is('registrar.subject.index')|| Route::is('registrar.subject.create')|| Route::is('registrar.subject.edit')|| Route::is('registrar.course-subject.index')|| Route::is('registrar.course-subject.create')|| Route::is('registrar.course-subject.edit')?' active current-page':''}}">
                                      <a href="#!">
                                        {{-- <i class="bi bi-briefcase"></i>
                                        <span class="menu-text">Subjects</span> --}}
                                        <i class="bi bi-journals"></i>
                                        <span class="menu-text">Subjects</span>

                                      </a>
                                      <ul class="treeview-menu">
                                          <li>
                                          <a href="{{route('registrar.subject.index')}}" class="{{Route::is('registrar.subject.index')|| Route::is('registrar.subject.create')|| Route::is('registrar.subject.edit')?' active-sub':''}}">
                                          Register Subject</a>
                                          </li>
                                          <li>
                                            <a href="{{route('registrar.course-subject.index')}}" class="{{Route::is('registrar.course-subject.index')|| Route::is('registrar.course-subject.create')|| Route::is('registrar.course-subject.edit')?' active-sub':''}}">
                                                Assign Subject</a>
                                          </li>

                                      </ul>
                                </li>













        {{--
                        <li class="{{Route::is('academic.students')?'active current-page ':''}} ">
                          <a href="{{route('academic.students')}}">
                            <i class="bi bi-wallet2"></i>
                            <span class="menu-text">Register Instructor</span>
                          </a>
                        </li>
                        <li class="{{Route::is('academic.students')?'active current-page ':''}} ">
                          <a href="{{route('academic.students')}}">
                            <i class="bi bi-wallet2"></i>
                            <span class="menu-text">Register Course</span>
                          </a>
                        </li> --}}

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
