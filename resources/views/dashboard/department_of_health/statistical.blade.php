@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        @include('notification')
        
        <!-- Header content -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thống kê ({{$departmentOfHealthById->ten_so_y_te}})</h1>
                            <a href="{{ route('manager.dashboard.medical-center.list',['idDepartmentOfHealth'=>$departmentOfHealthById->id]) }}" 
                                class="small-box-footer">
                                Trung tâm y tế <i class="fas fa-arrow-circle-right"></i>
                            </a>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Header content -->

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
                            @role('admin|department_of_health|medical_center|medical_station')
                                <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            @endrole
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

                {{-- 2 --}}
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4><b class="text-capitalize">bệnh truyền nhiễm</b></h4>
                                <h5>150</h5>
                                <p>ca mắc</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-virus"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4><b class="text-capitalize">tai nạn thương tích</b></h4>
                                <h5>150</h5>
                                <p>ca</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-wheelchair"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4><b class="text-capitalize">tài chính (thu/chi)</b></h4>
                                <h5>150.000/75.000</h5>
                                <p>đồng</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4><b class="text-capitalize">vitamin A</b></h4>
                                <h5>150</h5>
                                <p>lượt uống</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-capsules"></i>
                            </div>
                            @role('admin|department_of_health|medical_center')
                                <a href="{{ route('manager.vitamin-a.detail') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            @endrole
                            @role('medical_station')
                                <a href="{{ route('manager.vitamin-a.dashboard') }}" class="small-box-footer">Trang chủ <i class="fas fa-arrow-circle-right"></i></a>
                            @endrole
                        </div>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4><b class="text-capitalize">P/C suy dinh dưỡng</b></h4>
                                <h5>150</h5>
                                <p>người</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-child"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4><b class="text-capitalize">thuốc thiết yếu - VTYT</b></h4>
                                <h5>150</h5>
                                <p>đơn thuốc</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-microscope"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4><b class="text-capitalize">an toàn thực phẩm</b></h4>
                                <h5>150</h5>
                                <p>ca ngộ độc</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-burger"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4><b class="text-capitalize">tử vong</b></h4>
                                <h5>150</h5>
                                <p>ca</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-book-skull"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- 4 --}}
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4><b class="text-capitalize">Quản lý VS môi trường</b></h4>
                                <h5>150</h5>
                                <p>công trình</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-seedling"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4><b class="text-capitalize">Chăm sóc SK sinh sản</b></h4>
                                <h5>150</h5>
                                <p>trường hợp</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-hand-holding-medical"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4><b class="text-capitalize">Nhân lực</b></h4>
                                <h5>150</h5>
                                <p>người</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4><b class="text-capitalize">HIV/AIDS</b></h4>
                                <h5>150</h5>
                                <p>trường hợp</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-disease"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- 5 --}}
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h4><b>Tài sản thiết bị</b></h4>
                                <h5>150</h5>
                                <p>phiếu dự trù được duyệt</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-hospital"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h4><b>Truyền thông GD và SK</b></h4>
                                <h5>150</h5>
                                <p>đợt tuyên truyền</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h4><b>Khám chữa bệnh từ xa</b></h4>
                                <h5>150</h5>
                                <p>lượt</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-laptop-medical"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h4><b>Thống kê y tế</b></h4>
                                <h5>150</h5>
                                <p>?</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
