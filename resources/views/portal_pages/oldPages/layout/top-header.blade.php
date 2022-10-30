<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('/admin/dashboard') }}">
            <!-- Logo icon -->
            <b style="color:white">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Light Logo icon -->
                {{-- <img src="{{ asset('/') }}assets/website/images/foot-logo.png" alt="homepage" style="height: 65px;width: auto; margin-top: -2px;"class="light-logo" /> --}}
                KCOLMS
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span style="color: white;font-size: larger;font-weight: bold;">
             <!-- dark Logo text -->
                {{-- <img src="{{ asset('/') }}assets/website/images/foot-logo.png" alt="homepage" class="dark-logo" /> --}}

     </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto mt-md-0">
         <!-- This is  -->
            <!-- This is  -->
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">
            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->
            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                    <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                </a>
                <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                    <ul>
                        <li>
                            <div class="drop-title">You have 4 new messages</div>
                        </li>
                        <li>
                            <div class="message-center">
                                <!-- Message -->
                               <!--<a href="#">
                                    <div class="user-img"> <img src="{{ asset('/') }}/assets/main-assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                </a>-->
                                <!-- Message -->
                                <!--<a href="#">
                                    <div class="user-img"> <img src="{{ asset('/') }}assets/main-assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                </a>-->
                                <!-- Message -->
                                <!--<a href="#">
                                    <div class="user-img"> <img src="{{ asset('/') }}assets/main-assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                </a>-->
                                <!-- Message -->
                                <!--<a href="#">
                                    <div class="user-img"> <img src="{{ asset('/') }}assets/main-assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                </div>
            </li>-->
            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->
            {{-- <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('/') }}assets/main-assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                <div class="dropdown-menu dropdown-menu-right scale-up">
                    <ul class="dropdown-user">
                        <!--<li>
                            <div class="dw-user-box">
                                <div class="u-img"><img src="{{ asset('/') }}assets/admin/main-assets/images/users/1.jpg" alt="user"></div>
                                <div class="u-text">
                                    <h4> </h4>
                                    <p class="text-muted"> </p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>-->
                            <!--</div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>-->
                        <!--<li role="separator" class="divider"></li>
                        <li><a href=""><i class="fa fa-power-off"></i></a></li>
                    </ul>
                </div>
            </li>--> --}}
            <!-- ============================================================== -->
            <!-- Language -->
            <!-- ============================================================== -->
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-ae"></i></a>
                <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
            </li> --}}
            <li class="nav-item checkin ">
                <a href="{{url('checkin')}}" name="checkin" class="btn btn-primary mx-auto my-3">Checkin</a>
            </li>
            <li class="nav-item dropdown logout">
                {{-- <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="{{ url('logout') }}"> <i class="fa fa-power-off"></i></a> --}}
                <a class="nav-link dropdown-toggle logout text-muted waves-effect waves-dark" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{-- {{ __('Logout') }} --}}
                    <i class="fa fa-power-off"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
