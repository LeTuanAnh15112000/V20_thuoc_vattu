<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>V20 | Vitamin A</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome 6.0.0-->
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/fontawesome-free-6.0.0/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('style/adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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

    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/adminlte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> --}}
        {{-- {{dd($healthFacility,$idMedicalStation)}} --}}
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    @role('admin')
                        <a href="{{ route('manager.dashboard.medical-station.statistical',['idMedicalStation'=>$idMedicalStation]) }}" class="nav-link">Phân hệ</a>
                    @endrole
                    @role('medical_station')
                        <a href="{{ route('manager.dashboard.index') }}" class="nav-link">Phân hệ</a>
                    @endrole
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Liên hệ</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <div class="dropdown dropstart">
                        <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <span class="badge bg-warning">15</span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                {{-- <a class="dropdown-item" href="#">Action</a> --}}
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                                    <span class="float-right text-muted text-sm">3 mins</span>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
                <div class="container">
                    <a href="#" class="navbar-brand">
                        <span class="brand-text font-weight-light">V20 | Vitamin A</span>
                    </a>
                </div>
            </nav>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/user/' . Auth::user()->anh_dai_dien) }}"
                            class="img-circle elevation-2" alt="User Image" id="nav-left-avatar">
                    </div>
                    <div class="info">
                        <a href="{{ route('manager.profile') }}" class="d-block"
                            id="nav-left-name">{{ Auth::user()->cadresByUserAuth(Auth::user()->id_cardres)->ho_ten }}</a>
                        <span class="text-white">
                            @if (Auth::user()->healthFacilityByUser() != null)
                                {{Auth::user()->healthFacilityByUser()->ten_co_so_y_te}}
                            @else
                                Quản trị viên
                            @endif
                        </span>
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
                            <a href="{{ route('manager.vitamin-a.dashboard',[
                                'idMedicalStation'=>$idMedicalStation,
                                'idHealthFacility'=>$healthFacilityById->id]) }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    bảng điều khiển
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manager.vitamin-a.patient.index',[
                                'idMedicalStation'=>$idMedicalStation,
                                'idHealthFacility'=>$healthFacilityById->id
                                ]) }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    đối tượng (bệnh nhân)
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manager.vitamin-a.deployment-location.index',[
                                'idMedicalStation'=>$idMedicalStation,
                                'idHealthFacility'=>$healthFacilityById->id]) }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    địa điểm triển khai
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manager.vitamin-a.vitamin.index',[
                                'idMedicalStation'=>$idMedicalStation,
                                'idHealthFacility'=>$healthFacilityById->id]) }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    vitamin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manager.vitamin-a.schedule.index',[
                                'idMedicalStation'=>$idMedicalStation,
                                'idHealthFacility'=>$healthFacilityById->id]) }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    lịch uống
                                </p>
                            </a>
                        </li>
                        {{-- Logout --}}
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post" id="formLogout">@csrf</form>
                            <a class="nav-link bg-danger" id="logout" style="cursor: pointer">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
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

    <script>
        if ($(this).is(':checked')) {
            $('body').addClass('dark-mode')
        } else {
            $('body').removeClass('dark-mode')
        }
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
    {{-- <script src="{{ asset('style/adminlte3/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
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

    <!-- Select2 -->
    <script src="{{ asset('style/adminlte3/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()
      
          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          })
      
          //Datemask dd/mm/yyyy
          $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
          //Datemask2 mm/dd/yyyy
          $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
          //Money Euro
          $('[data-mask]').inputmask()
      
          //Date picker
          $('#reservationdate').datetimepicker({
              format: 'L'
          });
      
          //Date and time picker
          $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
      
          //Date range picker
          $('#reservation').daterangepicker()
          //Date range picker with time picker
          $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
              format: 'MM/DD/YYYY hh:mm A'
            }
          })
          //Date range as a button
          $('#daterange-btn').daterangepicker(
            {
              ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate  : moment()
            },
            function (start, end) {
              $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
          )
      
          //Timepicker
          $('#timepicker').datetimepicker({
            format: 'LT'
          })
      
          //Bootstrap Duallistbox
          $('.duallistbox').bootstrapDualListbox()
      
          //Colorpicker
          $('.my-colorpicker1').colorpicker()
          //color picker with addon
          $('.my-colorpicker2').colorpicker()
      
          $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
          })
      
          $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
          })
      
        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
          window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
      
        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false
      
        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)
      
        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
          url: "/target-url", // Set the url
          thumbnailWidth: 80,
          thumbnailHeight: 80,
          parallelUploads: 20,
          previewTemplate: previewTemplate,
          autoQueue: false, // Make sure the files aren't queued until manually added
          previewsContainer: "#previews", // Define the container to display the previews
          clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })
      
        myDropzone.on("addedfile", function(file) {
          // Hookup the start button
          file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
        })
      
        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
          document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })
      
        myDropzone.on("sending", function(file) {
          // Show the total progress bar when upload starts
          document.querySelector("#total-progress").style.opacity = "1"
          // And disable the start button
          file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })
      
        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
          document.querySelector("#total-progress").style.opacity = "0"
        })
      
        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
          myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
          myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
      </script>
</body>

</html>
