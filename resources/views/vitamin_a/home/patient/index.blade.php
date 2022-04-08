@extends('vitamin_a.home.layouts.main')
@section('content')
    <div class="content-wrapper">

        {{-- Session thông báo --}}
        @include('notification')

        <input type="hidden" id="idHealthFacility" value="{{ $healthFacilityById->id }}">
        <!-- BREADCRUMB -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-capitalize">đối tượng (bệnh nhân)</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="text-capitalize">bảng điều khiển</a></li>
                            <li class="breadcrumb-item active text-capitalize">đối tượng (bệnh nhân)</li>
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
                                    <a href="{{ route('manager.vitamin-a.patient.get-file-excel-import') }}" type="button" class="btn btn-secondary">Lấy File Import Excel</a>
                                    {{-- Modal import excel --}}
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#formImportExcel">
                                        Excel Import
                                    </button>
                                    <div class="modal fade" id="formImportExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="importExcel" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="file" name="fileExcel" id="fileExcel">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                    <button type="submit" class="btn btn-primary">Import</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- Modal import excel --}}
                                    <script>
                                        
                                    </script>
                                    <a href="{{ route('manager.vitamin-a.patient.get-file-excel-export') }}" type="button" class="btn btn-secondary">Excel Export</a>
                                </div>
                                <a href="#" type="button" class="btn btn-secondary">PDF</a>
                            </div>
                            <!-- TÌM -->
                        </div>
                    </div>
                    <div class="card-body">

                        {{-- Table List --}}
                        <div class="table-responsive p-0">
                            @include('vitamin_a.home.patient.list')
                        </div>
                    </div>
                </div>
            </div>
            @include('vitamin_a.home.patient.edit')
        </section>
    </div>
    <script src="{{ asset('js/vitamin_a/patient.js') }}"></script>
@endsection
