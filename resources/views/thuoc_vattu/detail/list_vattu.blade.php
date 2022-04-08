@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary">Danh sách vật tư</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh sách nhà cung cấp</li>
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
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Số thứ tự</th>
                  <th>Tên vật tư y tế</th>
                  <th>Mã sản phẩm</th>
                  <th>Nhóm vật tư y tế</th>
                  <th>Số lượng</th>
                  <th>Hãng sở hữu</th>
                  <th>Giá niêm yết (VNĐ)</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($vattu as $vt)
                <tr>   
                  <th>{{$vt->id}}</th>
                  <th>{{$vt->tenvattu}}</th>
                  <th>{{$vt->mavattu}}</th>
                  <th>{{$vt->nhomvattu}}</th>
                  <th>{{$vt->soluong}}</th>
                  <th>{{$vt->hangsohuu}}</th>
                  <th>{{$vt->dongia}}</th>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Số thứ tự</th>
                  <th>Tên vật tư y tế</th>
                  <th>Mã sản phẩm</th>
                  <th>Nhóm vật tư y tế</th>
                  <th>Số lượng</th>
                  <th>Hãng sở hữu</th>
                  <th>Giá niêm yết (VNĐ)</th>
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
</div>s
@endsection