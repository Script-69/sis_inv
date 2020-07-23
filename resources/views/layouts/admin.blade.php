<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIS | Sistema Inventario SIDACTA_v2.0 |</title>
    <!-- le dicemos al navegardor que sea responsivo con screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"><!-- Font Awesome -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SIS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SI_SIDACTA</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              @auth
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <small class="bg-red">En linea</small>
                <label>{{ auth()->user()->nombre_usuario}} {{ auth()->user()->apellido_paterno_usuario}} {{ auth()->user()->apellido_materno_usuario}}</label>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-body">
                    <h4 class="text-right m-l-5">CI: {{ auth()->user()->id_usuario}}</h4>
                    <h4 class="text-right m-l-5">Email: {{ auth()->user()->correo_electronico_usuario}}</h4>
                    <h4 class="text-right m-l-5">Acceso: {{ auth()->user()->tipo_usuario}}</h4>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Cerrar Sesion</a>

                  
                

                                    
                    </div>
                  </li>
                </ul>
              </li>
              @endauth
              
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-road"></i>
                @auth
                @if (auth()->user()->tipo_usuario=='SU_ADMIN')
                    <span>Administrador SIDACTA</span>
                    @else
                    @if (auth()->user()->tipo_usuario=='ADMIN')
                    <span>+SIDACTA+</span>
                    @else
                    <span>-SIDACTA-</span>
                    @endif
                    @endif
                @endauth 
                
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="\sidacta/sitio"><i class="fa fa-circle-o"></i> Sitios</a></li>
                <li><a href="\sidacta/almacen"><i class="fa fa-circle-o"></i> Almacenes</a></li>
                <li><a href="\sidacta/equipo"><i class="fa fa-circle-o"></i> Equipos</a></li>
                <li><a href="\sidacta/proveedor"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                <li><a href="\sidacta/bitacora_falla"><i class="fa fa-circle-o"></i> Reporte de Fallas</a></li>
                
              </ul>
            </li>
            @auth                      
            <li class="treeview">
              <a href="#">
                <i class="fa fa-key"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              @if (auth()->user()->tipo_usuario=='SU_ADMIN')
                <li><a href="\sidacta/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="\home"><i class="fa fa-circle-o"></i>Info Sesión</a></li> 
                    @else
                    @if (auth()->user()->tipo_usuario=='ADMIN')
                <li><a href="\home"><i class="fa fa-circle-o"></i>Sesión</a></li>>
                    @else
                <li><a href="\home"><i class="fa fa-circle-o"></i>Sesión</a></li>>
                    @endif
                    @endif
              </ul>
              </li>
            @endauth                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">SIDACTA</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              @yield('contenido')
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0 Test
        </div>
        Sistema Integrado de Defensa Aérea y Control de Tránsito Aéreo<strong> "SIDACTA" - 2020 </strong> 
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>
