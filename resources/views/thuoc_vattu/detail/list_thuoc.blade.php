
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
              <a href="/manager/thuoc_vattu/list_medicine7/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn" style="background: rgb(255,122,122); padding: 0px 12px; ">< 7 ngày</button>
              </a>
              
              <a href="/manager/thuoc_vattu/list_medicine15/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: rgb(204,0,204); padding: 0px 12px;">< 15 ngày </button>
              </a>
              <a href="/manager/thuoc_vattu/list_medicine30/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: rgb(255,255,66); padding: 0px 12px;">< 1 tháng </button>
              </a>
              <a href="/manager/thuoc_vattu/list_medicine60/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: rgb(204,204,0); padding: 0px 12px;">< 2 tháng </button>
              </a>
              <a href="/manager/thuoc_vattu/list_medicine90/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: #00ff80; padding: 0px 12px;">< 3 tháng </button>
              </a>
              <a href="/manager/thuoc_vattu/list_medicine180/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button type="button" class="btn " style="background: #00cc00; padding: 0px 12px;">< 6 tháng </button>
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
                    @if($m->handung < 7)
                        <th style="background-color : rgb(255,122,122);">{{$m->tenthuoc}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->soluong}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->hamluong}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->dangtebao}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->donvi}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->dongia}}</th> 
                        <th style="background-color : rgb(255,122,122);">{{$m->hangsanxuat}}</th>
                        <th style="background-color : rgb(255,122,122);">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : rgb(255,122,122);">
                          <?php
                           $date = date('2022-04-30');
                          $newdate = strtotime ( '+' .$m->handung. 'day' , strtotime ( $date ) ) ;
                          $newdate = date ( 'Y-m-j' , $newdate );
                          echo $newdate;
                          ?>
                        </th>
                        @elseif($m->handung < 15 && $m->handung > 7)
                        <th style="background-color : rgb(204,0,204);">{{$m->tenthuoc}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->soluong}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->hamluong}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->dangtebao}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->donvi}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->dongia}}</th> 
                        <th style="background-color : rgb(204,0,204);">{{$m->hangsanxuat}}</th>
                        <th style="background-color : rgb(204,0,204);">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : rgb(204,0,204);">
                          <?php
                           $date = date('2022-04-30');
                          $newdate = strtotime ( '+' .$m->handung. 'day' , strtotime ( $date ) ) ;
                          $newdate = date ( 'Y-m-j' , $newdate );
                          echo $newdate;
                          ?>
                        </th>
                        @elseif($m->handung < 30 && $m->handung > 15)
                        <th style="background-color : rgb(255,255,66);">{{$m->tenthuoc}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->soluong}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->hamluong}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->dangtebao}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->donvi}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->dongia}}</th> 
                        <th style="background-color : rgb(255,255,66);">{{$m->hangsanxuat}}</th>
                        <th style="background-color : rgb(255,255,66);">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : rgb(255,255,66);">
                          <?php
                           $date = date('2022-04-30');
                          $newdate = strtotime ( '+' .$m->handung. 'day' , strtotime ( $date ) ) ;
                          $newdate = date ( 'Y-m-j' , $newdate );
                          echo $newdate;
                          ?>
                        </th>
                        @elseif($m->handung < 60 && $m->handung > 15)
                        <th style="background-color : rgb(204,204,0);">{{$m->tenthuoc}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->soluong}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->hamluong}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->dangtebao}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->donvi}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->dongia}}</th> 
                        <th style="background-color : rgb(204,204,0);">{{$m->hangsanxuat}}</th>
                        <th style="background-color : rgb(204,204,0);">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : rgb(204,204,0);">
                          <?php
                           $date = date('2022-04-30');
                          $newdate = strtotime ( '+' .$m->handung. 'day' , strtotime ( $date ) ) ;
                          $newdate = date ( 'Y-m-j' , $newdate );
                          echo $newdate;
                          ?>
                        </th>
                        @elseif($m->handung < 90 && $m->handung > 60)
                        <th style="background-color : #00ff80;">{{$m->tenthuoc}}</th>
                        <th style="background-color : #00ff80;">{{$m->soluong}}</th>
                        <th style="background-color : #00ff80;">{{$m->hamluong}}</th>
                        <th style="background-color : #00ff80;">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : #00ff80;">{{$m->dangtebao}}</th>
                        <th style="background-color : #00ff80;">{{$m->donvi}}</th>
                        <th style="background-color : #00ff80;">{{$m->dongia}}</th> 
                        <th style="background-color : #00ff80;">{{$m->hangsanxuat}}</th>
                        <th style="background-color : #00ff80;">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : #00ff80;">
                          <?php
                           $date = date('2022-04-30');
                          $newdate = strtotime ( '+' .$m->handung. 'day' , strtotime ( $date ) ) ;
                          $newdate = date ( 'Y-m-j' , $newdate );
                          echo $newdate;
                          ?>
                        </th>
                        @elseif($m->handung < 180 && $m->handung > 90)
                        <th style="background-color : #00cc00;">{{$m->tenthuoc}}</th>
                        <th style="background-color : #00cc00;">{{$m->soluong}}</th>
                        <th style="background-color : #00cc00;">{{$m->hamluong}}</th>
                        <th style="background-color : #00cc00;">{{$m->dangtrinhbay}}</th>
                        <th style="background-color : #00cc00;">{{$m->dangtebao}}</th>
                        <th style="background-color : #00cc00;">{{$m->donvi}}</th>
                        <th style="background-color : #00cc00;">{{$m->dongia}}</th> 
                        <th style="background-color : #00cc00;">{{$m->hangsanxuat}}</th>
                        <th style="background-color : #00cc00;">{{$m->nuocsanxuat}}</th>
                        <th style="background-color : #00cc00;">
                          <?php
                           $date = date('2022-04-30');
                          $newdate = strtotime ( '+' .$m->handung. 'day' , strtotime ( $date ) ) ;
                          $newdate = date ( 'Y-m-j' , $newdate );
                          echo $newdate;
                          ?>
                        </th>
                        
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
                        <th>
                          <?php
                           $date = date('2022-04-30');
                          $newdate = strtotime ( '+' .$m->handung. 'day' , strtotime ( $date ) ) ;
                          $newdate = date ( 'Y-m-j' , $newdate );
                          echo $newdate;
                          ?>
                        </th>
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