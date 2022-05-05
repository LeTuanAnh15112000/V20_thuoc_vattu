@extends('thuoc_vattu.layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style=" padding-bottom: 0;">
      <div class="container-fluid">
        <div class="row">
          <div class="col d-flex justify-content-center">
            @include('thuoc_vattu.layouts.alert')
          </div>
        </div>
      </div>
    </section>
    <section class="content-header" style=" padding-bottom: 0;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Báo cáo xuất</h1>
          </div>
          <div class="col-sm-6 float-right ">
            <a class="float-right " href="/manager/thuoc_vattu/bienbankiemxuat/{{$idHealthFacility}}/{{$idMedicalStation}}">
              <i class="fas fa-reply-all" style="font-size: 20px">Quay lại</i>
            </a>
          </div>
        </div>
      </div>
    </section>
    <hr class="duongvien">

    <section class="content">
        <div class="container-fluid">
          <p class="bold mr-2">- Hạn dùng:</p>
          <label class="handung color_1">07 ngày</label>
          <label class="handung color_2">15 ngày</label>
          <label class="handung color_3">1 tháng</label>
          <label class="handung color_4">2 tháng</label>
          <label class="handung color_5">3 tháng</label>
          <label class="handung color_6">6 tháng</label>
        </div>
        <div class="container-fluid">
            <h5 class="font-weight-bold">* Hướng dẫn sử dụng</h5>
            <ol>
                <li class="danhsachhuongdan">Khoản thời gian từ đến thời gian đến phải nằm tramg khoảng thời gian nhập thuôc vật tư.</li>
                <li class="danhsachhuongdan">Khi không có dữ liệu sẽ chuyển sang giao diện hiện với thông báo không có dữ liệu trong khoảng thời gian được chọn vui quay lại chọn lại thời gian.</li>
                <li class="danhsachhuongdan">Click vào icon quay lại để quay lại trang trước.</li>
            </ol>
            <h5 ><span class="font-weight-bold">* Chỉ tiêu lấy dữ liệu:</span> Dữ liệu được lấy từ thời gian từ ngày đến thời gian đến.</h5>
        </div>
      </section>
      <span  class="loader"></span>
  </div>

  @endsection
