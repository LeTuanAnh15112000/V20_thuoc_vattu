<table class="table table-head-fixed table-hover text-nowrap">
    <thead>
        <tr>
            <th>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="checkAll">
                    <label for="checkAll" class="custom-control-label"></label>
                </div>
            </th>
            <th>STT</th>
            <th>họ tên bệnh nhân</th>
            <th>loại bệnh nhân</th>
            <th>địa chỉ thường trú</th>
            <th>Chi tiết</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody id="patientList">
        @php
            $i = 1;
        @endphp
        @foreach ($patients as $patient)
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="{{ 'check' . $patient->id }}">
                        <label for="{{ 'check' . $patient->id }}" class="custom-control-label"></label>
                    </div>
                </td>
                <td>{{ $i++ }}</td>
                <td>{{ $patient->ho_va_ten }}</td>
                <td>
                    @switch($patient->loai_benh_nhan)
                        @case(1)
                            <p>0-6 tháng không được bú sữa mẹ</p>
                        @break

                        @case(2)
                            <p>Trẻ 24-60 tháng</p>
                        @break

                        @case(3)
                            <p>Trẻ 6-60 tháng</p>
                        @break

                        @case(4)
                            <p>Mẹ bỉm sữa sau sinh <= 1 tháng</p>
                                @break
                            @endswitch
                </td>
                <td>{{ $patient->tt_dia_chi .' (' .$patient->tt_ma_tinh .'-' .$patient->tt_ma_huyen .'-' .$patient->tt_ma_xa .')' }}
                </td>
                <td>
                    <button type="button" class="btn btn-primary text-uppercase" data-toggle="modal"
                        data-target="{{ '#detail' . $patient->id }}">
                        <i class="fas fa-info-circle"></i>
                    </button>
                    <div class="modal fade" id="{{ 'detail' . $patient->id }}">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-uppercase" id="staticBackdropLabel"><b>thông tin chi
                                            tiết</b></h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <p><b>Mã định danh V20: </b>{{ $patient->ma_dinh_danh_v20 }}</p>
                                            <p><b>Ngày sinh: </b>{{ $patient->ngay_sinh }}</p>
                                            <p><b>Giới tính: </b>
                                                @switch($patient->gioi_tinh)
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
                                            <p><b>Địa chỉ hộ khẩu:
                                                </b>{{ $patient->hk_dia_chi .' (' .$patient->hk_ma_tinh .'-' .$patient->hk_ma_huyen .'-' .$patient->hk_ma_xa .')' }}
                                            </p>
                                            <p><b>Dân tộc:
                                                </b>{{ $patient->getEthnicById($patient->id_ethnic)->ten_dan_toc }}
                                            </p>
                                            <p><b>Số điện thoại: </b>{{ $patient->sdt }}</p>
                                            <p><b>CMND: </b>{{ $patient->cmnd }}</p>
                                            <p><b>Email: </b>{{ $patient->email }}</p>
                                            <p><b>Mã hộ gia đình: </b>{{ $patient->ma_hgd }}</p>
                                            <p><b>Đơn vị công tác: </b>{{ $patient->don_vi_cong_tac }}</p>
                                            <p><b>Quốc tịch: </b>{{ $patient->quoc_tich }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <a class="btn btn-primary btnFormEdit" id-patient="{{ $patient->id }}">Sửa</a>
                    <a class="btn btn-primary btnDelete" id-patient="{{ $patient->id }}">Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    /* Load search patient */
    // function loadSearchPatient(idHealthFacility, searchKey) {
    //     $.get($url + "manager/vitamin-a/patient/search", {
    //             idHealthFacility: idHealthFacility,
    //             searchKey: searchKey
    //         },
    //         function(response, textStatus, jqXHR) {
    //             $('#patientList').html('');
    //             $('#patientList').append(response.output);
    //         },
    //     );
    // }

    // var idHealthFacility = $('#idHealthFacility').val();
    // var searchKey = $('#searchPatient').val();
    // loadSearchPatient(idHealthFacility, searchKey);

    // /* Live search */
    // $(document).on('keyup', '#searchPatient', function(e) {
    //     e.preventDefault();
    //     var idHealthFacility = $('#idHealthFacility').val();
    //     var searchKey = $(this).val();
    //     loadSearchPatient(idHealthFacility, searchKey);
    // });
</script>
