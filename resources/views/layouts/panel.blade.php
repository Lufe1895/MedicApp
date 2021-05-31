<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
  <title>MedicApp</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link type="text/css" rel="stylesheet" href="{{ asset('Admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link type="text/css" rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link type="text/css" rel="stylesheet" href="{{ asset('Admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link type="text/css" rel="stylesheet" href="{{ asset('Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link type="text/css" rel="stylesheet" href="{{ asset('Admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link type="text/css" rel="stylesheet" href="{{ asset('Admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link type="text/css" rel="stylesheet" href="{{ asset('Admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link type="text/css" rel="stylesheet" href="{{ asset('Admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link type="text/css" rel="stylesheet" href="{{ asset('Admin/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link"><i class="fas fa-home"></i>&nbsp;Página Principal</a>
      </li>
      <li class="nav-item d-inline-block d-sm-none">
        <a href="/" class="nav-link"><i class="fas fa-home"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <!-- <a class="nav-link" href="/home" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					Cerrar Sesión
				</a>-->
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
      </li>
      <!-- Messages Dropdown Menu -->
      @if(auth()->user())
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#profileMenu">
            <i class="fas fa-user d-inline-block d-sm-none"></i>&nbsp;<span class="d-none d-sm-inline-block">Opciones de Perfil</span>&nbsp;<i class="fas fa-caret-down"></i>
          </a>
          <div id="profileMenu" class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="{{ url('/profile') }}" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Mi perfil
                    <span class="float-right text-sm text-success"><i class="fas fa-user"></i></span>
                  </h3>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ url('/edit/profile') }}" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Editar Información
                    <span class="float-right text-sm text-success"><i class="fas fa-edit"></i></span>
                  </h3>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <!-- <a href="#" class="dropdown-item"> -->
              <!-- Message Start -->
              <!-- <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Editar Contraseña
                    <span class="float-right text-sm text-warning"><i class="fas fa-edit"></i></span>
                  </h3>
                </div>
              </div> -->
              <!-- Message End -->
            <!-- </a> -->
            <a class="dropdown-item"  href="/home" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <!-- Message Start -->
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Cerrar sesión
                    <span class="float-right text-sm text-danger"><i class="fas fa-sign-out-alt"></i></span>
                  </h3>
                </div>
              </div>
              <!-- Message End -->
            </a>
          </div>
        </li>
      @else
        <li class="nav-item">
          <a href="#login" data-toggle="modal" data-target="#login" class="nav-link">Iniciar Sesión</a>
        </li>

        <li class="nav-item">
          <a href="#register" data-toggle="modal" data-target="#register" class="nav-link">Registrarme</a>
        </li>
      @endif
      <!-- Notifications Dropdown Menu 
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="false">
    <div class="modal-dialog">
      <login-component />
    </div>
  </div>
  @if(auth()->user() && auth()->user()->hasRole('user'))
    <div class="modal fade" id="order" tabindex="-1" aria-labelledby="order" aria-hidden="false">
      <div class="modal-dialog modal-lg">
        <order-prescription-component :user="'{{ auth()->user()->person }}'" />
      </div>
    </div>
  @endif

  <div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">¿Es una persona o una Farmacia?</h5>
        </div>

        <div class="modal-body">
          <p>Seleccione si es una persona o una farmacia.</p>
        </div>

        <div class="modal-footer">
          <a href="#people" data-toggle="modal" data-target="#people" class="btn btn-primary" data-dismiss="modal">Soy una Persona</a>
          <a href="#pharmacy" data-toggle="modal" data-target="#pharmacy" class="btn btn-primary" data-dismiss="modal">Soy una Farmacia</a>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="people" tabindex="-1" aria-labelledby="people" aria-hidden="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <register-people-component />
    </div>
  </div>

  <div class="modal fade" id="pharmacy" tabindex="-1" aria-labelledby="pharmacy" aria-hidden="false">
    <div class="modal-dialog modal-lg">
      <register-pharmacy-component />
    </div>
  </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="https://images.emojiterra.com/google/android-pie/512px/2695.png" alt="Logo" height="60px"
           style="opacity: 1">
      <span class="brand-text font-weight-bold">&nbsp;MedicApp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('DefaultImage/Default.png') }}" class="img-circle elevation-2" alt="Yes">
        </div>
        <div class="info">
          @if(auth()->user())
            @if(!auth()->user()->hasRole('pharmacy'))
              <a class="text-white d-block" href="{{ url('/') }}">{{ auth()->user()->person->name }}</a>
            @else
              <a class="text-white d-block" href="{{ url('/') }}">{{ auth()->user()->pharmacy->name }}</a>
            @endif
          @else
            <a class="text-white d-block" href="{{ url('/') }}">Bienvenido</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if(auth()->user())
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-circle"></i>
                <p>
                  Perfil
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('/profile') }}" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Mi Perfil</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{ url('/edit/profile') }}" class="nav-link">
                    <i class="fas fa-edit nav-icon"></i>
                    <p>Editar Información</p>
                  </a>
                </li>

                <!-- <li class="nav-item">
                  <a href="{{ url('/pedidos') }}" class="nav-link">
                    <i class="fas fa-key nav-icon"></i>
                    <p>Editar Contraseña</p>
                  </a>
                </li> -->

                <li class="nav-item">
                  <a href="{{ url('/home') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-times nav-icon"></i>
                    <p>Cerrar sesión</p>
                  </a>
                </li>
              </ul>
            </li>
            
            @if(auth()->user() && auth()->user()->hasRole('user'))
              <div class="dropdown-divider" style="opacity: 0.2;"></div>
              <li class="nav-item has-treeview menu-closed">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-dolly-flatbed"></i>
                  <p>
                    Pedidos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/orders') }}" class="nav-link">
                      <i class="fas fa-box-open nav-icon"></i>
                      <p>Mis Pedidos</p>
                    </a>
                  </li>

                  <!-- <li class="nav-item">
                    <a href="#order" data-toggle="modal" data-target="#order" class="nav-link">
                      <i class="fas fa-cart-plus nav-icon"></i>
                      <p>Pedido con Receta</p>
                    </a>
                  </li> -->
                </ul>
              </li>
            @elseif(auth()->user() && auth()->user()->hasRole('pharmacy'))
            <div class="dropdown-divider" style="opacity: 0.2;"></div>
              <li class="nav-item has-treeview menu-closed">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-dolly-flatbed"></i>
                  <p>
                    Pedidos
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/pharmacies/orders') }}" class="nav-link">
                      <i class="fas fa-box-open nav-icon"></i>
                      <p>Mis Pedidos</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
            <div class="dropdown-divider" style="opacity: 0.2;"></div>
            @if(auth()->user()->hasRole('admin'))
              <li class="nav-item has-treeview menu-closed">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-info"></i>
                  <p>
                    Administración
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/people') }}" class="nav-link">
                      <i class="fas fa-user nav-icon"></i>
                      <p>Personas</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ url('/pharmacies') }}" class="nav-link">
                      <i class="fas fa-clinic-medical nav-icon"></i>
                      <p>Farmacias</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ url('/pedidos') }}" class="nav-link">
                      <i class="fas fa-shipping-fast nav-icon"></i>
                      <p>Pedidos</p>
                    </a>
                  </li>
                </ul>
              </li>
              <div class="dropdown-divider" style="opacity: 0.2;"></div>
            @endif
                </ul>
              </li>
          </ul>
        </nav>
      @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper" style="min-height: 511px;">
    <div id="app">
      @yield('content')
    </div>
  </div>

  <footer class="main-footer"> 
    <strong>MedicAPP</strong>
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.0.4 -->
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script type="text/javascript" src="{{ asset('Admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="{{ asset('Admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="{{ asset('Admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script type="text/javascript" src="{{ asset('Admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script type="text/javascript" src="{{ asset('Admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script type="text/javascript" src="{{ asset('Admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script type="text/javascript" src="{{ asset('Admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="{{ asset('Admin/plugins/moment/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script type="text/javascript" src="{{ asset('Admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script type="text/javascript" src="{{ asset('Admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script type="text/javascript" src="{{ asset('Admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="{{ asset('Admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script type="text/javascript" src="{{ asset('Admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="{{ asset('Admin/dist/js/demo.js') }}"></script>

<script type="text/javascript">
  var BASE_URL = "{{ url('/') }}";
  $(document).off('focusin.modal');
</script>
</body>
</html>
