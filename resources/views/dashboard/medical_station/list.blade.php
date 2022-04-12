@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        @include('notification')

        <!-- BREADCRUMB -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-capitalize">khu vực y tế ({{$medicalCenterById->ten_trung_tam_y_te}})</h1>
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
        <!-- BREADCRUMB -->

        {{-- <div class="col-auto mt-2">
            <div class="col-auto">
                <input type="text" class="form-control" placeholder="Tìm kiếm" id="searchDepartmentOfHealths">
            </div>
        </div> --}}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" id="departmentOfHealthList">
                @foreach ($medicalStationsByIdMedicalCenter as $medicalStation)
                    <div class="row">
                        <a href="{{ route('manager.dashboard.medical-station.statistical',['idMedicalStation'=>$medicalStation->id]) }}">{{ $medicalStation->ten_tram_y_te }}</a>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Main content -->
    </div>
    {{-- <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function getDepartmentOfHealth() {
                console.log('load');
                $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/manager/department-of-health/search",
                    data: {
                        searchDepartmentOfHealths: $('#searchDepartmentOfHealths').val(),
                    },
                    dataType: "json",
                    success: function(response) {
                        $('#departmentOfHealthList').html(response);
                    }
                });
            }

            getDepartmentOfHealth();

            $(document).on('keyup', '#searchDepartmentOfHealths', function(e) {
                e.preventDefault();
                getDepartmentOfHealth();
            });

        });
    </script> --}}

@endsection
