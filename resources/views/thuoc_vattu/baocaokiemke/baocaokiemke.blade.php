@extends('thuoc_vattu.layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Báo cáo kiểm kê thuốc, vật tư</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{$nameMedicalStation}}
                    <small class="float-right">Ngày báo cáo kiểm kê: <?php echo date('Y/m/d') ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    Họ tên người báo cáo kiểm kê: {{ Auth::user()->cadresByUserAuth()->ho_ten }}<br>
                    Tên trạm y tế: {{$nameMedicalStation}}<br>
                    Địa chỉ trạm y tế: {{$diachi}}<br>
                    Ghi Chú : Số lượng thuốc và vật tư còn tại trạm y tế
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <h3 class="text-center">DANH SÁCH THUỐC</h3>
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Tên thuốc</th>
                      <th>Số lượng</th>
                      <th>Dạng trình bày</th>
                      <th>Đơn giá</th>
                      <th>Hãng sản xuất</th>
                      <th>Hạn dùng</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($medicial as $m)
                      <tr>
                        <td>{{$m->tenthuoc}}</td>
                        <td>{{$m->soluong}}</td>
                        <td>{{$m->dangtrinhbay}}</td>
                        <td>{{$m->dongia}}</td>
                        <td>{{$m->hangsanxuat}}</td>
                        <td>{{$m->handung}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="col-12 table-responsive">
                  <h3 class="text-center">DANH SÁCH VẬT TƯ</h3>
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Tên vật tư</th>
                      <th>Mã vật tư</th>
                      <th>Số lượng</th>
                      <th>Hãng sở hữu</th>
                      <th>Đơn giá</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($vattu as $vt)
                      <tr>
                        <td>{{$vt->tenvattu}}</td>
                        <td>{{$vt->mavattu}}</td>
                        <td>{{$vt->soluong}}</td>
                        <td>{{$vt->hangsohuu}}</td>
                        <td>{{$vt->dongia}}</td>
                      </tr>
                      @endforeach
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12 float-right">
                  <a href="/manager/thuoc_vattu/inbaocaokiemke/{{$idHealthFacility}}/{{$idMedicalStation}}" rel="noopener" target="_blank" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection
