@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thông tin chi tiết</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          @foreach ($phieuxuat as $px)
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Thông tin người lập phiếu
                    
                <small class="float-right"><strong>Ngày lập phiếu :</strong>{{$px->ngayxuat}}</small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <p class="text-dark"><strong>Mã phiếu: </strong>{{$px->sophieu}} </p>
              <p class="text-dark"><strong>Họ tên người lập phiếu:</strong> {{$px->nguoilap}}</p>
              <p class="text-dark"><strong>Ghi chú:</strong> {{$px->ghichu}}</p>
              <p class="text-dark"><strong>Trạng thái: {{$px->trangthai}}</strong> (0: chưa duyệt, 1: đã duyệt)</p>
            </div>
            <!-- /.col -->
          </div>            
          @endforeach
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
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
                    @foreach($phieuxuatchitiet as $pxct)
                <tr>
                        <th>{{$pxct->tenthuoc}}</th>
                        <th>{{$pxct->soluong}}</th>
                        <th>{{$pxct->hamluong}}</th>
                        <th>{{$pxct->dangtrinhbay}}</th>
                        <th>{{$pxct->dangtebao}}</th>
                        <th>{{$pxct->donvi}}</th>
                        <th>{{$pxct->dongia}}</th> 
                        <th>{{$pxct->hangsanxuat}}</th>
                        <th>{{$pxct->nuocsanxuat}}</th>
                        <th>{{$pxct->handung}}</th>
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
        <a href="/manager/thuoc_vattu/duyetphieuxuat/{{$idHealthFacility}}/{{$idMedicalStation}}">
          <button type="button" style="width: 200px;"  class="btn btn-danger float-right js-thanhly">Duyệt phiếu</button>
        </a>
          <!-- /.card -->
       
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>    

@endsection