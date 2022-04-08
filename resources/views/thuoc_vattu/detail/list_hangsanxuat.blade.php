@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary">Danh sách hãng sản xuất</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh sách hãng sản xuất</li>
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
                  <th>Tên hãng sản xuất</th>
                  <th>Tên viết tắt</th>
                  <th>Địa chỉ</th>
                  <th>Email</th>
                  <th>Mã số thuế</th>
                  <th>Website</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($hangsanxuat as $hsx)
                <tr>   
                  <th>{{$hsx->id}}</th>
                  <th>{{$hsx->tenhangsanxuat}}</th>
                  <th>{{$hsx->tenviettat}}</th>
                  <th>{{$hsx->diachi}}</th>
                  <th>{{$hsx->email}}</th>
                  <th>{{$hsx->masothue}}</th>
                  <th>{{$hsx->website}}</th>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Số thứ tự</th>
                  <th>Tên hãng sản xuất</th>
                  <th>Tên viết tắt</th>
                  <th>Địa chỉ</th>
                  <th>Email</th>
                  <th>Mã số thuế</th>
                  <th>Website</th>
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