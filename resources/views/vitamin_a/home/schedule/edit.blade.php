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
                        <h5 class="modal-title text-uppercase" id="staticBackdropLabel">sửa bệnh nhân</h5>
                    </div>
                    <div class="card-body">

                        {{-- Dữ liệu  
                            idMedicalStation
                            healthFacilityById
                            ethnics
                            countries
                            patientById
                            carerByIdPatient
                        --}}
                        <input type="hidden" id="dataPatientById" value="{{ '['.$patientById.']' }}">
                        <input type="hidden" id="dataCarerByIdPatient" value="{{ '['.$carerByIdPatient.']' }}">


                        <form class="formEditPatient" action="{{ route('manager.vitamin-a.patient.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-checkbox checkbox-xl">
                                        <input type="checkbox" class="custom-control-input" id="checkboxEditMSS" name="checkboxEditMSS">
                                        <label class="custom-control-label" for="checkboxEditMSS">Mẹ sau sinh 1
                                            tháng</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Họ và tên</label><span class="text-danger">(*)</span>
                                    <input type="text" class="form-control" name="editHoTen" placeholder="Nhập họ tên">
                                </div>
                                <div class="col">
                                    <label class="form-label">Mã định danh V20</label>
                                    <input type="text" class="form-control" name="editMaDinhDanhV20"
                                        placeholder="Nhập mã định danh V20">
                                </div>
                                <div class="col">
                                    <label>Ngày sinh</label><span class="text-danger">(*)</span>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" data-inputmask-alias="datetime"
                                            data-date-format="dd-mm-yyyy" data-mask name="editNgaySinh">
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-label">Giới tính</label><span class="text-danger">(*)</span>
                                    <select name="editGioiTinh" id="editGioiTinh" class="form-control text-capitalize">
                                        <option value="">Chọn giới tính...</option>
                                        <option value="1">Nam</option>
                                        <option value="2">Nữ</option>
                                        <option value="3">Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Tỉnh hộ khẩu</label><span
                                        class="text-danger">(*)</span>
                                    <select id="editProvicesHK" name="editProvicesHK"
                                        class="form-control text-capitalize select2bs4"></select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Huyện hộ khẩu</label><span
                                        class="text-danger">(*)</span>
                                    <select id="editDistrictsHK" name="editDistrictsHK"
                                        class="form-control text-capitalize select2bs4"></select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Phường/Xã hộ khẩu</label><span
                                        class="text-danger">(*)</span>
                                    <select id="editWardsHK" name="editWardsHK"
                                        class="form-control text-capitalize select2bs4"></select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Số nhà hộ khẩu</label><span
                                        class="text-danger">(*)</span>
                                    <input type="text" class="form-control" name="editSoNhaHK"
                                        placeholder="Nhập số nhà hộ khẩu">
                                </div>
                                <input type="hidden" name="editMaHoKhau" id="editMaHoKhau">
                                <input type="hidden" name="editHoKhau" id="editHoKhau">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span id="editShowHoKhau"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Tỉnh thường trú</label><span
                                        class="text-danger">(*)</span>
                                    <select name="editProvicesTT" id="editProvicesTT"
                                        class="form-control text-capitalize select2bs4"></select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Huyện thường trú</label><span
                                        class="text-danger">(*)</span>
                                    <select name="editDistrictsTT" id="editDistrictsTT"
                                        class="form-control text-capitalize select2bs4"></select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Phường/Xã thường trú</label><span
                                        class="text-danger">(*)</span>
                                    <select name="editWardsTT" id="editWardsTT"
                                        class="form-control text-capitalize select2bs4"></select>
                                </div>
                                <div class="col">
                                    <label class="form-label">Số nhà thường trú</label><span
                                        class="text-danger">(*)</span>
                                    <input type="text" class="form-control" name="editSoNhaTT"
                                        placeholder="Nhập số nhà thường trú">
                                </div>
                                <input type="hidden" name="editMaThuongTru" id="editMaThuongTru">
                                <input type="hidden" name="editThuongTru" id="editThuongTru">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span id="editShowThuongTru"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Dân tộc</label><span class="text-danger">(*)</span>
                                        <select name="editDanToc" class="form-control text-capitalize select2bs4"
                                            style="width: 100%;">
                                            <option value="">Chọn dân tộc...</option>
                                            {{-- <option value=""><input type="text" class="form-control"></option> --}}
                                            @foreach ($ethnics as $ethnic)
                                                <option value="{{ $ethnic->id }}">{{ $ethnic->ten_dan_toc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-label">mã hộ gia đình</label><span
                                        class="text-danger">(*)</span>
                                    <input type="text" class="form-control" name="editMaHGD"
                                        placeholder="Nhập mã hộ gia đình">
                                </div>
                                <div class="col">
                                    <label class="form-label">quốc tịch</label><span class="text-danger">(*)</span>
                                    <select name="editQuocTich" class="form-control text-capitalize select2bs4">
                                        <option value="">Chọn quốc tịch...</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->ten_quoc_tich }}">{{ $country->ten_quoc_tich }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- Nhập thêm người chăm sóc nếu trẻ còn nhỏ --}}
                            <div id="editNCS">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Tên người chăm sóc</label><span
                                            class="text-danger">(*)</span>
                                        <input type="text" class="form-control" placeholder="Tên người chăm sóc"
                                            name="editTenNCS">
                                    </div>
                                    <div class="col">
                                        <label>Ngày sinh</label><span class="text-danger">(*)</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" data-inputmask-alias="datetime"
                                                data-date-format="dd-mm-yyyy" data-mask name="editNgaySinhNCS">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">CMND/CCCD</label><span
                                            class="text-danger">(*)</span>
                                        <input type="text" class="form-control" placeholder="CMND hoặc CCCD"
                                            name="editCMNDNCS">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlInput1" class="form-label">Số điện
                                            thoại</label><span class="text-danger">(*)</span>
                                        <input type="text" class="form-control" placeholder="Số điện thoại"
                                            name="editSDTNCS">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Email</label><span class="text-danger">(*)</span>
                                        <input type="text" class="form-control" placeholder="Nhập email"
                                            name="editEmailNCS">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Quan hệ với bệnh nhân</label><span
                                            class="text-danger">(*)</span>
                                        <input type="text" class="form-control"
                                            placeholder="Nhập mối quan hệ với bệnh nhân" name="editQuanHeNCS">
                                    </div>
                                </div>
                            </div>
                            {{-- Nhập thêm người chăm sóc nếu trẻ còn nhỏ --}}

                            {{-- Nhập thông tin mẹ sau sinh 1 tháng --}}
                            <div id="editMSS">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">CMND/CCCD</label><span
                                            class="text-danger">(*)</span>
                                        <input type="text" class="form-control" placeholder="CMND hoặc CCCD"
                                            name="editCMNDMSS">
                                    </div>
                                    <div class="col">
                                        <label for="exampleFormControlInput1" class="form-label">Số điện
                                            thoại</label><span class="text-danger">(*)</span>
                                        <input type="text" class="form-control" placeholder="Số điện thoại"
                                            name="editSDTMSS">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Email</label><span class="text-danger">(*)</span>
                                        <input type="text" class="form-control" name="editEmailMSS"
                                            placeholder="Nhập email">
                                    </div>
                                    <div class="col">
                                        <label class="form-label">đơn vị công tác</label>
                                        <input type="text" class="form-control" name="editDVCTMSS"
                                            placeholder="Nhập đơn vị công tác">
                                    </div>
                                </div>
                            </div>

                            {{-- Nhập thông tin mẹ sau sinh 1 tháng --}}
                            <input type="hidden" name="editLoaiBenhNhan">
                            <input type="hidden" name="idPatient">
                            <input type="hidden" name="idHealthFacility" value="{{ $healthFacilityById->id }}">
                            <input type="hidden" name="idMedicalStation" value="{{ $idMedicalStation }}">
                            <input type="hidden" name="newHoKhau" id="newHoKhau">
                            <input type="hidden" name="newThuongTru" id="newThuongTru">

                            <div class="row mt-5">
                                <div class="col">
                                    <a onclick="history.back();" class="btn btn-default text-capitalize" id="btnExitFormEditPatient"
                                    data-dismiss="modal">thoát</a>
                                    <button type="submit" class="btn btn-primary text-capitalize">sửa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('js/vitamin_a/patient/edit.js') }}"></script>
@endsection
