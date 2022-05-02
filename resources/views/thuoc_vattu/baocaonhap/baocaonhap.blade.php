@extends('thuoc_vattu.layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách nhập thuốc</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @foreach ($thongtinnguoinhapthuoc as $thongtin)
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Thông tin kiểm nhập
                    <small class="float-right">Danh sách thuốc đã nhập từ: <strong>{{$ngaybatdau}}</strong>  đến <strong> {{$ngayketthuc}} </strong></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <p class="text-dark mb-0"><strong>Số phiếu: </strong>{{$thongtin->sophieu}} </p>
                  <p class="text-dark mb-0"><strong>Họ tên người lập phiếu:</strong> {{$thongtin->nguoilap}}</p>
                  <p class="text-dark mb-0"><strong>Nguồn nhập:</strong> {{$thongtin->nguonnhap}}</p>
                  <p class="text-dark mb-0"><strong>Ngày lập phiếu nhập:</strong> {{$thongtin->created_at}}</p>
                  <p class="text-dark mb-0"><strong>Ghi chú:</strong> {{$thongtin->ghichu}}</p>
                  <p class="text-dark mb-3"><strong>Trạng thái: {{$thongtin->trangthai}}</strong> (0: chưa duyệt, 1: đã duyệt)</p>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              @endforeach

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
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
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12 float-right">
                  <a href="/manager/thuoc_vattu/inbaocaonhap/{{$idHealthFacility}}/{{$idMedicalStation}}/{{$ngaybatdau}}/{{$ngayketthuc}}" rel="noopener" target="_blank" class="btn btn-primary float-right"><i class="fas fa-print"></i> Print</a>
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
