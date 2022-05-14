<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Test</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a ><b>Technical</b>TEST</a>
  </div>
  <!-- User name -->
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ asset('assets/admin/dist/img/user1-128x128.jpg')}}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
      @if (Route::has('login'))
      <div class="top-right links">
          @auth
          <form class="lockscreen-credentials">
            <div class="input-group">
              <input type="password" class="form-control" disabled style="background-color: #fff;" placeholder="Home">
              <div class="input-group-append">
                <a href="{{ route('home') }}">
                <button type="button" class="btn">
                  <i class="fas fa-arrow-right text-muted mt-2"></i>
                </button>
                </a>
              </div>
            </div>
          </form>
          @else
          <form class="lockscreen-credentials">
            <div class="input-group">
              <input type="password" class="form-control" disabled style="background-color: #fff;" placeholder="Get Started!">
              <div class="input-group-append">
                <a href="{{ route('login') }}" type="button" class="btn">
                  <i class="fas fa-arrow-right text-muted mt-2"></i>
                </a>
              </div>
            </div>
          </form>
          @endauth
      </div>
     @endif


  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    <div class="lockscreen-name">MOCK-UP APPLICATION TEST DIDI ROSIDI</div>
  </div>
  <div class="text-center">
  </div>
  <div class="lockscreen-footer text-center">
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
