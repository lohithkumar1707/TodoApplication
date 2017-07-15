<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
      <!-- jvectormap -->
      <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
      
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

      <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      
      <style type="text/css">
          .dataTables_wrapper {
            padding: 10px !important;
          }

      </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="app">
  @if (Auth::guest())
    <div class="wrapper">
        <header class="main-header">
            <a href="./home" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>My Pro</b></span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>My Project</b></span>
            </a>

            <nav class="navbar navbar-static-top">
              <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a> -->
              <div class="navbar-custom-menu">
                    
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                
            </nav>
        </header>
    </div>
  @else
    <!-- <div class="wrapper"> -->
    

    <header class="main-header">

    <!-- Logo -->
    <a href="{{ url('./home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MyPro</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MyProject</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/./uploads/{{ Auth::user()->image }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu" style="width: 200px;">
              <!-- User image -->
              <li class="user-header" style="height: 100px;">
                <img src="/./uploads/{{ Auth::user()->image }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('./admin') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <!-- <a href="{{ url('./users/logout') }}" class="btn btn-default btn-flat">Logout</a> -->
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
        
      </div>

    </nav>
  </header>
    @endif

    @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    
    <!-- FastClick -->
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap  -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('bower_components/Chart.js/Chart.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script><script src="http://dev.jquery.com/view/trunk/plugins/validate/jquery.validate.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
          // setTimeout() function will be fired after page is loaded
          // it will wait for 5 sec. and then will fire
          // $("#successMessage").hide() function
          setTimeout(function() {
              $("#success-msg").hide();
          }, 2000);
      });
      
      $('#contactsTable').DataTable();

    </script>
</body>
</html>
