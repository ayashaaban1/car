<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.includes.head')  
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-car"></i></i> <span>Rent Car Admin</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.includes.profile')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.includes.sidebar')
					<!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('admin.includes.footer')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('admin.includes.topnav')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @include('admin.includes.fjs')

  </body>
</html>