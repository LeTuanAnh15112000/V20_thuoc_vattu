
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>
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
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style=" background: linear-gradient(135deg, rgba(0,158,195,1) 11%,rgba(0,158,195,1) 11%,rgba(0,158,195,1) 34%,rgba(0,158,195,1) 34%,rgba(0,158,195,1) 47%,rgba(0,158,195,1) 47%,rgba(0,158,195,1) 69%,rgba(0,183,234,1) 99%,rgba(39,136,180,1) 100%,rgba(0,183,234,1) 100%,rgba(0,183,234,1) 100%);">

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
        <h2 class="text-white"> 
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
    <!-- Content Header (Page header) -->
    <div class="row">
      <div class="col">
      </div>
    </div>
    <section class="content-header">
 
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Phiếu nhập thuốc chi tiết</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                </div>
                   <form action="/manager/thuoc_vattu/lapphieu/Add/{{$idHealthFacility}}/{{$idMedicalStation}}" method="post">
                       @csrf
                           <div class="container-fluid">
                             <!-- SELECT2 EXAMPLE -->
                             <div class="card card-default">
                               <div class="card-header">
                     
                                 <div class="card-tools">
                                   <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                     <i class="fas fa-minus"></i>
                                   </button>
                                 </div>
                               </div>
       
                               <!-- /.card-header -->
                               <div class="card-body">
                                 <div class="row ">
                                   <!-- /.col -->
                                   <div class="col-md-4">
                                     <div class="form-group" style="margin-bottom: 4px">
                                       <span class="step">1</span>
                                       <label>Ngày nhập: </label>
                                       <label for=""><input type="date" value="<?php echo date('Y-m-d') ?>" name="ngaynhap" id=""></label>
                                     </div>
                                   </div>
                                   <div class="col-md-4">
                                     <div class="form-group" style="margin-bottom: 4px">
                                       <span class="step">2</span>
                                       <label>Mã phiếu: </label>
                                       <label for="">
                                         <input type="number" value="" name="sophieu" id="">
                                       </label>
                                     </div>
                                   </div>
                                   <div class="col-md-4">
                                     <div class="form-group" style="margin-bottom: 4px">
                                       <span class="step">3</span>
                                       <label>Người lập phiếu: </label>
                                       <label for="">
                                         <input type="text" name="nguoilap" id="">
                                       </label>
                                     </div>
                                   </div>
                                 
                                     <div class="col-md-4" style="margin-bottom: 4px">
                                       <div class="form-group">
                                         <span class="step">4</span>
                                         <label class="step">Tên nguồn nhập: </label>
                                         <label for="">
                                           <select class="form-control select2" style="padding: 0px 1px; height: 29px;" name="nguonnhap" style="width: 100%;">
                                                @foreach ($nguonnhap as $nn)
                                                <option>{{$nn->tennguon}}</option>
                                                @endforeach
                                            </select>
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
                             <a  href="/manager/thuoc_vattu/lapdanhsachthuoc/{{$idHealthFacility}}/{{$idMedicalStation}}">
                               <button type="submit" class="btn btn-primary float-right mb-2">Kê tiếp</button>
                             </a>
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
                                    <li class="danhsachhuongdan">Lập phiếu nhập thuốc theo ngày nhập (Không được để chống) mặc định là ngày hiện tại.</li>
                                    <li class="danhsachhuongdan">Số phiếu nhập thuốc (Không được để trống).</li>
                                    <li class="danhsachhuongdan">Người lập phiếu (không được để trống).</li>
                                    <li class="danhsachhuongdan">Tên nguồn nhập (không được để trống).</li>
                                    <li class="danhsachhuongdan">Ghi chú ghi thông tin cần thiết.</li>
                                    <li class="danhsachhuongdan">Nút tiếp theo: Chuyển sang trang lập phiếu nhập (nhập danh sách thuốc cần nhập).</li>
                                </ol>
                            </div>
                          </section>
                      
                   </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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
