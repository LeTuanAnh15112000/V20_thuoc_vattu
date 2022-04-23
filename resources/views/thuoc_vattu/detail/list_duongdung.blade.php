@extends('thuoc_vattu.layouts.main')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-primary">Danh sách đường dung</h1>
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
                  <th>MÃ ĐƯỜNG DÙNG</th>
                  <th>TÊN ĐƯỜNG DÙNG</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($duongdung as $dd)
                <tr>   
                  <th>{{$dd->id}}</th>
                  <th>{{$dd->tenduongdung}}</th>
                  <th>{{$dd->maduongdung}}</th>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>STTT</th>
                  <th>MÃ ĐƯỜNG DÙNG</th>
                  <th>TÊN ĐƯỜNG DÙNG</th>
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