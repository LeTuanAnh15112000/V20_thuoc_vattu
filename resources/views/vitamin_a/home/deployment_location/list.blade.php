@extends('vitamin_a.home.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- SESSION -->
        @include('notification')
        <!-- BREADCRUMB -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-capitalize">địa điểm triển khai</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="text-capitalize">bảng điều khiển</a></li>
                            <li class="breadcrumb-item active text-capitalize">địa điểm triển khai</li>
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
                        <table>
                            <thead>
                                <th>tên địa điểm triển khai</th>
                                <th>địa chỉ triển khai</th>
                                <th>mã hành chính</th>
                            </thead>
                            <tbody>
                                @foreach ($deploymentLocations as $deploymentLocation)
                                    <tr>
                                        <td>{{ $deploymentLocation->ten_dia_diem_trien_khai }}</td>
                                        <td>{{ $deploymentLocation->dia_chi_trien_khai }}</td>
                                        <td>
                                            {{ 
                                                $deploymentLocation->ma_tinh_trien_khai . '-' 
                                                . $deploymentLocation->ma_huyen_trien_khai . '-' 
                                                . $deploymentLocation->ma_xa_trien_khai
                                            }}
                                        </td>

                                    </tr>      
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
