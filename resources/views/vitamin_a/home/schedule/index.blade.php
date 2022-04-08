@extends('vitamin_a.home.layouts.main')
@section('content')
    <div class="content-wrapper">

        {{-- Session thông báo --}}
        @include('notification')

        <!-- BREADCRUMB -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-capitalize">lịch triển khai uống vitamin A</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="text-capitalize">bảng điều khiển</a></li>
                            <li class="breadcrumb-item active text-capitalize">lịch triển khai uống vitamin A</li>
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
                                @include('vitamin_a/home/patient/add')
                            </div>
                            <!-- THÊM -->

                            <!-- TÌM -->
                            <div class="col-auto mt-2">
                                <div class="col-auto">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm" id="searchPatient">
                                </div>
                            </div>
                            <div class="col mt-2">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#" type="button" class="btn btn-secondary">Lấy File Import Excel</a>
                                    <button type="button" class="btn btn-secondary" id="excelImport">Excel Import</button>
                                    <form id="file" style="display: none;">
                                        <input type="file" id="importFile">
                                    </form>
                                    <script>
                                        $('#excelImport').on('click', function () {
                                            $('#importFile').trigger('click');
                                        });
                                    </script>
                                    <a href="#" type="button" class="btn btn-secondary">Excel Export</a>
                                </div>
                                <a href="#" type="button" class="btn btn-secondary">PDF</a>
                            </div>
                            <!-- TÌM -->
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Table List --}}
                        <div class="table-responsive p-0">
                            @include('vitamin_a.home.schedule.list')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
