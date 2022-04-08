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
                        <h1 class="m-0 text-capitalize">cán bộ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#" class="text-capitalize">bảng điều khiển</a></li>
                            <li class="breadcrumb-item active text-capitalize">cán bộ</li>
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
                            <table class="table table-head-fixed table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="checkAll">
                                                <label for="checkAll" class="custom-control-label"></label>
                                            </div>
                                        </th>
                                        <th>Họ tên</th>
                                        <th>đơn vị công tác</th>
                                        <th>chức vụ</th>
                                        <th>chức danh</th>
                                        <th>chuyên ngành chính</th>
                                        <th>chuyên ngành phụ</th>
                                        <th>Tình trạng công tác</th>
                                        <th>loại nhân lực</th>

                                        <th>ngày sinh</th>
                                        <th>giới tính</th>
                                        <th>số điện thoại</th>
                                        {{-- khi click cmnd mở modal -> ngày cấp và nơi cấp --}}
                                        <th>số cmnd/cccd</th> 
                                        <th>địa chỉ thường trú</th>
                                        <th>địa chỉ hộ khẩu</th>
                                    </tr>
                                </thead>
                                <tbody id="cadresList">
                                    @foreach ($cadres as $itemcadres)
                                    <tr>
                                        <td>checkbox</td>
                                        <th>{{ $itemcadres->ho_ten }}</th>
                                        <th>
                                            @if (!isset($itemcadres->id_work_unit))
                                                <span class="badge badge-danger">Không có</span>
                                            @else
                                                <a style="cursor: pointer;"
                                                    data-toggle="modal" data-target="{{ '#detailWorkUnit' . $itemcadres->id }}">
                                                    {{ $itemcadres->workUnitOfCadres($itemcadres->id_work_unit)->ten_dvct }}
                                                </a>
                                                <div class="modal fade" id="{{ 'detailWorkUnit' . $itemcadres->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-uppercase"
                                                                    id="staticBackdropLabel">thông tin chi tiết đơn vị công tác</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>Địa chỉ: {{ 
                                                                            $itemcadres->workUnitOfCadres($itemcadres->id_work_unit)->dia_chi_dvct 
                                                                            .' ('.
                                                                                $itemcadres->workUnitOfCadres($itemcadres->id_work_unit)->ma_tinh_dvct . ' - ' .
                                                                                $itemcadres->workUnitOfCadres($itemcadres->id_work_unit)->ma_huyen_dvct . ' - ' .
                                                                                $itemcadres->workUnitOfCadres($itemcadres->id_work_unit)->ma_xa_dvct
                                                                            .')' 
                                                                            }}
                                                                        </p>
                                                                        <p>Ngày bắt đầu công tác: 
                                                                        {{ 
                                                                            date('d/m/Y', strtotime($itemcadres->workUnitOfCadres($itemcadres->id_work_unit)->ngay_bat_dau))
                                                                        }}
                                                                        </p>
                                                                        <p>Ngày kết thúc công tác: 
                                                                            @if (!isset($itemcadres->workUnitOfCadres($itemcadres->id_work_unit)->ngay_ket_thuc))
                                                                                chưa kết thúc
                                                                            @else
                                                                                {{ $itemcadres->workUnitOfCadres($itemcadres->id_work_unit)->ngay_ket_thuc }}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            @endif
                                        </th>
                                        <td>{{ $itemcadres->id_position }}</td>
                                        <td>{{ $itemcadres->id_title }}</td>
                                        <td>{{ $itemcadres->id_specialized }}</td>
                                        <td>{{ $itemcadres->id_sub_specialized }}</td>
                                        <td>{{ $itemcadres->id_sub_specialized }}</td>
                                        <td>{{ $itemcadres->tinh_trang_cong_tac }}</td>
                                        <td>{{ $itemcadres->loai_nhan_luc }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary text-uppercase"
                                                data-toggle="modal" data-target="{{ '#detail' . $itemcadres->id }}">
                                                <i class="fas fa-info-circle"></i>
                                            </button>
                                            <div class="modal fade" id="{{ 'detail' . $itemcadres->id }}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-uppercase"
                                                                id="staticBackdropLabel">thông tin chi tiết</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>Giới tính:
                                                                        @switch($itemcadres->gioi_tinh)
                                                                            @case(1)
                                                                                Nam
                                                                            @break

                                                                            @case(2)
                                                                                Nữ
                                                                            @break
                                                                            @case(3)
                                                                                Khác
                                                                            @break
                                                                        @endswitch
                                                                    </p>
                                                                    <p>Ngày
                                                                        sinh:{{ date('d/m/Y', strtotime($itemcadres->ngay_sinh)) }}
                                                                    </p>
                                                                    <p>CMND/CCCD:{{ $itemcadres->so_cmnd }}</p>
                                                                    <p>sdt:{{ $itemcadres->sdt }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
    </div>

    <!-- Button trigger modal -->
    <!-- Modal Delete -->
    

    
    <script>
        // $(document).ready(function() {
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     /* Load Users */
        //     function getUsers() {
        //         $.get("list", {},
        //             function(response, textStatus, jqXHR) {
        //                 $('#userList').html('');
        //                 $('#userList').append(response.output);
        //                 console.log('load');
        //             },
        //         );
        //     }

        //     getUsers();

        //     /* Ajax chọn tất cả */
        //     $('#checkAll').change(function(e) {
        //         e.preventDefault();
        //         if (this.checked) {
        //             console.log('Check All');
        //         }
        //     });

        //     /* Xử lí khóa tài khoản */
        //     $(document).on('click', '.btnLockAgree', function(e) {
        //         e.preventDefault();
        //         var idUser = JSON.parse($(this).attr('data'))[0];
        //         var status = JSON.parse($(this).attr('data'))[1];
        //         $.ajax({
        //             type: "POST",
        //             url: "update-status",
        //             data: {
        //                 idUser: idUser,
        //                 status: status
        //             },
        //             dataType: "json",
        //             success: function(response) {
        //                 if (response.status == 200) {
        //                     getUsers();
        //                     toastr.success(response.msgSuccess);
        //                     $('.btnLockDisagree').click();
        //                 } else {
        //                     toastr.success(response.msgError);
        //                 }
        //             }
        //         });
        //     });

        //     /* Xử lí mở khóa tài khoản */
        //     $(document).on('click', '.btnModalUnlock', function(e) {
        //         e.preventDefault();
        //         var idUser = JSON.parse($(this).attr('data'))[0];
        //         var status = JSON.parse($(this).attr('data'))[1];
        //         $.ajax({
        //             type: "POST",
        //             url: "update-status",
        //             data: {
        //                 idUser: idUser,
        //                 status: status
        //             },
        //             dataType: "json",
        //             success: function(response) {
        //                 if (response.status == 200) {
        //                     getUsers();
        //                     toastr.success(response.msgSuccess);
        //                 } else {
        //                     toastr.success(response.msgError);
        //                 }
        //             }
        //         });
        //     });
            
        //     /* Xóa */
        //     $(document).on('click', '.btnModalDelete', function(e) {
        //         e.preventDefault();
                
        //         $('.btnAgree').click(function (e) { 
        //             e.preventDefault();
        //             var idUser = JSON.parse($(this).attr('data'))[0];
        //             console.log(idUser);
        //             $.ajax({
        //                 url: "delete/" + idUser,
        //                 method: "GET",
        //                 success: function(response) {
        //                     console.log(response);
        //                     if (response.status == 200) {
        //                         getUsers();
        //                         toastr.success(response.msgSuccess);
        //                         $('.btnDisagree').click();
        //                     } else {
        //                         toastr.error(response.msgError);
        //                     }
        //                 }
        //             });
        //         });
        //     });

        //     /* Thực thi khóa/mở tài khoản */
        //     function ajaxUpdateStatus(idUser, status) {
        //         $.ajax({
        //             type: "POST",
        //             url: "update-status",
        //             data: {
        //                 idUser: idUser,
        //                 status: status
        //             },
        //             // cache:false,
        //             // processData:false,
        //             dataType: "json",
        //             success: function(response) {
        //                 if (response.status == 200) {
        //                     getUsers();
        //                     toastr.success(response.msgSuccess);
        //                 } else {
        //                     toastr.success(response.msgError);
        //                 }
        //             }
        //         });
        //     }

        //     /* Khóa/Mở tài khoản */
        //     $(document).on('submit', '.formUpdateStatus', function(e) {
        //         e.preventDefault();
        //         var idUser = JSON.parse($(this).attr('data'))[0];
        //         var status = JSON.parse($(this).attr('data'))[1];
        //         if (status == 1) {
        //             if (confirm('Bạn thật sự muốn khóa tài khoản này?')) {
        //                 ajaxUpdateStatus(idUser, status);
        //             }
        //         } else {
        //             ajaxUpdateStatus(idUser, status);
        //         }
        //     });
        // });
    </script>
@endsection
