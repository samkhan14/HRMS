<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <title>Login - HRMS</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  </head>
  <body class="account-page">
    <div class="main-wrapper">
      <div class="account-content">
        {{-- <a href="job-list.html" class="btn btn-primary apply-btn">All Good</a> --}}
        <div class="container">
          <div class="account-logo">
            <a href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt="Admin Dashboard"></a>
          </div>
          <div class="account-box">
            <div class="account-wrapper">
              <h3 class="account-title">Login</h3>
              <p class="account-subtitle">Access to our dashboard</p>
               <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <label>Email Address</label>
                  <input class="form-control" type="email" id="email" name="email" :value="old('email')" required autofocus>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <label>Password</label>
                    </div>
                    <div class="col-auto">
                      <a class="text-muted" href="forgot-password.html">
                      Forgot password?
                      </a>
                    </div>
                  </div>
                  <input class="form-control" type="password" id="password" name="password" :value="old('email')" required autocomplete="current-password">
                </div>
                <div class="form-group text-center">
                  <button class="btn btn-primary account-btn" type="submit">Login</button>
                </div>
                {{--
                <div class="account-footer">
                  <p>Don't have an account yet? <a href="register.html">Register</a></p>
                </div>
                --}}
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>
