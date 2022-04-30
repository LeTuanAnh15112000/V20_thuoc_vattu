
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
      @foreach ($thongtinnguoinhapthuoc as $thongtin)

      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> Thông tin nhập thuốc
          <small class="float-right">Date: 2/10/2014</small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <div class="col-sm-4 invoice-col">
          <p class="text-dark mb-0" ><strong>Số phiếu: </strong>{{$thongtin->sophieu}} </p>
          <p class="text-dark mb-0"><strong>Họ tên người lập phiếu:</strong> {{$thongtin->nguoilap}}</p>
          <p class="text-dark mb-0"><strong>Nguồn nhập:</strong> {{$thongtin->nguonnhap}}</p>
          <p class="text-dark mb-0"><strong>Ngày nhập:</strong> {{$thongtin->ngaynhap}}</p>
          <p class="text-dark mb-0"><strong>Ghi chú:</strong> {{$thongtin->ghichu}}</p>
          <p class="text-dark mb-3"><strong>Trạng thái: {{$thongtin->trangthai}}</strong> (0: chưa duyệt, 1: đã duyệt)</p>
        </div>
      </div>
      @endforeach
      <!-- /.col -->
     
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      @foreach ($phieunhapthuocchitiet as $pntct)
          
      @endforeach
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Tên thuốc</th>
            <th>Số lượng</th>
            <th>Hàm lượng</th>
            <th>Dạng trình bày</th>
            <th>Dạng tế bào</th>
            <th>Đơn vị</th>
            <th>Đơn giá</th>
            <th>Hãng sản xuất</th>
            <th>Nước sản xuất</th>
            <th>Hạn dùng</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th>{{$pntct->tenthuoc}}</th>
            <th>{{$pntct->soluong}}</th>
            <th>{{$pntct->hamluong}}</th>
            <th>{{$pntct->dangtrinhbay}}</th>
            <th>{{$pntct->dangtebao}}</th>
            <th>{{$pntct->donvi}}</th>
            <th>{{$pntct->dongia}}</th> 
            <th>{{$pntct->hangsanxuat}}</th>
            <th>{{$pntct->nuocsanxuat}}</th>
            <th>{{$pntct->handung}}</th>
          </tr>
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
