@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        {{-- Thông báo --}}
        @include('notification')

        <!-- BREADCRUMB -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-capitalize">địa điểm y tế
                            {{-- @if (isset(Auth::user()->KHU_VUC_TRUC_THUOC))
                                ({{Auth::user()->KHU_VUC_TRUC_THUOC}})
                            @endif --}}
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="text-capitalize">bảng điều khiển</a></li>
                            <li class="breadcrumb-item active text-capitalize">địa điểm y tế</li>
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
                                {{-- @include('medical_location/add') --}}
                            </div>
                            <!-- THÊM -->

                            <!-- TÌM -->
                            <div class="col-auto mt-2">
                                <form class="row g-3" action="#" method="GET">
                                    @csrf
                                    <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="Tìm kiếm" name="ip_Search">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-3"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!-- TÌM -->
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Table List --}}
                        @hasrole('admin')
                            <div class="table-responsive p-0">
                                <table class="table table-head-fixed table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Tên khu vực</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departmentOfHealths as $departmentOfHealth)
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr data-widget="expandable-table" aria-expanded="false" class="departmentOfHealth" data="[{{$departmentOfHealth->id}}]">
                                                        <td>
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                            {{ $departmentOfHealth->ten_so }}
                                                        </td>
                                                    </tr>
                                                    <tr class="expandable-body">
                                                        <td>
                                                            <div class="p-0"  id="{{ 'medicalCenters'.$departmentOfHealth->id }}"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        @endhasrole
                        @hasrole('department_of_health')
                            <div class="table-responsive p-0 text-center">
                                <table class="table table-head-fixed table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên khu vực</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($medicalCenters))
                                            @foreach ($medicalCenters as $medicalCenter)
                                                <tr>
                                                    <td>{{ $medicalCenter->id }}</td>
                                                    <td>{{ $medicalCenter->TEN_TRUNG_TAM_Y_TE }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        
                                    </tbody>
                                </table>
                            </div>
                        @endhasrole
                        @hasrole('medical_center')
                            <div class="table-responsive p-0 text-center">
                                <table class="table table-head-fixed table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên khu vực</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userList">
                                        @foreach ($medicalStations as $medicalStation)
                                            <tr>
                                                <td>{{ $medicalStation->id }}</td>
                                                <td>{{ $medicalStation->ten_tram_y_te }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endhasrole
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
    </div>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.departmentOfHealth').click(function(e) {
                e.preventDefault();
                var statusSoYTe = $(this).attr('aria-expanded');
                if(statusSoYTe == 'false'){
                    var idDepartmentOfHealth = JSON.parse($(this).attr('data'))[0];
                    $.ajax({
                        type: "GET",
                        url: "/manager/health-facilities/index",
                        data:{
                            idDepartmentOfHealth:idDepartmentOfHealth
                        },
                        dataType: "json",
                        success: function(response) {
                            $('#medicalCenters'+response.idDepartmentOfHealth).html(response.output);
                            $('.medicalCenter').click(function(e) {
                                e.preventDefault();
                                var statusTrungTamYTe = $(this).attr('aria-expanded');
                                if(statusTrungTamYTe == 'false'){
                                    var idMedicalCenter = JSON.parse($(this).attr('data'))[0];
                                    $.ajax({
                                        type: "GET",
                                        url: "/manager/health-facilities/index",
                                        data:{
                                            idMedicalCenter:idMedicalCenter
                                        },
                                        dataType: "json",
                                        success: function(response) {
                                            $('#medicalStatus'+response.idMedicalCenter).html(response.output);
                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
