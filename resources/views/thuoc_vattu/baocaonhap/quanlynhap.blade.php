@extends('thuoc_vattu.layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style=" padding-bottom: 0;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Báo cáo nhập</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <form action="/manager/thuoc_vattu/laybienbankiemnhap/{{$idHealthFacility}}/{{$idMedicalStation}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row d-flex justify-content-center">
            <table class="thoigian_baocaonhap">
                <tr>
                    <td>
                        <span class="step">1</span>
                        <label class="thang_bd" for="thang_bd">Ngày lọc: ngày lập<label></label></label>
                      </td>
                  <td>
                    <span class="step">2</span>
                    <label class="thang_bd" for="thang_bd">Từ:<label></label></label>
                  </td>
                  <td class=""><input type="date" name="ngaybatdau" required id=""></td>
                  <td>
                    <span class="step ml-3">3</span>
                    <label class="thang_bd" for="thang_bd">Từ:<label></label></label>
                  </td>
                  <td><input type="date" name="ngayketthuc" required id=""></td>
                </tr>
            </table>
        </div><!-- /.row -->
        <div class="row d-flex justify-content-center mt-3">
            <input type="submit" class="bg-primary laydanhsach" value="Lấy danh sách">
        </div>
      </form> 

        <hr class="duongvien">
      </div><!-- /.container-fluid -->
    </section>
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
                <li class="danhsachhuongdan">Báo cáo theo ngày nhập.</li>
                <li class="danhsachhuongdan">Thời gian từ ngày (Không được để trống).</li>
                <li class="danhsachhuongdan">Thời gian đến ngày (không được để trống).</li>
                <li class="danhsachhuongdan">Nút lấy dữ liệu: Lấy danh sách cần xem theo yêu cầu đã từ bộ lọc</li>
            </ol>
            <h5 ><span class="font-weight-bold">* Chỉ tiêu lấy dữ liệu:</span> Dữ liệu được lấy từ thời gian từ ngày đến thời gian đến.</h5>
        </div>
      </section>
  </div>

  @endsection
