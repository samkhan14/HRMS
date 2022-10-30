<div class="scroll-sidebar">
    <!-- User profile -->
    <!--<div class="user-profile" style="background: url({{ asset('/') }}/assets/main-assets/images/background/user-info.jpg) no-repeat;">
         User profile image -->
       <!-- <div class="profile-img"> <img src="{{ asset('/') }}/assets/main-assets/images/users/profile.png" alt="user" /> </div>-->
        <!-- User profile text-->
       <!-- <div class="profile-text"> <a class="dropdown-toggle"></a>
        </div>
    </div>-->
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap text-left"> Admin Panel <br> {{ Auth::user()->name}} </li>

            <li>
                <a href="#"><i class="fa fa-user nav-icon"></i><span class="tio-circle nav-indicator-icon"></span> All Employees <span class="badge badge-info badge-pill ml-1"></span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{url('/all-employees')}}"><span class="tio-circle nav-indicator-icon"></span> All Employees <span class="badge badge-info badge-pill ml-1"></span></a></li>
                    <li><a href="{{url('add-employee-user')}}"><span class="tio-circle nav-indicator-icon"></span>Add New Employee  <span class="badge badge-soft-info badge-pill ml-1"></span></a></li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-file nav-icon"></i><span class="tio-circle nav-indicator-icon"></span> Attendances <span class="badge badge-info badge-pill ml-1"></span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{url('attendances')}}"><span class="tio-circle nav-indicator-icon"></span> All Attendace <span class="badge badge-info badge-pill ml-1"></span></a></li>
                    <li><a href="{{url('uploadattendance')}}"><span class="tio-circle nav-indicator-icon"></span>Upload Attendaces <span class="badge badge-soft-info badge-pill ml-1"></span></a></li>
                    <li><a href="{{url('manual-attendance')}}"><span class="tio-circle nav-indicator-icon"></span>Manual Attendaces <span class="badge badge-soft-info badge-pill ml-1"></span></a></li>

                </ul>
            </li>

            <li>
                <a href="{{ route('departments.index') }}" class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-shopping-cart  mr-0"></i><span class="hide-menu"> Departments</span></a>

            </li>
            <li>
                <a href="{{ route('designations.index') }}" class="waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-shopping-cart  mr-0"></i><span class="hide-menu"> Designations</span></a>

            </li>

            <li>
                <a href="{{ url('/admin/bonus_footage') }}"><i class="fa fa-flag nav-icon"></i><span class="hide-menu"> Documents</span></a>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-users  mr-0"></i><span class="hide-menu"> Leaves</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{url('/admin/artists')}}"><span class="tio-circle nav-indicator-icon"></span> All Leaves <span class="badge badge-info badge-pill ml-1"></span></a></li>
                    <li><a href="{{url('/admin/audience')}}"><span class="tio-circle nav-indicator-icon"></span> Leaves Qouta <span class="badge badge-soft-info badge-pill ml-1"></span></a></li>

                </ul>
            </li>
            <li>
                <a href="{{ url('/admin/membership') }}"><i class="fa fa-id-card  mr-0"></i><span class="hide-menu"> Company Summary</span></a>
            </li>

            <li class="nav-devider"></li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
