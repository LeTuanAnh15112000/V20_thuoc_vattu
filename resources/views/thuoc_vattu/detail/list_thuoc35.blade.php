@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
  
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h5 class="card-title mr-3 mt-1 text-dark">Danh sách thuốc dưới 36 ngày</h5>
              <a href="/manager/thuoc_vattu/list_medicine65/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: rgb(204,0,204); padding: 0px 12px;">Dưới 65 ngày </button>

              </a>
              <a href="/manager/thuoc_vattu/list_medicine95/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: rgb(255,255,66);padding: 0px 12px;">Dưới 95 ngày </button>
              </a>
              <a href="/manager/thuoc_vattu/list_medicine125/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: rgb(204,204,0);padding: 0px 12px;">Dưới 125 ngày </button>
              </a>
            </div>
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
                        <th>{{$m->handung}}</th>
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
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection