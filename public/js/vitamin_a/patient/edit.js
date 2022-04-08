
/* Load edit hộ khẩu */
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
                    $('#editProvicesHK').html(outputProvices)

                /* Xử lí sự kiện chọn Tỉnh */
                $('#editProvicesHK').change(function (e) {
                    e.preventDefault();

                    /* Load danh sách Huyện theo Tỉnh */
                    var idProvice = JSON.parse($('#editProvicesHK :selected').val())[0];
                    var codeProvice = JSON.parse($('#editProvicesHK :selected').val())[1];


                    var districtsByIdProvice = provices[idProvice].districts;
                    var idDis = 0;
                    var outputDistricts = '<option value="">Chọn Huyện...</option>'
                    districtsByIdProvice.forEach(district => {
                        outputDistricts += `<option value="[${idDis++},${district.code}]" nameDistrict="${district.name}">${district.name}</option>`
                    })
                    $('#editDistrictsHK').html(outputDistricts)

                    /* Xử lí sự kiện chọn Huyện */
                    $('#editDistrictsHK').change(function (e) {
                        e.preventDefault();

                        /* Load danh sách Phường Xã theo Huyện */
                        var idDistrict = JSON.parse($('#editDistrictsHK :selected').val())[0];
                        var codeDistrict = JSON.parse($('#editDistrictsHK :selected').val())[1];
                        var wardsByIdDistrict = districtsByIdProvice[idDistrict].wards;
                        var outputWards = '<option value="">Chọn Phường, Xã...</option>';
                        var idWar = 0;
                        wardsByIdDistrict.forEach(ward => {
                            outputWards += `<option value="[${idWar++},${ward.code}]" nameWard="${ward.name}">${ward.name}</option>`
                        })
                        $('#editWardsHK').html(outputWards)
                    })
                })
                /* Trả về các mã hành chính Tỉnh - Huyện - Xã */
                $('#editWardsHK').change(function (e) {
                    e.preventDefault();
                    var codeProvice = JSON.parse($('#editProvicesHK').val())[1];
                    var codeDistrict = JSON.parse($('#editDistrictsHK').val())[1];
                    var codeWard = JSON.parse($('#editWardsHK').val())[1];
                    var nameProvice = $('#editProvicesHK :selected').attr('nameProvice');
                    var nameDistrict = $('#editDistrictsHK :selected').attr('nameDistrict');
                    var nameWard = $('#editWardsHK :selected').attr('nameWard');
                    $('#newHoKhau').val(
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

/* Load edit thường trú */
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
                    $('#editProvicesTT').html(outputProvices)

                /* Xử lí sự kiện chọn Tỉnh */
                $('#editProvicesTT').change(function (e) {
                    e.preventDefault();

                    /* Load danh sách Huyện theo Tỉnh */
                    var idProvice = JSON.parse($('#editProvicesTT :selected').val())[0];
                    var codeProvice = JSON.parse($('#editProvicesTT :selected').val())[1];


                    var districtsByIdProvice = provices[idProvice].districts;
                    var idDis = 0;
                    var outputDistricts = '<option value="">Chọn Huyện...</option>'
                    districtsByIdProvice.forEach(district => {
                        outputDistricts += `<option value="[${idDis++},${district.code}]" nameDistrict="${district.name}">${district.name}</option>`
                    })
                    $('#editDistrictsTT').html(outputDistricts)

                    /* Xử lí sự kiện chọn Huyện */
                    $('#editDistrictsTT').change(function (e) {
                        e.preventDefault();

                        /* Load danh sách Phường Xã theo Huyện */
                        var idDistrict = JSON.parse($('#editDistrictsTT :selected').val())[0];
                        var codeDistrict = JSON.parse($('#editDistrictsTT :selected').val())[1];
                        var wardsByIdDistrict = districtsByIdProvice[idDistrict].wards;
                        var outputWards = '<option value="">Chọn Phường, Xã...</option>';
                        var idWar = 0;
                        wardsByIdDistrict.forEach(ward => {
                            outputWards += `<option value="[${idWar++},${ward.code}]" nameWard="${ward.name}">${ward.name}</option>`
                        })
                        $('#editWardsTT').html(outputWards)
                    })
                })
                /* Trả về các mã hành chính Tỉnh - Huyện - Xã */
                $('#editWardsTT').change(function (e) {
                    e.preventDefault();
                    var codeProvice = JSON.parse($('#editProvicesTT').val())[1];
                    var codeDistrict = JSON.parse($('#editDistrictsTT').val())[1];
                    var codeWard = JSON.parse($('#editWardsTT').val())[1];
                    var nameProvice = $('#editProvicesTT :selected').attr('nameProvice');
                    var nameDistrict = $('#editDistrictsTT :selected').attr('nameDistrict');
                    var nameWard = $('#editWardsTT :selected').attr('nameWard');
                    $('#newThuongTru').val(
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

/* Edit checkbox mẹ sau sinh */
function checkBoxMeSauSinh(patientById, carerByIdPatient){
    $('#editNCS').css({
        "display": "block"
    });

    $('#editMSS').css({
        "display": "none"
    });

    if (patientById.loai_benh_nhan == 4) {
        $('#checkboxEditMSS').prop('checked',true);
    }

    if ($('#checkboxEditMSS').prop('checked') == true) {
        $('#editMSS').css({
            "display": "block"
        });
        $('#editNCS').css({
            "display": "none"
        });
        $('#editGioiTinh').html(`
            <select name="editGioiTinh" id="editGioiTinh" class="form-control text-capitalize">
                <option value="2">Nữ</option>
            </select>
        `);
        $('[name=editLoaiBenhNhan]').val(4);
        $('[name=editCMNDMSS]').val(patientById.cmnd);
        $('[name=editSDTMSS]').val(patientById.sdt);
        $('[name=editEmailMSS]').val(patientById.email);
        $('[name=editDVCTMSS]').val(patientById.don_vi_cong_tac);
    } else {
        $('#editMSS').css({
            "display": "none"
        });
        $('#editNCS').css({
            "display": "block"
        });
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

$(document).ready(function () {
    var patientById = JSON.parse($('#dataPatientById').val())[0];
    var carerByIdPatient = JSON.parse($('#dataCarerByIdPatient').val())[0];

    console.log(patientById);

    $('[name=editHoTen]').val(patientById.ho_va_ten);
    $('[name=editMaDinhDanhV20]').val(patientById.ma_dinh_danh_v20);
    $('[name=editNgaySinh]').val(patientById.ngay_sinh);
    $('[name=editGioiTinh]').val(patientById.gioi_tinh);
    $('[name=editMaHoKhau]').val(`
        {
            "tinhHK":${patientById.hk_ma_tinh},
            "huyenHK":${patientById.hk_ma_huyen},
            "xaHK":${patientById.hk_ma_xa}
        }
    `);
    $('[name=editHoKhau]').val(patientById.hk_dia_chi);
    $('#editShowHoKhau').html(`<b>Địa chỉ hộ khẩu: </b>${patientById.hk_dia_chi} (${patientById.hk_ma_tinh}-${patientById.hk_ma_huyen}-${patientById.hk_ma_xa})`);

    $('[name=editMaThuongTru]').val(`
        {
            "tinhTT":${patientById.tt_ma_tinh},
            "huyenTT":${patientById.tt_ma_huyen},
            "xaTT":${patientById.tt_ma_xa}
        }
    `);
    $('[name=editThuongTru]').val(patientById.tt_dia_chi);
    $('#editShowThuongTru').html(`<b>Địa chỉ thường trú: </b>${patientById.tt_dia_chi} (${patientById.tt_ma_tinh}-${patientById.tt_ma_huyen}-${patientById.tt_ma_xa})`);
    $('[name=editDanToc]').val(patientById.id_ethnic);
    $('[name=editMaHGD]').val(patientById.ma_hgd);
    $('[name=editQuocTich]').val(patientById.quoc_tich);
    
    checkBoxMeSauSinh(patientById, carerByIdPatient);

    $('[name=idPatient]').val(patientById.id);
    
});
