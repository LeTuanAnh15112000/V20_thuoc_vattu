@extends('layouts.app')
@section('content')
    <div class="content-wrapper">

        {{-- Session thông báo --}}
        @include('notification')

        <!-- BREADCRUMB -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-capitalize">quản lí người dùng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="text-capitalize">bảng điều khiển</a></li>
                            <li class="breadcrumb-item active text-capitalize">quản lí người dùng</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row mt-2">
                            <!-- THÊM -->
                            <div class="dropdown col-auto mt-2">
                                {{-- @include('user/add') --}}
                            </div>
                            <!-- THÊM -->

                            <!-- TÌM -->
                            <div class="col-auto mt-2">
                                <div class="col-auto">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm" name="ip_Search">
                                </div>
                            </div>
                            <!-- TÌM -->
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Table List --}}
                        <div class="table-responsive p-0">
                            @include('user.list')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
