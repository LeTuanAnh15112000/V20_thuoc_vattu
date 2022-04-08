<button type="button" class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#modalAdd">
    thêm bệnh nhân
</button>
<div class="modal fade" id="modalAdd">
    <div class="modal-dialog modal-xl">
        <form id="formAddPatient" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="staticBackdropLabel">thêm bệnh nhân</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="custom-control custom-checkbox checkbox-xl">
                                <input type="checkbox" class="custom-control-input" id="checkboxMeSauSinhMotThang" name="mSS">
                                <label class="custom-control-label" for="checkboxMeSauSinhMotThang">Mẹ sau sinh 1 tháng</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Họ và tên</label><span class="text-danger">(*)</span>
                            <input type="text" class="form-control" name="hoTen" placeholder="Nhập họ tên">
                            <span class="text-danger" id="errorHoTen"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Mã định danh V20</label>
                            <input type="text" class="form-control" name="maDinhDanhV20" placeholder="Nhập mã định danh V20">
                            <span class="text-danger" id="errorMaDinhDanhV20"></span>
                        </div>
                        <div class="col">
                            <label>Ngày sinh</label><span class="text-danger">(*)</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" data-inputmask-alias="datetime"
                                    data-date-format="dd-mm-yyyy" data-mask name="ngaySinh">
                            </div>
                            <span class="text-danger" id="errorNgaySinh"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Giới tính</label><span class="text-danger">(*)</span>
                            <select name="gioiTinh" id="gioiTinh" class="form-control text-capitalize">
                                <option value="">Chọn giới tính...</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <option value="3">Khác</option>
                            </select>
                            <span class="text-danger" id="errorGioiTinh"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Tỉnh hộ khẩu</label><span class="text-danger">(*)</span>
                            <select id="provicesHK" name="tinhHK" class="form-control text-capitalize select2bs4"></select>
                            <span class="text-danger" id="errorTinhHK"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Huyện hộ khẩu</label><span class="text-danger">(*)</span>
                            <select id="districtsHK" name="huyenHK" class="form-control text-capitalize select2bs4"></select>
                            <span class="text-danger" id="errorHuyenHK"></span>

                        </div>
                        <div class="col">
                            <label class="form-label">Phường/Xã hộ khẩu</label><span class="text-danger">(*)</span>
                            <select id="wardsHK" name="xaHK" class="form-control text-capitalize select2bs4"></select>
                            <span class="text-danger" id="errorXaHK"></span>

                        </div>
                        <div class="col">
                            <label class="form-label">Số nhà hộ khẩu</label><span class="text-danger">(*)</span>
                            <input type="text" class="form-control" name="soNhaHK" placeholder="Nhập số nhà hộ khẩu">
                            <span class="text-danger" id="errorSoNhaHK"></span>
                        </div>
                        <input type="hidden" name="hoKhau" id="hoKhau">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Tỉnh thường trú</label><span class="text-danger">(*)</span>
                            <select name="tinhTT" id="provicesTT" class="form-control text-capitalize select2bs4"></select>
                            <span class="text-danger" id="errorTinhTT"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Huyện thường trú</label><span class="text-danger">(*)</span>
                            <select name="huyenTT" id="districtsTT" class="form-control text-capitalize select2bs4"></select>
                            <span class="text-danger" id="errorHuyenTT"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Phường/Xã thường trú</label><span class="text-danger">(*)</span>
                            <select name="xaTT" id="wardsTT" class="form-control text-capitalize select2bs4"></select>
                            <span class="text-danger" id="errorXaTT"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">Số nhà thường trú</label><span class="text-danger">(*)</span>
                            <input type="text" class="form-control" name="soNhaTT" placeholder="Nhập số nhà thường trú">
                            <span class="text-danger" id="errorSoNhaTT"></span>
                        </div>
                        <input type="hidden" name="thuongTru" id="thuongTru">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Dân tộc</label><span class="text-danger">(*)</span>
                                <select name="danToc" class="form-control text-capitalize select2bs4" style="width: 100%;">
                                    <option value="">Chọn dân tộc...</option>
                                    {{-- <option value=""><input type="text" class="form-control"></option> --}}
                                    @foreach ($ethnics as $ethnic)
                                        <option value="{{ $ethnic->id }}">{{ $ethnic->ten_dan_toc }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger" id="errorDanToc"></span>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">mã hộ gia đình</label><span class="text-danger">(*)</span>
                            <input type="text" class="form-control" name="maHGD" placeholder="Nhập mã hộ gia đình">
                            <span class="text-danger" id="errorMaHGD"></span>
                        </div>
                        <div class="col">
                            <label class="form-label">quốc tịch</label><span class="text-danger">(*)</span>
                            <select name="quocTich" class="form-control text-capitalize select2bs4">
                                <option value="">Chọn quốc tịch...</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->ten_quoc_tich }}">{{ $country->ten_quoc_tich }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="errorQuocTich"></span>
                        </div>
                    </div>
                    {{-- Nhập thêm người chăm sóc nếu trẻ còn nhỏ --}}
                    <div id="inputNguoiChamSoc">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Tên người chăm sóc</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Tên người chăm sóc" name="tenNCS">
                                <span class="text-danger" id="errorTenNCS"></span>
                            </div>
                            <div class="col">
                                <label>Ngày sinh</label><span class="text-danger">(*)</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" data-inputmask-alias="datetime"
                                        data-date-format="dd-mm-yyyy" data-mask name="ngaySinhNCS">
                                </div>
                                <span class="text-danger" id="errorNgaySinhNCS"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">CMND/CCCD</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="CMND hoặc CCCD" name="cmndNCS">
                                <span class="text-danger" id="errorCMNDNCS"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Số điện thoại" name="sdtNCS">
                                <span class="text-danger" id="errorSDTNCS"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Email</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Nhập email" name="emailNCS">
                                <span class="text-danger" id="errorEmailNCS"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Quan hệ với bệnh nhân</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Nhập mối quan hệ với bệnh nhân" name="quanHeNCS">
                                <span class="text-danger" id="errorQuanHeNCS"></span>
                            </div>
                        </div>
                    </div>
                    {{-- Nhập thêm người chăm sóc nếu trẻ còn nhỏ --}}

                    {{-- Nhập thông tin mẹ sau sinh 1 tháng --}}
                    <div id="inputMeSauSinhMotThang">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">CMND/CCCD</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="CMND hoặc CCCD" name="cmndMSS">
                                <span class="text-danger" id="errorCMNDMSS"></span>
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Số điện thoại" name="sdtMSS">
                                <span class="text-danger" id="errorSDTMSS"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">Email</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" name="emailMSS" placeholder="Nhập email">
                                <span class="text-danger" id="errorEmailMSS"></span>
                            </div>
                            <div class="col">
                                <label class="form-label">đơn vị công tác</label>
                                <input type="text" class="form-control" name="dvctMSS" placeholder="Nhập đơn vị công tác">
                                <span class="text-danger" id="errorDVCTMSS"></span>
                            </div>
                        </div>
                    </div>
                    {{-- Nhập thông tin mẹ sau sinh 1 tháng --}}
                    <input type="hidden" name="idHealthFacility" value="{{ $healthFacilityById->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default text-capitalize" id="btnExitFormAddPatient" data-dismiss="modal">thoát</button>
                    <button type="submit" class="btn btn-primary text-capitalize">thêm</button>
                </div>
            </div>
        </form>
    </div>
</div>
