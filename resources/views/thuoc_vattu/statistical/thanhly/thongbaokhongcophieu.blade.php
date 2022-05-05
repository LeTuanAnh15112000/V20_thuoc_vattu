@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
        @if ($alert)
        <div class="row d-flex justify-content-center alert alert-success">
          không có phiếu lập được từ trạm y tế {{$nameMedicalStation}}
        </div>
        @endif
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
      </div>
    </div><!-- /.container-fluid -->
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
           <li class="danhsachhuongdan">Dữ liệu được gửi từ trạm y tế khi không có dữ liệu sẽ hiện trang thông báo không có phiếu xác nhận được gửi từ trạm y tế.</li>
       </ol>
       <h5 ><span class="font-weight-bold">* Chỉ tiêu lấy dữ liệu:</span> Dữ liệu được lấy từ trạm y tế gửi lên gồm thông tin người lập phiếu và danh sách thuốc hết hạn.</h5>

   </div>
 </section>
</div>    

@endsection