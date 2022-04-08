<button type="button" class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#modalAdd">
    thêm người dùng
</button>
<div class="modal fade" id="modalAdd">
    <div class="modal-dialog modal-xl">
        <form action="#" id="formAddUser" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="staticBackdropLabel">thêm người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="card" style="width: 18rem; margin:auto">
                        <img src="" id="preview" class="img-thumbnail">
                        <input type="file" class="file" accept="image/*" name="file" style="visibility:hidden;position: absolute;">
                        <div class="input-group my-3">
                            <input type="text" class="form-control" disabled placeholder="Upload File" id="file" style="width: 160px;">
                            <div class="input-group-append">
                                <button type="button" class="browse btn btn-primary">Chọn ảnh...</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Sở y tế</label>
                            <select id="deparmentOfHealths" name="deparmentOfHealths" class="form-control text-capitalize">
                                <option value="">Chọn sở y tế...</option>
                                @foreach ($deparmentOfHealths as $deparmentOfHealth)
                                    <option value="{{ $deparmentOfHealth->id }}">
                                        {{ $deparmentOfHealth->TEN_SO_Y_TE }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Trung tâm y tế</label>
                            <select id="medicalCenters" name="medicalCenters" class="form-control text-capitalize"></select>
                        </div>
                        <div class="col">
                            <label class="form-label">Trạm y tế</label>
                            <select id="medicalStations" name="medicalStations" class="form-control text-capitalize"></select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="hoVaTen" placeholder="Nhập tên người dùng">
                        </div>
                        <div class="col">
                            <label class="form-label">Giới tính</label>
                            <select name="gioiTinh" class="form-control text-capitalize">
                                <option value="0">Chọn giới tính...</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <option value="3">Khác</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Ngày sinh</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" class="form-control" data-inputmask-alias="datetime"
                                    data-date-format="dd-mm-yyyy" data-mask name="ngaySinh">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="diaChi" placeholder="Nhập địa chỉ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email">
                        </div>
                        <div class="col">
                            <label class="form-label">Chứng chỉ hành nghề</label>
                            <input type="text" class="form-control" name="chungChiHanhNghe" placeholder="Nhập chứng chỉ hành nghề">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="checkBacSi" name="checkBacSi" >
                                <label for="checkBacSi" class="custom-control-label">Bác sĩ</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">CMND/CCCD</label>
                            <input type="text" class="form-control" placeholder="CMND hoặc CCCD" name="cmnd_cccd">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt">
                        </div>
                        <div class="col">
                            <label>Dân tộc</label>
                            <select name="danToc" class="form-control text-capitalize">
                                <option value="">Chọn dân tộc...</option>
                                @foreach ($ethnics as $ethnic)
                                    <option value="{{ $ethnic->id }}">{{ $ethnic->TEN_DAN_TOC }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Tài khoản</label>
                            <input type="text" class="form-control" name="tenTaiKhoan"
                                placeholder="Nhập tài khoản">
                        </div>
                        <div class="col">
                            <label class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Nhập mật khẩu">
                        </div>
                        <div class="col">
                            <label class="form-label">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="rePassword"
                                placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default text-capitalize" data-dismiss="modal">thoát</button>
                    <button type="submit" class="btn btn-primary text-capitalize">thêm</button>
                </div>
            </div>
        </form>
    </div>
</div>


{{-- Hiển thị ảnh --}}
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
                
        $('#formAddUser').submit(function(e) {
            e.preventDefault();
            let formData = new FormData($('#formAddUser')[0]);
            $.ajax({
                url: "/manager/user/add",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);

                }
            });
        });

        // Xử lí ảnh
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });

        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

        // Load Sở - Trung tâm - trạm y tế
        $('#deparmentOfHealths').change(function(e) {
            e.preventDefault();
            var idDepartmentOfHealth = $(this).val();
            var idMedicalCenter = null;
            var idMedicalStation = null;
            $.ajax({
                url: "/manager/medical-location/list2",
                method: "GET",
                data: {
                    idDepartmentOfHealth: idDepartmentOfHealth
                },
                success: function(response) {
                    $('#medicalCenters').html(response);
                    $('#medicalCenters').change(function(e) {
                        e.preventDefault();
                        var idMedicalCenter = $(this).val();
                        $.ajax({
                            url: "/manager/medical-location/list2",
                            method: "GET",
                            data: {
                                idMedicalCenter: idMedicalCenter
                            },
                            success: function(response) {
                                $('#medicalStations').html(response
                                    .output);
                                $('#medicalStations').change(function(
                                    e) {
                                    e.preventDefault();
                                    idMedicalStation = $(this)
                                        .val();
                                });
                            }
                        });
                    });
                }
            });
        });
    });
</script>
