
@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary">Danh sách thuốc</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh sách thuốc</li>
          </ol>
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
              <h5 class="card-title mr-3 mt-2 text-danger">HẠN DÙNG</h5>
              <a href="/manager/thuoc_vattu/list_medicine35/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn btn-danger">Dưới 35 ngày</button>
              </a>
              
              <a href="/manager/thuoc_vattu/list_medicine65/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn btn-warning">Dưới 65 ngày </button>
              </a>
              <a href="/manager/thuoc_vattu/list_medicine95/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn btn-primary">Dưới 95 ngày </button>
              </a>
              <a href="/manager/thuoc_vattu/list_medicine125/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn btn-success">Dưới 125 ngày </button>
              </a>
            </div>
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
                <tr>
                    @foreach($medicine as $m)
                    @if($m->handung < 36)
                        <th style="background-color : #dc3545;">{{$m->tenthuoc}}</th>
                        <th style="background-color : #dc3545;">{{$m->soluong}}</th>
                        <th style="background-color : #dc3545;">{{$m->hamluong}}</th>
                        <th style="background-color : #dc3545;">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : #dc3545;">{{$m->dangtebao}}</th>
                        <th style="background-color : #dc3545;">{{$m->donvi}}</th>
                        <th style="background-color : #dc3545;">{{$m->dongia}}</th> 
                        <th style="background-color : #dc3545;">{{$m->hangsanxuat}}</th>
                        <th style="background-color : #dc3545;">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : #dc3545;">{{$m->handung}}</th>
                        @elseif($m->handung < 65 && $m->handung > 36)
                        <th style="background-color : #e0a800;">{{$m->tenthuoc}}</th>
                        <th style="background-color : #e0a800;">{{$m->soluong}}</th>
                        <th style="background-color : #e0a800;">{{$m->hamluong}}</th>
                        <th style="background-color : #e0a800;">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : #e0a800;">{{$m->dangtebao}}</th>
                        <th style="background-color : #e0a800;">{{$m->donvi}}</th>
                        <th style="background-color : #e0a800;">{{$m->dongia}}</th> 
                        <th style="background-color : #e0a800;">{{$m->hangsanxuat}}</th>
                        <th style="background-color : #e0a800;">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : #e0a800;">{{$m->handung}}</th>
                        @elseif($m->handung < 95 && $m->handung > 66)
                        <th style="background-color : #0069d9;">{{$m->tenthuoc}}</th>
                        <th style="background-color : #0069d9;">{{$m->soluong}}</th>
                        <th style="background-color : #0069d9;">{{$m->hamluong}}</th>
                        <th style="background-color : #0069d9;">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : #0069d9;">{{$m->dangtebao}}</th>
                        <th style="background-color : #0069d9;">{{$m->donvi}}</th>
                        <th style="background-color : #0069d9;">{{$m->dongia}}</th> 
                        <th style="background-color : #0069d9;">{{$m->hangsanxuat}}</th>
                        <th style="background-color : #0069d9;">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : #0069d9;">{{$m->handung}}</th>
                        @elseif($m->handung < 125 && $m->handung > 96)
                        <th style="background-color : #218838;">{{$m->tenthuoc}}</th>
                        <th style="background-color : #218838;">{{$m->soluong}}</th>
                        <th style="background-color : #218838;">{{$m->hamluong}}</th>
                        <th style="background-color : #218838;">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : #218838;">{{$m->dangtebao}}</th>
                        <th style="background-color : #218838;">{{$m->donvi}}</th>
                        <th style="background-color : #218838;">{{$m->dongia}}</th> 
                        <th style="background-color : #218838;">{{$m->hangsanxuat}}</th>
                        <th style="background-color : #218838;">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : #218838;">{{$m->handung}}</th>
                        
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