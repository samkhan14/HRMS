<div class="header">
<div class="header-left">
<a href="{{'/dashboard'}}" class="logo">
<img src="{{asset('assets/img/logo.png')}}" width="40" height="40" alt="">
</a>
</div>

<a id="toggle_btn" href="javascript:void(0);">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<div class="page-title-box">
<h3> Dashboard</h3>
</div>


<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

<ul class="nav user-menu">

{{-- <li class="nav-item">
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa fa-search"></i>
</a>
<form action="">
<input class="form-control" type="text" placeholder="Search here">
<button class="btn" type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
</li> --}}


{{-- <li class="nav-item dropdown has-arrow flag-nav">
<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
<img src="{{asset('assets/img/flags/us.png')}}" alt="" height="20"> <span>English</span>
</a>
<div class="dropdown-menu dropdown-menu-right">
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{asset('assets/img/flags/us.png')}}" alt="" height="16"> English
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{asset('assets/img/flags/fr.png')}}" alt="" height="16"> French
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{asset('assets/img/flags/es.png')}}" alt="" height="16"> Spanish
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{asset('assets/img/flags/de.png')}}" alt="" height="16"> German
</a>
</div>
</li> --}}


{{-- <li class="nav-item dropdown">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
<i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Notifications</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">
<img alt="" src="{{asset('assets/img/profiles/avatar-02.jpg')}}">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
</div>
</div>
</a>
</li>

</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="activities.html">View all Notifications</a>
</div>
</div>
</li> --}}


{{-- <li class="nav-item dropdown">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
<i class="fa fa-comment-o"></i> <span class="badge badge-pill">8</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Messages</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">
<img alt="" src="{{asset('assets/img/profiles/avatar-08.jpg')}}">
</span>
</div>
<div class="list-body">
<span class="message-author"> Catherine Manseau </span>
<span class="message-time">27 Feb</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="chat.html">View all Messages</a>
</div>
</div>
</li> --}}

<li class="nav-item dropdown has-arrow main-drop">
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
<span class="user-img"><img src="{{asset('assets/img/profiles/avatar-21.jpg')}}" alt="">
<span class="status online"></span></span>
<span> {{ Auth::user()->name }}</span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="">My Profile</a>
<a class="dropdown-item" href="settings.html">Settings</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf

<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
</form>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.html">My Profile</a>
<a class="dropdown-item" href="settings.html">Settings</a>
 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
</form>
<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
</div>
</div>

</div>
