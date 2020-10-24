<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Visa Center | Staff Application</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

@yield('extraRef')
{{--
  <!-- Bootstrap CSS -->
  <link href="{{asset('css/internalApp/bootstrap.min.css')}}" rel="stylesheet">--}}
  <!-- bootstrap theme -->
{{--
  <link href="{{asset('css/internalApp/bootstrap-theme.css')}}" rel="stylesheet">
--}}
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('css/internalApp/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/internalApp/font-awesome.min.css')}}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{asset('css/internalApp/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/internalApp/style-responsive.css')}}" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
  <script src="{{asset('js/internaljs/html5shiv.js')}}"></script>
  <script src="{{asset('js/internaljs/respond.min.js')}}"></script>
  <script src="{{asset('js/internaljs/lte-ie7.js')}}"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- =======================================================


    ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">

      <!--header start-->
      <nav class="header dark-bg">
          <div class="toggle-nav">
              <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-globe align-self-lg-center lite" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4H2.255a7.025 7.025 0 0 1 3.072-2.472 6.7 6.7 0 0 0-.597.933c-.247.464-.462.98-.64 1.539zm-.582 3.5h-2.49c.062-.89.291-1.733.656-2.5H3.82a13.652 13.652 0 0 0-.312 2.5zM4.847 5H7.5v2.5H4.51A12.5 12.5 0 0 1 4.846 5zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5H7.5V11H4.847a12.5 12.5 0 0 1-.338-2.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12H7.5v2.923c-.67-.204-1.335-.82-1.887-1.855A7.97 7.97 0 0 1 5.145 12zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11H1.674a6.958 6.958 0 0 1-.656-2.5h2.49c.03.877.138 1.718.312 2.5zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12h2.355a7.967 7.967 0 0 1-.468 1.068c-.552 1.035-1.218 1.65-1.887 1.855V12zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5h-2.49A13.65 13.65 0 0 0 12.18 5h2.146c.365.767.594 1.61.656 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"/>
                  </svg>
              </div>
          </div>

          <!--logo start-->
          <a href="{{route('home')}}" class="logo"><h6>Visa Center</h6><span class="lite"><h6>Staff Application</h6></span></a>
          <!--logo end-->

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto float-right" style="display: inline; margin-top: 1em">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item" style="float: left; margin-right: 1em">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item" style="float: left">
                          <a class="nav-link" href="{{ route('register') }}">Self Registerataion</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: #39afea">
                          @if(Auth::user()->role_id > 1)
                              @if(Auth::user()->role_id == 5)
                                  <a class="dropdown-item" href="{{route('admin.panel.users')}}">Users Control Panel</a>
                              @endif

                              @if(Auth::user()->role_id == 2 or Auth::user()->role_id == 5)
                                  <a class="dropdown-item" href="{{route('staff.passport')}}">Receive Passport</a>
                              @endif

                              @if(Auth::user()->role_id == 3 or Auth::user()->role_id == 5)
                                  <a class="dropdown-item" href="{{route('staff.passports.workspace')}}">My Workspace</a>
                              @endif

                              @if(Auth::user()->role_id == 3 or Auth::user()->role_id == 5)
                                  <a class="dropdown-item" href="{{route('staff.passports.myHistory')}}">My History</a>
                              @endif

                              <a class="dropdown-item" href="{{route('staff.passports.query')}}">Query</a>

                              @if(Auth::user()->role_id == 4 or Auth::user()->role_id == 5)
                                  <a class="dropdown-item" href="{{route('reports.dashboard')}}">Passports Dashboard</a>
                              @endif
                          @endif
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </nav>
      <!--header end-->


      <!--main content start-->
    <section id="main-content mr-0">

      <section class="wrapper">
              @yield('internalAppContent')
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">


    </div>
  </section>

      <!-- container section end -->
  <!-- javascripts -->
  <script src="{{asset('js/internaljs/jquery.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- nicescroll -->
  <script src="{{asset('js/internaljs/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('js/internaljs/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="{{asset('js/internaljs/scripts.js')}}"></script>

    @yield('adminPanelJS')

</body>

</html>
