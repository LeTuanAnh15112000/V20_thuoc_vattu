
@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-dark">Danh sách thuốc</h1>
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
            <div class="card-header">
              <h5 class="card-title mr-3 mt-1 text-danger" >HẠN DÙNG</h5>
              <a href="/manager/thuoc_vattu/list_medicine35/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn" style="background: rgb(255,122,122); padding: 0px 12px; ">< 35 ngày</button>
              </a>
              
              <a href="/manager/thuoc_vattu/list_medicine65/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: rgb(204,0,204); padding: 0px 12px;">< 65 ngày </button>
              </a>
              <a href="/manager/thuoc_vattu/list_medicine95/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: rgb(255,255,66); padding: 0px 12px;">< 95 ngày </button>
              </a>
              <a href="/manager/thuoc_vattu/list_medicine125/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: rgb(204,204,0); padding: 0px 12px;">< 125 ngày </button>
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
                <tr>
                    @foreach($medicine as $m)
                    @if($m->handung < 36)
                        <th style="background-color : rgb(255,122,122);">{{$m->tenthuoc}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->soluong}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->hamluong}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->dangtebao}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->donvi}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->dongia}}</th> 
                        <th style="background-color : rgb(255,122,122);">{{$m->hangsanxuat}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->handung}}</th>
                        @elseif($m->handung < 65 && $m->handung > 36)
                        <th style="background-color : rgb(204,0,204);">{{$m->tenthuoc}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->soluong}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->hamluong}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->dangtebao}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->donvi}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->dongia}}</th> 
                        <th style="background-color : rgb(204,0,204);">{{$m->hangsanxuat}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->handung}}</th>
                        @elseif($m->handung < 95 && $m->handung > 66)
                        <th style="background-color : rgb(255,255,66);">{{$m->tenthuoc}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->soluong}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->hamluong}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->dangtebao}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->donvi}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->dongia}}</th> 
                        <th style="background-color : rgb(255,255,66);">{{$m->hangsanxuat}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->handung}}</th>
                        @elseif($m->handung < 125 && $m->handung > 96)
                        <th style="background-color : rgb(204,204,0);">{{$m->tenthuoc}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->soluong}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->hamluong}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->dangtebao}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->donvi}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->dongia}}</th> 
                        <th style="background-color : rgb(204,204,0);">{{$m->hangsanxuat}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->handung}}</th>
                        
                    @else
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
                    @endif
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