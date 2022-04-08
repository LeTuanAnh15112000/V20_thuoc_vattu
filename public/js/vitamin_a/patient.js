/* Load Tỉnh - Huyện - Xã hộ khẩu */
$(document).ready(function () {
    fetch('https://provinces.open-api.vn/api/?depth=3')
        .then(response => response.json())
        .then(
            provices => {
                /* Load danh sách tỉnh thành */
                var idPro = 0;
                var outputProvices = '<option value="">Chọn Tỉnh Thành...</option>';
                provices.forEach(provice => {
                    outputProvices += `<option value="[${idPro++},${provice.code}]" nameProvice="${provice.name}">${provice.name}</option>`
                }),
                $('#provicesHK').html(outputProvices)

                /* Xử lí sự kiện chọn Tỉnh */
                $('#provicesHK').change(function (e) {
                    e.preventDefault();

                    /* Load danh sách Huyện theo Tỉnh */
                    var idProvice = JSON.parse($('#provicesHK :selected').val())[0];
                    var codeProvice = JSON.parse($('#provicesHK :selected').val())[1];
                    

                    var districtsByIdProvice = provices[idProvice].districts;
                    var idDis = 0;
                    var outputDistricts = '<option value="">Chọn Huyện...</option>'
                    districtsByIdProvice.forEach(district => {
                        outputDistricts += `<option value="[${idDis++},${district.code}]" nameDistrict="${district.name}">${district.name}</option>`
                    })
                    $('#districtsHK').html(outputDistricts)

                    /* Xử lí sự kiện chọn Huyện */
                    $('#districtsHK').change(function (e) {
                        e.preventDefault();

                        /* Load danh sách Phường Xã theo Huyện */
                        var idDistrict = JSON.parse($('#districtsHK :selected').val())[0];
                        var codeDistrict = JSON.parse($('#districtsHK :selected').val())[1];
                        var wardsByIdDistrict = districtsByIdProvice[idDistrict].wards;
                        var outputWards = '<option value="">Chọn Phường, Xã...</option>';
                        var idWar = 0;
                        wardsByIdDistrict.forEach(ward => {
                            outputWards += `<option value="[${idWar++},${ward.code}]" nameWard="${ward.name}">${ward.name}</option>`
                        })
                        $('#wardsHK').html(outputWards)
                    })
                })
                /* Trả về các mã hành chính Tỉnh - Huyện - Xã */
                $('#wardsHK').change(function (e) {
                    e.preventDefault();
                    var codeProvice = JSON.parse($('#provicesHK').val())[1];
                    var codeDistrict = JSON.parse($('#districtsHK').val())[1];
                    var codeWard = JSON.parse($('#wardsHK').val())[1];
                    var nameProvice = $('#provicesHK :selected').attr('nameProvice');
                    var nameDistrict = $('#districtsHK :selected').attr('nameDistrict');
                    var nameWard = $('#wardsHK :selected').attr('nameWard');
                    $('#hoKhau').val(
                        `{
                            "provice":{
                                "code":${codeProvice},
                                "name":"${nameProvice}"
                            },
                            "district":{
                                "code":${codeDistrict},
                                "name":"${nameDistrict}"
                            },
                            "ward":{
                                "code":${codeWard},
                                "name":"${nameWard}"
                            }
                        }`
                    );
                })
            }
        )
});


/* Load Tỉnh - Huyện - Xã thường trú */
$(document).ready(function () {
    fetch('https://provinces.open-api.vn/api/?depth=3')
        .then(response => response.json())
        .then(
            provices => {
                /* Load danh sách tỉnh thành */
                var idPro = 0;
                var outputProvices = '<option value="">Chọn Tỉnh Thành...</option>';
                provices.forEach(provice => {
                    outputProvices += `<option value="[${idPro++},${provice.code}]" nameProvice="${provice.name}">${provice.name}</option>`
                }),
                    $('#provicesTT').html(outputProvices)

                /* Xử lí sự kiện chọn Tỉnh */
                $('#provicesTT').change(function (e) {
                    e.preventDefault();

                    /* Load danh sách Huyện theo Tỉnh */
                    var idProvice = JSON.parse($('#provicesTT :selected').val())[0];
                    var codeProvice = JSON.parse($('#provicesTT :selected').val())[1];
                    var districtsByIdProvice = provices[idProvice].districts;
                    var idDis = 0;
                    var outputDistricts = '<option value="">Chọn Huyện...</option>'
                    districtsByIdProvice.forEach(district => {
                        outputDistricts += `<option value="[${idDis++},${district.code}]" nameDistrict="${district.name}">${district.name}</option>`
                    })
                    $('#districtsTT').html(outputDistricts)

                    /* Xử lí sự kiện chọn Huyện */
                    $('#districtsTT').change(function (e) {
                        e.preventDefault();

                        /* Load danh sách Phường Xã theo Huyện */
                        var idDistrict = JSON.parse($('#districtsTT :selected').val())[0];
                        var codeDistrict = JSON.parse($('#districtsTT :selected').val())[1];
                        var wardsByIdDistrict = districtsByIdProvice[idDistrict].wards;
                        var outputWards = '<option value="">Chọn Phường, Xã...</option>';
                        var idWar = 0;
                        wardsByIdDistrict.forEach(ward => {
                            outputWards += `<option value="[${idWar++},${ward.code}]" nameWard="${ward.name}">${ward.name}</option>`
                        })
                        $('#wardsTT').html(outputWards)
                    })
                })
                /* Trả về các mã hành chính Tỉnh - Huyện - Xã */
                $('#wardsTT').change(function (e) {
                    e.preventDefault();
                    var codeProvice = JSON.parse($('#provicesTT').val())[1];
                    var codeDistrict = JSON.parse($('#districtsTT').val())[1];
                    var codeWard = JSON.parse($('#wardsTT').val())[1];
                    var nameProvice = $('#provicesTT :selected').attr('nameProvice');
                    var nameDistrict = $('#districtsTT :selected').attr('nameDistrict');
                    var nameWard = $('#wardsTT :selected').attr('nameWard');
                    $('#thuongTru').val(
                        `{
                            "provice":{
                                "code":${codeProvice},
                                "name":"${nameProvice}"
                            },
                            "district":{
                                "code":${codeDistrict},
                                "name":"${nameDistrict}"
                            },
                            "ward":{
                                "code":${codeWard},
                                "name":"${nameWard}"
                            }
                        }`
                    );
                })
            }
        )
});


$url = "http://127.0.0.1:8000/";


/* Xử lí show input Mẹ sau sinh 1 tháng */
$(document).ready(function () {
    $('#inputNguoiChamSoc').css({
        "display":"block"
    });
    $('#inputMeSauSinhMotThang').css({
        "display":"none"
    });
    

    $('#checkboxMeSauSinhMotThang').on('change', function(e){
        e.preventDefault();
        if($(this).prop('checked') == true){
            $('#inputMeSauSinhMotThang').css({
                "display":"block"
            });
            $('#inputNguoiChamSoc').css({
                "display":"none"
            });
            $('#gioiTinh').html(`
                <select name="gioiTinh" id="gioiTinh" class="form-control text-capitalize">
                    <option value="2">Nữ</option>
                </select>
            `);
        }else{
            $('#inputMeSauSinhMotThang').css({
                "display":"none"
            });
            $('#inputNguoiChamSoc').css({
                "display":"block"
            });
            $('#gioiTinh').html(`
                <select name="gioiTinh" id="gioiTinh" class="form-control text-capitalize">
                    <option value="">Chọn giới tính...</option>
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                    <option value="3">Khác</option>
                </select>
            `);
            
        }
    })
});

/* Load bệnh nhân */
function getPatients() {
    var idHealthFacility = $('#idHealthFacility').val();
    $.get($url + "manager/vitamin-a/patient/list/"+idHealthFacility, {},
        function (response, textStatus, jqXHR) {
            $('#patientList').html('');
            $('#patientList').append(response.output);
        },
    );
}

/* Xử lí thêm bệnh nhân */

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /* Load Patients */
    

    getPatients();

    /* Ajax chọn tất cả */
    $('#checkAll').change(function (e) {
        e.preventDefault();
        if (this.checked) {
            console.log('Check All');
        }
    });

    /* Xử lí thêm bệnh nhân */
    $(document).on('submit', '#formAddPatient', function (e) {
        e.preventDefault();
        let formData = new FormData($('#formAddPatient')[0]);
        $.ajax({
            type: "POST",
            url: $url + "manager/vitamin-a/patient/add",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (response) {
                if(response.status == 200){
                    getPatients();
                    // $('#btnExitFormAddPatient').trigger('click');
                    toastr.success(response.msgSuccess);
                    $('#formAddPatient')[0].reset();
                }else{
                    $('#errorHoTen').text(response.hoTen[0]);
                    // $('#errorMaDinhDanhV20').text(response.maDinhDanhV20[0]);
                    $('#errorNgaySinh').text(response.ngaySinh[0]);
                    $('#errorGioiTinh').text(response.gioiTinh[0]);
                    $('#errorTinhHK').text(response.tinhHK[0]);
                    $('#errorHuyenHK').text(response.huyenHK[0]);
                    $('#errorXaHK').text(response.xaHK[0]);
                    $('#errorSoNhaHK').text(response.soNhaHK[0]);
                    $('#errorTinhTT').text(response.tinhTT[0]);
                    $('#errorHuyenTT').text(response.huyenTT[0]);
                    $('#errorXaTT').text(response.xaTT[0]);
                    $('#errorSoNhaTT').text(response.soNhaTT[0]);
                    $('#errorDanToc').text(response.danToc[0]);
                    $('#errorMaHGD').text(response.maHGD[0]);
                    $('#errorQuocTich').text(response.quocTich[0]);
                    $('#errorTenNCS').text(response.tenNCS[0]);
                    $('#errorNgaySinhNCS').text(response.ngaySinhNCS[0]);
                    $('#errorCMNDNCS').text(response.cmndNCS[0]);
                    $('#errorSDTNCS').text(response.sdtNCS[0]);
                    $('#errorEmailNCS').text(response.emailNCS[0]);
                    $('#errorQuanHeNCS').text(response.quanHeNCS[0]);
                    $('#errorCMNDMSS').text(response.cmndMSS[0]);
                    $('#errorSDTMSS').text(response.sdtMSS[0]);
                    $('#errorEmailMSS').text(response.emailMSS[0]);
                    $('#errorDVCTMSS').text(response.dvctMSS[0]);
                }
            }
        });
    });
});

/* Edit */
$(document).ready(function () {
    fetch('https://provinces.open-api.vn/api/?depth=3')
        .then(response => response.json())
        .then(
            provices => {
                /* Load danh sách tỉnh thành */
                var idPro = 0;
                var outputProvices = '<option value="">Chọn Tỉnh Thành...</option>';
                provices.forEach(provice => {
                    outputProvices += `<option value="[${idPro++},${provice.code}]" nameProvice="${provice.name}">${provice.name}</option>`
                }),
                $('#editTinhHK').html(outputProvices)

                /* Xử lí sự kiện chọn Tỉnh */
                $('#editTinhHK').change(function (e) {
                    e.preventDefault();

                    /* Load danh sách Huyện theo Tỉnh */
                    var idProvice = JSON.parse($('#editTinhHK :selected').val())[0];
                    var codeProvice = JSON.parse($('#editTinhHK :selected').val())[1];
                    

                    var districtsByIdProvice = provices[idProvice].districts;
                    var idDis = 0;
                    var outputDistricts = '<option value="">Chọn Huyện...</option>'
                    districtsByIdProvice.forEach(district => {
                        outputDistricts += `<option value="[${idDis++},${district.code}]" nameDistrict="${district.name}">${district.name}</option>`
                    })
                    $('#editHuyenHK').html(outputDistricts)

                    /* Xử lí sự kiện chọn Huyện */
                    $('#editHuyenHK').change(function (e) {
                        e.preventDefault();

                        /* Load danh sách Phường Xã theo Huyện */
                        var idDistrict = JSON.parse($('#editHuyenHK :selected').val())[0];
                        var codeDistrict = JSON.parse($('#editHuyenHK :selected').val())[1];
                        var wardsByIdDistrict = districtsByIdProvice[idDistrict].wards;
                        var outputWards = '<option value="">Chọn Phường, Xã...</option>';
                        var idWar = 0;
                        wardsByIdDistrict.forEach(ward => {
                            outputWards += `<option value="[${idWar++},${ward.code}]" nameWard="${ward.name}">${ward.name}</option>`
                        })
                        $('#editXaHK').html(outputWards)
                    })
                })
                /* Trả về các mã hành chính Tỉnh - Huyện - Xã */
                $('#editXaHK').change(function (e) {
                    e.preventDefault();
                    var codeProvice = JSON.parse($('#editTinhHK').val())[1];
                    var codeDistrict = JSON.parse($('#editHuyenHK').val())[1];
                    var codeWard = JSON.parse($('#editXaHK').val())[1];
                    var nameProvice = $('#editTinhHK :selected').attr('nameProvice');
                    var nameDistrict = $('#editHuyenHK :selected').attr('nameDistrict');
                    var nameWard = $('#editXaHK :selected').attr('nameWard');
                    $('#editHoKhauMoi').val(
                        `{
                            "provice":{
                                "code":${codeProvice},
                                "name":"${nameProvice}"
                            },
                            "district":{
                                "code":${codeDistrict},
                                "name":"${nameDistrict}"
                            },
                            "ward":{
                                "code":${codeWard},
                                "name":"${nameWard}"
                            }
                        }`
                    );
                })
            }
        )
});

$(document).ready(function () {
    fetch('https://provinces.open-api.vn/api/?depth=3')
        .then(response => response.json())
        .then(
            provices => {
                /* Load danh sách tỉnh thành */
                var idPro = 0;
                var outputProvices = '<option value="">Chọn Tỉnh Thành...</option>';
                provices.forEach(provice => {
                    outputProvices += `<option value="[${idPro++},${provice.code}]" nameProvice="${provice.name}">${provice.name}</option>`
                }),
                $('#editTinhTT').html(outputProvices)

                /* Xử lí sự kiện chọn Tỉnh */
                $('#editTinhTT').change(function (e) {
                    e.preventDefault();

                    /* Load danh sách Huyện theo Tỉnh */
                    var idProvice = JSON.parse($('#editTinhTT :selected').val())[0];
                    var codeProvice = JSON.parse($('#editTinhTT :selected').val())[1];
                    

                    var districtsByIdProvice = provices[idProvice].districts;
                    var idDis = 0;
                    var outputDistricts = '<option value="">Chọn Huyện...</option>'
                    districtsByIdProvice.forEach(district => {
                        outputDistricts += `<option value="[${idDis++},${district.code}]" nameDistrict="${district.name}">${district.name}</option>`
                    })
                    $('#editHuyenTT').html(outputDistricts)

                    /* Xử lí sự kiện chọn Huyện */
                    $('#editHuyenTT').change(function (e) {
                        e.preventDefault();

                        /* Load danh sách Phường Xã theo Huyện */
                        var idDistrict = JSON.parse($('#editHuyenTT :selected').val())[0];
                        var codeDistrict = JSON.parse($('#editHuyenTT :selected').val())[1];
                        var wardsByIdDistrict = districtsByIdProvice[idDistrict].wards;
                        var outputWards = '<option value="">Chọn Phường, Xã...</option>';
                        var idWar = 0;
                        wardsByIdDistrict.forEach(ward => {
                            outputWards += `<option value="[${idWar++},${ward.code}]" nameWard="${ward.name}">${ward.name}</option>`
                        })
                        $('#editXaTT').html(outputWards)
                    })
                })
                /* Trả về các mã hành chính Tỉnh - Huyện - Xã */
                $('#editXaTT').change(function (e) {
                    e.preventDefault();
                    var codeProvice = JSON.parse($('#editTinhTT').val())[1];
                    var codeDistrict = JSON.parse($('#editHuyenTT').val())[1];
                    var codeWard = JSON.parse($('#editXaTT').val())[1];
                    var nameProvice = $('#editTinhTT :selected').attr('nameProvice');
                    var nameDistrict = $('#editHuyenTT :selected').attr('nameDistrict');
                    var nameWard = $('#editXaTT :selected').attr('nameWard');
                    $('#editThuongTruMoi').val(
                        `{
                            "provice":{
                                "code":${codeProvice},
                                "name":"${nameProvice}"
                            },
                            "district":{
                                "code":${codeDistrict},
                                "name":"${nameDistrict}"
                            },
                            "ward":{
                                "code":${codeWard},
                                "name":"${nameWard}"
                            }
                        }`
                    );
                })
            }
        )
});


$(document).ready(function () {
    $('#cbMSS').on('change', function(e){
        e.preventDefault();
        if($(this).prop('checked') == true){
            $('#editMSS').css({"display":"block"});
            $('#editNCS').css({"display":"none"});
            $('#editGioiTinh').html(`
                <select name="gioiTinh" id="gioiTinh" class="form-control text-capitalize">
                    <option value="2">Nữ</option>
                </select>
            `);
        }else{
            $('#editMSS').css({"display":"none"});
            $('#editNCS').css({"display":"block"});

            var idPatient = $('.btnFormEdit').attr('id-patient');
            var idHealthFacility = $('#idHealthFacility').val();
            $.get($url + "manager/vitamin-a/patient/patient-by-id", {idPatient:idPatient, idHealthFacility:idHealthFacility},
                function (response, textStatus, jqXHR) {
                    var patientById = response.patientById;
                    var carerByIdPatient = response.carerByIdPatient;

                    $('#editGioiTinh').html(`
                        <select name="editGioiTinh" id="editGioiTinh" class="form-control text-capitalize">
                            <option value="">Chọn giới tính...</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                            <option value="3">Khác</option>
                        </select>
                    `);
                    $('#editGioiTinh').val(patientById.gioi_tinh);
                }
            );
        }
    })
});

function loadCheckBoxMeSauSinh(patientById, carerByIdPatient){
    if (patientById.loai_benh_nhan == 4) {
        $('#cbMSS').prop('checked',true);
        $('#editMSS').css({"display": "block"});
        $('#editNCS').css({"display": "none"});
        $('#editGioiTinh').html(`
            <select name="editGioiTinh" id="editGioiTinh" class="form-control text-capitalize">
                <option value="2">Nữ</option>
            </select>
        `);
        $('[name=editCMNDMSS]').val(patientById.cmnd);
        $('[name=editSDTMSS]').val(patientById.sdt);
        $('[name=editEmailMSS]').val(patientById.email);
        $('[name=editDVCTMSS]').val(patientById.don_vi_cong_tac);
    }else{
        $('#cbMSS').prop('checked',false);
        $('#editMSS').css({ "display": "none" });
        $('#editNCS').css({ "display": "block" });
        $('#editGioiTinh').html(`
            <select name="editGioiTinh" id="editGioiTinh" class="form-control text-capitalize">
                <option value="">Chọn giới tính...</option>
                <option value="1">Nam</option>
                <option value="2">Nữ</option>
                <option value="3">Khác</option>
            </select>
        `);
        $('[name=editGioiTinh]').val(patientById.gioi_tinh);
        $('[name=editTenNCS]').val(carerByIdPatient.ten_ncs);
        $('[name=editNgaySinhNCS]').val(carerByIdPatient.nam_sinh_ncs);
        $('[name=editCMNDNCS]').val(carerByIdPatient.cmnd_ncs);
        $('[name=editSDTNCS]').val(carerByIdPatient.sdt_ncs);
        $('[name=editEmailNCS]').val(carerByIdPatient.email_ncs);
        $('[name=editQuanHeNCS]').val(carerByIdPatient.quan_he_voi_benh_nhan);
    }
}

$(document).on('click', '.btnFormEdit', function(e){
    e.preventDefault();
    var idPatient = $(this).attr('id-patient');
    var idHealthFacility = $('#idHealthFacility').val();
    $('.btnModalEdit').trigger('click');
    $.get($url + "manager/vitamin-a/patient/patient-by-id", {idPatient:idPatient, idHealthFacility:idHealthFacility},
        function (response, textStatus, jqXHR) {
            var patientById = response.patientById;
            var carerByIdPatient = response.carerByIdPatient;
            
            $('[name=editHoTen]').val(patientById.ho_va_ten);
            $('[name=editMaDinhDanhV20]').val(patientById.ma_dinh_danh_v20);
            $('[name=editNgaySinh]').val(patientById.ngay_sinh);
            $('[name=editMaHoKhauCu]').val(`
                {
                    "tinhHK":${patientById.hk_ma_tinh},
                    "huyenHK":${patientById.hk_ma_huyen},
                    "xaHK":${patientById.hk_ma_xa}
                }
            `);
            $('[name=editDiaChiHoKhauCu]').val(patientById.hk_dia_chi);
            $('#editShowHoKhau').html(`<b>Địa chỉ hộ khẩu: </b>${patientById.hk_dia_chi} (${patientById.hk_ma_tinh}-${patientById.hk_ma_huyen}-${patientById.hk_ma_xa})`);
            $('[name=editMaThuongTruCu]').val(`
                {
                    "tinhTT":${patientById.tt_ma_tinh},
                    "huyenTT":${patientById.tt_ma_huyen},
                    "xaTT":${patientById.tt_ma_xa}
                }
            `);
            $('[name=editDiaChiThuongTruCu]').val(patientById.tt_dia_chi);
            $('#editShowThuongTru').html(`<b>Địa chỉ thường trú: </b>${patientById.tt_dia_chi} (${patientById.tt_ma_tinh}-${patientById.tt_ma_huyen}-${patientById.tt_ma_xa})`);
            
            $('[name=editDanToc]').val(patientById.id_ethnic);
            $('[name=editMaHGD]').val(patientById.ma_hgd);
            $('[name=editQuocTich]').val(patientById.quoc_tich);
            $('[name=editIdPatient]').val(patientById.id);
            loadCheckBoxMeSauSinh(patientById, carerByIdPatient);
        },
    );
})

/* Xử lí update bệnh nhân */
$(document).on('submit', '.formEditPatient', function(e){
    e.preventDefault();
    console.log('edit');
    let formData = new FormData($(this)[0]);
    $.ajax({
        type: "POST",
        url: $url + "manager/vitamin-a/patient/edit",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response);
            toastr.success(response.msgSuccess);
            $('.btnExitFormEdit').trigger('click');
            getPatients();
        }
    });
})

/* Xử lí xóa bệnh nhân */
$(document).on('click', '.btnDelete', function(e){
    e.preventDefault();
    console.log('delete');
    var idPatient = $(this).attr('id-patient');
    $.ajax({
        type: "POST",
        url: $url + "manager/vitamin-a/patient/delete/"+idPatient,
        dataType: "json",
        success: function (response) {
            console.log(response);
            toastr.success(response.msgSuccess);
            getPatients();
        }
    });
})

/* Import Excel */
$(document).on('submit', '#importExcel', function(e){
    e.preventDefault();
    let formData = new FormData($(this)[0]);
    $.ajax({
        type: "POST",
        url: $url + "manager/vitamin-a/patient/import-excel",
        data:formData,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response);
        }
    });
})