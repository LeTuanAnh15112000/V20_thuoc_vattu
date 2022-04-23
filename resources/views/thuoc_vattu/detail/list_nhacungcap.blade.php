@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary">Danh sách nhà cung cấp</h1>
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
                  <th>TÊN NHÀ CUNG CẤP</th>
                  <th>TÊN VIẾT TẮT</th>
                  <th>ĐỊA CHỈ</th>
                  <th>EMAIL</th>
                  <th>MÃ SỐ THUẾ</th>
                  <th>WEBSITE</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($nhacungcap as $ncc)
                <tr>   
                  <th>{{$ncc->id}}</th>
                  <th>{{$ncc->tennhacungcap}}</th>
                  <th>{{$ncc->tenviettat}}</th>
                  <th>{{$ncc->diachi}}</th>
                  <th>{{$ncc->email}}</th>
                  <th>{{$ncc->masothue}}</th>
                  <th>{{$ncc->website}}</th>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>STT</th>
                  <th>TÊN NHÀ CUNG CẤP</th>
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