@extends('vitamin_a.home.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- SESSION -->
        @include('notification')
        <!-- SESSION -->

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">bảng điều khiển ({{$healthFacilityById->ten_co_so_y_te}})</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">bảng điều khiển</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4><b class="text-capitalize">khám chữa bệnh</b></h4>
                                <h5>150</h5>
                                <p>lượt</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-medkit"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4><b class="text-capitalize">tiêm chủng</b></h4>
                                <h5>150</h5>
                                <p>lượt</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-syringe"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4><b class="text-capitalize">dân số</b></h4>
                                <h5>150</h5>
                                <p>người</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4><b class="text-capitalize">bệnh không lây nhiễm</b></h4>
                                <h5>150</h5>
                                <p>ca mắc</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
