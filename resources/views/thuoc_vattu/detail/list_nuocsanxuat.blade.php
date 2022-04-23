@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary">Danh sách nước sản xuất</h1>
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
                  <th>STT</th>
                  <th>TÊN NƯỚC SẢN XUẤT</th>
                  <th>TÊN VIẾT TẮT</th>
                  <th>ĐỊA CHỈ</th>
                  <th>EMAIL</th>
                  <th>MÃ SỐ THUẾ</th>
                  <th>WEBSITE</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($nuocsanxuat as $nsx)
                <tr>   
                  <th>{{$nsx->id}}</th>
                  <th>{{$nsx->tennuocsanxuat}}</th>
                  <th>{{$nsx->tenviettat}}</th>
                  <th>{{$nsx->diachi}}</th>
                  <th>{{$nsx->email}}</th>
                  <th>{{$nsx->masothue}}</th>
                  <th>{{$nsx->website}}</th>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>STT</th>
                  <th>TÊN NƯỚC SẢN XUẤT</th>
                  <th>TÊN VIẾT TẮT</th>
                  <th>ĐỊA CHỈ</th>
                  <th>EMAIL</th>
                  <th>MÃ SỐ THUẾ</th>
                  <th>WEBSITE</th>
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