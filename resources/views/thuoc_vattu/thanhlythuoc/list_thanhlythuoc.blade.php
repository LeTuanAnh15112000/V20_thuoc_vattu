
@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary">Danh sách thuốc cần thanh lý</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
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
                    @foreach($tenthuoc as $tt)
                <tr>
                        <th>{{$tt->tenthuoc}}</th>
                        <th>{{$tt->soluong}}</th>
                        <th>{{$tt->hamluong}}</th>
                        <th>{{$tt->dangtrinhbay}}</th>
                        <th>{{$tt->dangtebao}}</th>
                        <th>{{$tt->donvi}}</th>
                        <th>{{$tt->dongia}}</th> 
                        <th>{{$tt->hangsanxuat}}</th>
                        <th>{{$tt->nuocsanxuat}}</th>
                        <th>{{$tt->handung}}</th>
                </tr>
                   @endforeach
                </tbody>
                <tfoot>
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
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
        </div>
        <a href="/manager/thuoc_vattu/dashboard/{{$idHealthFacility}}/{{$idMedicalStation}}">

            <button type="button" onclick="xuly()" style="width: 200px;" class="btn btn-danger float-right">Thanh lý</button>
        </a>
          <!-- /.card -->
          <script>
            function xuly() {
              alert('Yêu cầu đã được gửi về trung tâm y tế long xuyên xin hãy chờ phê duyệt');
            }
            </script>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection