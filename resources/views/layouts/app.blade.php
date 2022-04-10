<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>V20</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <!-- Font Awesome 6.0.0-->
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/fontawesome-free-6.0.0/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('style/adminlte3/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('style/adminlte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/summernote/summernote-bs4.min.css') }}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/toastr/toastr.min.css') }}">

    {{-- Ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> --}}

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Trang chủ</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Liên hệ</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="darkMode">
                        <label class="custom-control-label" for="darkMode">Ban đêm</label>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
                <div class="container">
                    <a href="{{ route('manager.dashboard.index') }}" class="navbar-brand">
                        <span class="brand-text font-weight-light">V20</span>
                    </a>
                </div>
            </nav>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/user/'.Auth::user()->anh_dai_dien) }}" class="img-circle elevation-2" alt="User Image"
                            id="nav-left-avatar">
                    </div>
                    <div class="info">
                        <a href="{{ route('manager.profile') }}" class="d-block"
                            id="nav-left-name">
                            {{ Auth::user()->cadresByUserAuth()->ho_ten }}
                            <br/>
                            <span style="font-size: 14px;">
                                @if (Auth::user()->healthFacilityByUser() !=  null)
                                    {{Auth::user()->healthFacilityByUser()->ten_co_so_y_te}}
                                @else
                                    Quản trị viên
                                @endif
                            </span>
                        </a>
                    </div>
                </div>
                
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('manager.dashboard.index') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    bảng điều khiển
                                </p>
                            </a>
                        </li>
                        @hasrole('admin')
                            <li class="nav-item">
                                <a href="{{ route('manager.user.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        người dùng
                                    </p>
                                </a>
                            </li>
                        @endhasrole
                        
                        {{-- @hasrole('admin|department_of_health|medical_center')
                            <li class="nav-item">
                                <a href="{{ route('manager.health-facilities.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        cơ sở y tế
                                    </p>
                                </a>
                            </li>
                        @endhasrole --}}
                        
                        <li class="nav-item">
                            <a href="{{ route('manager.cardres.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    cán bộ
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('manager.position.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    chức vụ
                                </p>
                            </a>
                        </li>

                        {{-- Logout --}}
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post" id="formLogout">@csrf</form>
                            <a class="nav-link bg-danger" id="logout" style="cursor: pointer">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p >
                                    Đăng xuất
                                </p>
                            </a>
                        </li>
                        {{-- Logout --}}


                        <script>
                            $(document).ready(function() {
                                $("#logout").click(function() {
                                    $("#formLogout").submit();
                                });
                            });
                        </script>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        
        @yield('content')
        
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong class="text-capitalize">hệ thống quản lí thông tin y tế cơ sở V20.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Phiên bản</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    x
    {{-- DarkMode --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function getDarkMode(){
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/manager/load-dark-mode",
                    dataType: "json",
                    success: function(response) {
                        if(response.status == 200){
                            if(response.outputDarkMode == 1){
                                $('body').addClass('dark-mode')
                                $('#darkMode').prop('checked',true);
                                // if ($('#darkMode').is(':checked')) {
                                // } else {
                                //     $('body').removeClass('dark-mode')
                                // }
                            }else{
                                $('body').removeClass('dark-mode')
                                $('#darkMode').prop('checked',false);
                            }
                        }else{
                            console.log(response.msgError);
                        }
                    }
                });
            }

            getDarkMode();

            $(document).on('change', '#darkMode', function(e) {
                e.preventDefault();
                var statusCheck = '';
                if($(this).prop('checked')){
                    console.log('true');
                    statusCheck = 'true';
                }else{
                    statusCheck = 'false';
                    console.log('false');
                }
                $.ajax({
                    type: "POST",
                    url: "http://127.0.0.1:8000/manager/dark-mode",
                    data: {statusCheck:statusCheck},
                    dataType: "json",
                    success: function(response) {
                        if(response.status == 200){
                            getDarkMode();
                        }else{
                            toastr.error(response.msgError);
                        }
                    }
                });
            });
        });
    </script>
    <!-- jQuery -->
    <script src="{{ asset('style/adminlte3/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('style/adminlte3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('style/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('style/adminlte3/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('style/adminlte3/plugins/sparklines/sparkline.js') }}"></script>

    <!-- JQVMap -->
    {{-- <script src="{{ asset('style/adminlte3/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('style/adminlte3/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('style/adminlte3/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('style/adminlte3/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('style/adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('style/adminlte3/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('style/adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('style/adminlte3/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('style/adminlte3/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('style/adminlte3/dist/js/pages/dashboard.js') }}"></script>

    {{-- Toastr --}}
    <script src="{{ asset('style/adminlte3/plugins/toastr/toastr.min.js') }}"></script>
</body>
</html>
