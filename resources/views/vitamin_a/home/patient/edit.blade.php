<button type="button" class="btn btn-primary text-uppercase btnModalEdit" data-toggle="modal" style="display: none;" data-target="#modalEdit">
    sửa bệnh nhân
</button>
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-xl">
        <form class="formEditPatient" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="staticBackdropLabel">sửa bệnh nhân</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="custom-control custom-checkbox checkbox-xl">
                                <input type="checkbox" class="custom-control-input" id="cbMSS" name="cbMSS">
                                <label class="custom-control-label" for="cbMSS">Mẹ sau sinh 1 tháng</label>
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
                            <input type="text" class="form-control" name="editMaDinhDanhV20" placeholder="Nhập mã định danh V20">
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
                            <label class="form-label">Tỉnh hộ khẩu</label><span class="text-danger">(*)</span>
                            <select id="editTinhHK" name="editTinhHK" class="form-control text-capitalize select2bs4"></select>
                        </div>
                        <div class="col">
                            <label class="form-label">Huyện hộ khẩu</label><span class="text-danger">(*)</span>
                            <select id="editHuyenHK" name="editHuyenHK" class="form-control text-capitalize select2bs4"></select>
                        </div>
                        <div class="col">
                            <label class="form-label">Phường/Xã hộ khẩu</label><span class="text-danger">(*)</span>
                            <select id="editXaHK" name="editXaHK" class="form-control text-capitalize select2bs4"></select>
                        </div>
                        <div class="col">
                            <label class="form-label">Số nhà hộ khẩu</label><span class="text-danger">(*)</span>
                            <input type="text" class="form-control" name="editSoNhaHK" placeholder="Nhập số nhà hộ khẩu">
                        </div>
                    </div>
                    {{-- Hiển thị thông tin địa chỉ hộ khẩu cũ --}}
                    <div class="row">
                        <div class="col">
                            <span id="editShowHoKhau"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Tỉnh thường trú</label><span class="text-danger">(*)</span>
                            <select name="editTinhTT" id="editTinhTT" class="form-control text-capitalize select2bs4"></select>
                        </div>
                        <div class="col">
                            <label class="form-label">Huyện thường trú</label><span class="text-danger">(*)</span>
                            <select name="editHuyenTT" id="editHuyenTT" class="form-control text-capitalize select2bs4"></select>
                        </div>
                        <div class="col">
                            <label class="form-label">Phường/Xã thường trú</label><span class="text-danger">(*)</span>
                            <select name="editXaTT" id="editXaTT" class="form-control text-capitalize select2bs4"></select>
                        </div>
                        <div class="col">
                            <label class="form-label">Số nhà thường trú</label><span class="text-danger">(*)</span>
                            <input type="text" class="form-control" name="editSoNhaTT" placeholder="Nhập số nhà thường trú">
                        </div>
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
                                <select name="editDanToc" id="editDanToc" class="form-control text-capitalize select2bs4" style="width: 100%;">
                                    <option value="">Chọn dân tộc...</option>
                                    {{-- <option value=""><input type="text" class="form-control"></option> --}}
                                    @foreach ($ethnics as $ethnic)
                                        <option value="{{ $ethnic->id }}">{{ $ethnic->ten_dan_toc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">mã hộ gia đình</label><span class="text-danger">(*)</span>
                            <input type="text" class="form-control" name="editMaHGD" placeholder="Nhập mã hộ gia đình">
                        </div>
                        <div class="col">
                            <label class="form-label">quốc tịch</label><span class="text-danger">(*)</span>
                            <select name="editQuocTich" class="form-control text-capitalize select2bs4">
                                <option value="">Chọn quốc tịch...</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->ten_quoc_tich }}">{{ $country->ten_quoc_tich }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Nhập thêm người chăm sóc nếu trẻ còn nhỏ --}}
                    <div id="editNCS">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Tên người chăm sóc</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Tên người chăm sóc" name="editTenNCS">
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
                                <label class="form-label">CMND/CCCD</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="CMND hoặc CCCD" name="editCMNDNCS">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Số điện thoại" name="editSDTNCS">
                            </div>
                            <div class="col">
                                <label class="form-label">Email</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Nhập email" name="editEmailNCS">
                            </div>
                            <div class="col">
                                <label class="form-label">Quan hệ với bệnh nhân</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Nhập mối quan hệ với bệnh nhân" name="editQuanHeNCS">
                            </div>
                        </div>
                    </div>
                    {{-- Nhập thêm người chăm sóc nếu trẻ còn nhỏ --}}

                    {{-- Nhập thông tin mẹ sau sinh 1 tháng --}}
                    <div id="editMSS">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">CMND/CCCD</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="CMND hoặc CCCD" name="editCMNDMSS">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" placeholder="Số điện thoại" name="editSDTMSS">
                            </div>
                            <div class="col">
                                <label class="form-label">Email</label><span class="text-danger">(*)</span>
                                <input type="text" class="form-control" name="editEmailMSS" placeholder="Nhập email">
                            </div>
                            <div class="col">
                                <label class="form-label">đơn vị công tác</label>
                                <input type="text" class="form-control" name="editDVCTMSS" placeholder="Nhập đơn vị công tác">
                            </div>
                        </div>
                    </div>
                    {{-- Nhập thông tin mẹ sau sinh 1 tháng --}}
                    {{-- Dữ liệu cũ --}}
                    <input type="hidden" name="editIdPatient" id="editIdPatient">
                    <input type="hidden" name="editIdHealthFacility" id="editIdHealthFacility" value="{{ $healthFacilityById->id }}">

                    <input type="hidden" name="editMaHoKhauCu" id="editMaHoKhauCu">
                    <input type="hidden" name="editDiaChiHoKhauCu" id="editDiaChiHoKhauCu">
                    <input type="hidden" name="editHoKhauMoi" id="editHoKhauMoi">

                    <input type="hidden" name="editMaThuongTruCu" id="editMaThuongTruCu">
                    <input type="hidden" name="editDiaChiThuongTruCu" id="editDiaChiThuongTruCu">
                    <input type="hidden" name="editThuongTruMoi" id="editThuongTruMoi">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default text-capitalize btnExitFormEdit" data-dismiss="modal">thoát</button>
                    <button type="submit" class="btn btn-primary text-capitalize">sửa</button>
                </div>
            </div>
        </form>
    </div>
</div>
