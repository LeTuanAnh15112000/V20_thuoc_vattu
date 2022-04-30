@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="text-dark">Danh sách {{$tenphanloai}}</h1>
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
                  <th>TÊN THUỐC</th>
                  <th>SỐ LƯỢNG</th>
                  <th>HÀM LƯỢNG</th>
                  <th>DẠNG TRÌNH BÀY</th>
                  <th>DẠNG TẾ BÀO</th>
                  <th>ĐƠN VỊ</th>
                  <th>ĐƠN GIÁ</th>
                  <th>HÃNG SẢN XUẤT</th>
                  <th>NƯỚC SẢN XUẤT</th>
                  <th>HẠN DÙNG</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($loaithuoc as $lt)
                <tr>
                        <th>{{$lt->tenthuoc}}</th>
                        <th>{{$lt->soluong}}</th>
                        <th>{{$lt->hamluong}}</th>
                        <th>{{$lt->dangtrinhbay}}</th>
                        <th>{{$lt->dangtebao}}</th>
                        <th>{{$lt->donvi}}</th>
                        <th>{{$lt->dongia}}</th> 
                        <th>{{$lt->hangsanxuat}}</th>
                        <th>{{$lt->nuocsanxuat}}</th>
                        <th>
                          <?php
                          $date = date('2022-04-30');
                          $newdate = strtotime ( '+' .$lt->handung. 'day' , strtotime ( $date ) ) ;
                          $newdate = date('Y-m-j' , $newdate );
                          echo $newdate;
                          ?>
                        </th>
                </tr>
                   @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>TÊN THUỐC</th>
                  <th>SỐ LƯỢNG</th>
                  <th>HÀM LƯỢNG</th>
                  <th>DẠNG TRÌNH BÀY</th>
                  <th>DẠNG TẾ BÀO</th>
                  <th>ĐƠN VỊ</th>
                  <th>ĐƠN GIÁ</th>
                  <th>HÃNG SẢN XUẤT</th>
                  <th>NƯỚC SẢN XUẤT</th>
                  <th>HẠN DÙNG</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
          <div class="col float-right">
            <a class="float-right" href="/manager/thuoc_vattu/phanloaithuoc/{{$idHealthFacility}}/{{$idMedicalStation}}">
              <i class="fas fa-reply-all" style="font-size: 20px">Quay lại danh sách phân loại</i>
            </a>
          </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection