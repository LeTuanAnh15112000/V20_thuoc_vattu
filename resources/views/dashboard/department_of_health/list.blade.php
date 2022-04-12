@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        @include('notification')
        <!-- BREADCRUMB -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-capitalize">khu vực y tế (cấp sở)</h1>
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
        <!-- BREADCRUMB -->

        <div class="col-auto mt-2">
            <div class="col-auto">
                <input type="text" class="form-control" placeholder="Tìm kiếm" id="searchDepartmentOfHealths">
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid d-flex flex-wrap mt-3" id="departmentOfHealthList">
                @foreach ($departmentOfHealths as $departmentOfHealth)
                    <a href="{{ route('manager.dashboard.department-of-health.statistical',['idDepartmentOfHealth'=>$departmentOfHealth->id]) }}" class="col-lg-3 col-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fa-solid fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{ $departmentOfHealth->ten_so_y_te }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
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

            function getDepartmentOfHealths() {
                console.log('load');
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/manager/health-facilities/search",
                    data: {
                        searchKey: $('#searchDepartmentOfHealths').val(),
                    },
                    dataType: "json",
                    success: function(response) {
                        if(response.status == 200){
                            $('#departmentOfHealthList').html(response.output);
                        }else{
                            console.log(response.msgError);
                        }
                    }
                });
            }

            getDepartmentOfHealths();

            $(document).on('keyup', '#searchDepartmentOfHealths', function(e) {
                e.preventDefault();
                getDepartmentOfHealths();
            });

        });
    </script>
@endsection
