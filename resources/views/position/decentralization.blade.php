@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- SESSION -->
        @if (Session::has('msgSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('msgSuccess') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('msgDanger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('msgDanger') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- SESSION -->

        <!-- BREADCRUMB -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-capitalize">phân quyền người dùng</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="text-capitalize">bảng điều khiển</a></li>
                            <li class="breadcrumb-item active text-capitalize"><a href="#" class="text-capitalize">quản lí người dùng</a></li>
                            <li class="breadcrumb-item active text-capitalize">phân quyền người dùng</li>
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
                        <div class="table-responsive p-0">
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Tên khu vực</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    Sở Y Tế
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td>
                                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                        Quản lí người dùng
                                                                    </td>
                                                                </tr>
                                                                <tr class="expandable-body">
                                                                    <td>
                                                                        <div class="p-0">
                                                                            <table class="table table-hover">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input class="custom-control-input" type="checkbox" id="userCheckAll" value="option1">
                                                                                                <label for="userCheckAll" class="custom-control-label">Toàn quyền</label>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input class="custom-control-input" type="checkbox" id="userCheckSee" value="option1">
                                                                                                <label for="userCheckSee" class="custom-control-label">Xem</label>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input class="custom-control-input" type="checkbox" id="userCheckAdd" value="option1">
                                                                                                <label for="userCheckAdd" class="custom-control-label">Thêm</label>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input class="custom-control-input" type="checkbox" id="userCheckDelete" value="option1">
                                                                                                <label for="userCheckDelete" class="custom-control-label">Xóa</label>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input class="custom-control-input" type="checkbox" id="userCheckLock-Unlock" value="option1">
                                                                                                <label for="userCheckLock-Unlock" class="custom-control-label">Khóa/Mở tài khoản</label>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input class="custom-control-input" type="checkbox" id="userCheckDecentralization" value="option1">
                                                                                                <label for="userCheckDecentralization" class="custom-control-label">Phân quyền</label>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#userCheckSee').change(function(e) {
                e.preventDefault();
                if(
                    this.checked == true &&
                    $('#userCheckAdd').prop('checked') == true && 
                    $('#userCheckDelete').prop('checked') == true && 
                    $('#userCheckLock-Unlock').prop('checked') == true && 
                    $('#userCheckDecentralization').prop('checked') == true){
                    $('#userCheckAll').prop('checked', true);
                }else if(this.checked == false){
                    $('#userCheckAll').prop('checked', false);
                }
            });

            $('#userCheckAdd').change(function(e) {
                e.preventDefault();
                if(
                    this.checked == true &&
                    $('#userCheckSee').prop('checked') == true && 
                    $('#userCheckDelete').prop('checked') == true && 
                    $('#userCheckLock-Unlock').prop('checked') == true && 
                    $('#userCheckDecentralization').prop('checked') == true){
                    $('#userCheckAll').prop('checked', true);
                }else if(this.checked == false){
                    $('#userCheckAll').prop('checked', false);
                }
            });

            $('#userCheckDelete').change(function(e) {
                e.preventDefault();
                if(
                    this.checked == true &&
                    $('#userCheckSee').prop('checked') == true && 
                    $('#userCheckAdd').prop('checked') == true && 
                    $('#userCheckLock-Unlock').prop('checked') == true && 
                    $('#userCheckDecentralization').prop('checked') == true){
                    $('#userCheckAll').prop('checked', true);
                }else if(this.checked == false){
                    $('#userCheckAll').prop('checked', false);
                }
            });

            $('#userCheckLock-Unlock').change(function(e) {
                e.preventDefault();
                if(
                    this.checked == true &&
                    $('#userCheckSee').prop('checked') == true && 
                    $('#userCheckAdd').prop('checked') == true && 
                    $('#userCheckDelete').prop('checked') == true && 
                    $('#userCheckDecentralization').prop('checked') == true){
                    $('#userCheckAll').prop('checked', true);
                }else if(this.checked == false){
                    $('#userCheckAll').prop('checked', false);
                }
            });

            $('#userCheckDecentralization').change(function(e) {
                e.preventDefault();
                if(
                    this.checked == true &&
                    $('#userCheckSee').prop('checked') == true && 
                    $('#userCheckAdd').prop('checked') == true && 
                    $('#userCheckDelete').prop('checked') == true && 
                    $('#userCheckLock-Unlock').prop('checked') == true){
                    $('#userCheckAll').prop('checked', true);
                }else if(this.checked == false){
                    $('#userCheckAll').prop('checked', false);
                }
            });

            $('#userCheckAll').change(function(e) {
                e.preventDefault();
                if(this.checked){
                    $('#userCheckSee').prop('checked', true);
                    $('#userCheckAdd').prop('checked', true);
                    $('#userCheckDelete').prop('checked', true);
                    $('#userCheckLock-Unlock').prop('checked', true);
                    $('#userCheckDecentralization').prop('checked', true);
                }else{
                    $('#userCheckSee').prop('checked', false);
                    $('#userCheckAdd').prop('checked', false);
                    $('#userCheckDelete').prop('checked', false);
                    $('#userCheckLock-Unlock').prop('checked', false);
                    $('#userCheckDecentralization').prop('checked', false);
                }
            });
        });
    </script>
@endsection
