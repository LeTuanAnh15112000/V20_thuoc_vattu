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
          @foreach ($thanhlythuoc as $tlt)
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Thông tin người lập phiếu
                    
                <small class="float-right"><strong>Ngày lập phiếu :</strong>{{$tlt->ngaylap}}</small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <p class="text-dark"><strong>Số phiếu: </strong>{{$tlt->sophieu}} </p>
              <p class="text-dark"><strong>Họ tên người lập phiếu:</strong> {{$tlt->nguoilapphieu}}</p>
              <p class="text-dark"><strong>Ghi chú:</strong> {{$tlt->ghichu}}</p>
              <p class="text-dark"><strong>Trạng thái: {{$tlt->trangthai}}</strong> (0: chưa duyệt, 1: đã duyệt)</p>
            </div>
            <!-- /.col -->
          </div>            
          @endforeach
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
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
                      @foreach($medicine as $m)
                  <tr>
                          <th>{{$m->tenthuoc}}</th>
                          <th>{{$m->soluong}}</th>
                          <th>{{$m->hamluong}}</th>
                          <th>{{$m->dangtrinhbay}}</th>
                          <th>{{$m->dangtebao}}</th>
                          <th>{{$m->donvi}}</th>
                          <th>{{$m->dongia}}</th> 
                          <th>{{$m->hangsanxuat}}</th>
                          <th>{{$m->nuocsanxuat}}</th>
                          <th>
                            <?php
                            $date = date('2022-04-30');
                            $newdate = strtotime ( '+' .$m->handung. 'day' , strtotime ( $date ) ) ;
                            $newdate = date ( 'Y-m-j' , $newdate );
                            echo $newdate;
                            ?>
                          </th>
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
          <a href="/manager/thuoc_vattu/duyetphieu/{{$idHealthFacility}}/{{$idMedicalStation}}">
            <button type="button" style="width: 200px;"  class="btn btn-danger float-right js-thanhly">Duyệt phiếu</button>
          </a>
            <!-- /.card -->
         
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>    

@endsection