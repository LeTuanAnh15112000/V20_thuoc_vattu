
@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary">Danh sách thuốc cần thanh lý</h1>
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
                    @foreach($tenthuoc as $tt)
                <tr>
                        <th>{{$tt->tenthuoc}}</th>
                        <th>{{$tt->soluong}}</th>
                        <th>{{$tt->hamluong}}</th>
                        <th>{{$tt->dangtrinhbay}}</th>
                        <th>{{$tt->dangtebao}}</th>
                        <th>{{$tt->donvi}}</th>
                        <th>{{$tt->dongia}}</th> 
                        <th>{{$tt->hangsanxuat}}</th>
                        <th>{{$tt->nuocsanxuat}}</th>
                        <th>
                          <?php
                          $date = date('2022-04-30');
                          $newdate = strtotime ( '+' .$tt->handung. 'day' , strtotime ( $date ) ) ;
                          $newdate = date('Y-m-j' , $newdate );
                          echo $newdate;
                          ?>
                        </th>
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
              <button type="button" style="width: 200px;"  class="btn btn-danger float-right js-thanhly">Lập phiếu thanh lý</button>
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

{{-- model yeu yeu cau thành công --}}
<div class="modal">
  <div class="modal-container">
       <div class="modal-close">
          <i class="ti-close"></i>
       </div>
          <header class="modal-header">
             Bạn có chắc chán muốn lập phiếu thanh lý thuốc hết hạn không ?
          </header>
          <a href="/manager/thuoc_vattu/dashboard/{{$idHealthFacility}}/{{$idMedicalStation}}">
            <div class="d-flex justify-content-center mt-4">
              <a href="/manager/thuoc_vattu/guiyeucauthanhly/{{$idHealthFacility}}/{{$idMedicalStation}}">
              <button class="btn btn-danger">Đồng ý</button>
              </a>
              <a href="/manager/thuoc_vattu/thanhlythuochethan/{{$idHealthFacility}}/{{$idMedicalStation}}">
                <button class="btn btn-primary ml-2">Quay lại</button>
                </a>
            </div>
          </a>
          
      </div>
  </div>
</div> 


<script>
// ẩn button thanh lý thuốc sao khi cliick vào button hien buttun đã gửi lên



  // model
  var lickbtns=document.querySelector('.js-thanhly');
  var hiddenmodal=document.querySelector('.modal');
  var open=document.querySelector('.modal-close');

  var noibot=document.querySelector('.modal-container');
 

      lickbtns.onclick = function(){
          hiddenmodal.classList.add('open');
          console.log("123");
       }
         
  
  open.onclick = function(){
      hiddenmodal.classList.remove('open');
     
  }

  hiddenmodal.onclick = function(){
      hiddenmodal.classList.remove('open');
     
  }
  noibot.addEventListener('click', function(event){
      event.stopPropagation();
  })
</script>
@endsection