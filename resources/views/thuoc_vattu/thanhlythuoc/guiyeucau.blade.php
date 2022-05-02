
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>
  {{-- css model gui yeu cau thanh lý --}}
  <link rel="stylesheet" href="/style/css/baocaonhap.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/template/admin/plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="/template/admin/plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="/template/admin/plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="/template/admin/plugins/simplemde/simplemde.min.css">
  {{-- favicons --}}
  <link rel="shortcut icon" href="/images/user/favicon.jpg" type="image/x-icon">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/manager/thuoc_vattu/dashboard/{{$idHealthFacility}}/{{$idMedicalStation}}" class="nav-link">Home</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <h2 class="text-info"> 
          {{$nameMedicalStation}}
        </h2>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('thuoc_vattu.layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
 
  <div class="content-wrapper">
    <div class="col" style="width: 100%;">
      @include('thuoc_vattu.layouts.alert')
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
            <h1>Phiếu thanh lý thuốc</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 mb-3">
            <form action="/manager/thuoc_vattu/thanhlythuoc/guiyeucau/{{$idHealthFacility}}/{{$idMedicalStation}}" method="post">
                @csrf
                    <div class="container-fluid">
                      <!-- SELECT2 EXAMPLE -->
                      <div class="card card-default">
                        <div class="card-header">
                          <h3 class="card-title"></h3>
              
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                  <span class="step">1</span>
                                  <label>Người lập phiếu: </label>
                                  <label for="">
                                    <input type="text" name="nguoilapphieu" id=""  placeholder="Người lập phiếu"><br>
                                  </label>
                                </div>
                            </div>
                              <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                  <span class="step">2</span>
                                  <label>Ngày lập phiếu:</label>
                                  <label for="">
                                    <input type="date" value="<?php echo date('Y-m-d')?>" name="ngaylap" id="">
                                  </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <span class="step">3</span>
                                <label>Số phiếu:</label>
                                <label for="">
                                  <input type="number" name="sophieu" id=""  placeholder="Số phiếu"><br>
                                </label>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <span class="step">4</span>
                                <label>Hủy tất cả thuốc với hạn dùng:</label>
                                <label for="">
                                  <input type="text" name="handung" id=""  placeholder="Hủy thuốc với hạn dùng" readonly value="Dưới 3 ngày"><br>
                                </label>
                              </div>
                            </div>
                          </div>
                          
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->

                      <div class="col-md-12">
                        <div class="card card-outline card-info">
                          <div class="card-header">
                            <h3 class="card-title">
                              Ghi chú
                            </h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <textarea name="ghichu" id="summernote">
                              Place <em>some</em> <u>text</u> <strong>here</strong>
                            </textarea>
                          </div>
                        </div>
                    </div>
                  <div class="col">
                     <button type="submit" style="width: 200px;"  class="btn btn-danger float-right mb-3">Gửi yêu cầu thanh lý</button>
                  </div>
                  <hr class="duongvien">

                  <section class="content">
                   <div class="container-fluid">
                     <p class="bold mr-2">- Hạn dùng:</p>
                     <label class="handung color_1">07 ngày</label>
                     <label class="handung color_2">15 ngày</label>
                     <label class="handung color_3">1 tháng</label>
                     <label class="handung color_4">2 tháng</label>
                     <label class="handung color_5">3 tháng</label>
                     <label class="handung color_6">6 tháng</label>
                   </div>
                   <div class="container-fluid">
                       <h5 class="font-weight-bold">* Hướng dẫn sử dụng</h5>
                       <ol>
                           <li class="danhsachhuongdan">Người lập phiếu không được để trống.</li>
                           <li class="danhsachhuongdan">Số phiếu nhập thuốc (Không được để trống).</li>
                           <li class="danhsachhuongdan">Ngày lập phiểu không được để trống.</li>
                           <li class="danhsachhuongdan">Ghi chú ghi thông tin cần thiết.</li>
                       </ol>
                       <h5 ><span class="font-weight-bold">* Chỉ tiêu lấy dữ liệu:</span> Tất các thuốc hết hạn sẽ được gửi đi chờ yêu cầu xác nhận hủy thuốc ở trung tâm y tế. Sau khi xác nhận thuốc sẽ được hủy khỏi dữ liệu.</h5>

                   </div>
                 </section>
            </form>
        </div>
    
        <!-- /.col-->
      </div>
   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->
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
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="/template/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="/template/admin/plugins/codemirror/codemirror.js"></script>
<script src="/template/admin/plugins/codemirror/mode/css/css.js"></script>
<script src="/template/admin/plugins/codemirror/mode/xml/xml.js"></script>
<script src="/template/admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/admin/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>
