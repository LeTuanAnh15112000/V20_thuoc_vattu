
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
          <i class="fas fa-globe"></i>Thông tin kiểm nhập
          <small class="float-right">Danh sách thuốc được nhập từ: <strong>{{$ngaybatdau}}</strong>  đến <strong> {{$ngayketthuc}}</small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      @foreach ($thongtinnguoinhapthuoc as $thongtin)
      <div class="col-sm-4 invoice-col">
        <p class="text-dark mb-0"><strong>Số phiếu: </strong>{{$thongtin->sophieu}} </p>
        <p class="text-dark mb-0"><strong>Họ tên người lập phiếu:</strong> {{$thongtin->nguoilap}}</p>
        <p class="text-dark mb-0"><strong>Nguồn nhập:</strong> {{$thongtin->nguonnhap}}</p>
        <p class="text-dark mb-0"><strong>Ngày lập phiếu nhập:</strong> {{$thongtin->created_at}}</p>
        <p class="text-dark mb-0"><strong>Ghi chú:</strong> {{$thongtin->ghichu}}</p>
        <p class="text-dark mb-3"><strong>Trạng thái: {{$thongtin->trangthai}}</strong> (0: chưa duyệt, 1: đã duyệt)</p>
      </div>
      @endforeach

      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <h3 class="text-center">Danh sách thuốc đã nhập</h3>

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
            <th>Số phiếu</th>
          </tr>
          </thead>
          <tbody>
            @foreach($phieunhapthuocchitiet as $pntct)
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
                      <th>{{$pntct->sophieu}}</th>
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
