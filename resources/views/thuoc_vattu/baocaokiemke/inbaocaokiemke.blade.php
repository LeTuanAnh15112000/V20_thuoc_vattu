
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> {{$nameMedicalStation}}
          <small class="float-right">Ngày báo cáo kiểm kê: <?php echo date('Y/m/d') ?></small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <address>
          Họ tên người báo cáo kiểm kê: {{ Auth::user()->cadresByUserAuth()->ho_ten }}<br>
          Tên trạm y tế: {{$nameMedicalStation}}<br>
          Địa chỉ trạm y tế: {{$diachi}}<br>
          Ghi Chú : Số lượng thuốc và vật tư còn tại trạm y tế
        </address>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <h3 class="text-center">DANH SÁCH THUỐC</h3>

        <table class="table table-striped">
          <thead>
          <tr>
            <th>Tên thuốc</th>
            <th>Số lượng</th>
            <th>Dạng trình bày</th>
            <th>Đơn giá</th>
            <th>Hãng sản xuất</th>
            <th>Hạn dùng</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($medicial as $m)
            <tr>
              <td>{{$m->tenthuoc}}</td>
              <td>{{$m->soluong}}</td>
              <td>{{$m->dangtrinhbay}}</td>
              <td>{{$m->dongia}}</td>
              <td>{{$m->hangsanxuat}}</td>
              <td>{{$m->handung}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="col-12 table-responsive">
        <h3 class="text-center">DANH SÁCH VẬT TƯ</h3>
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Tên vật tư</th>
            <th>Mã vật tư</th>
            <th>Số lượng</th>
            <th>Hãng sở hữu</th>
            <th>Đơn giá</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($vattu as $vt)
            <tr>
              <td>{{$vt->tenvattu}}</td>
              <td>{{$vt->mavattu}}</td>
              <td>{{$vt->soluong}}</td>
              <td>{{$vt->hangsohuu}}</td>
              <td>{{$vt->dongia}}</td>
            </tr>
            @endforeach
         
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
