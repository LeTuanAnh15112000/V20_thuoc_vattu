$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Load Users */
    function getUsers() {
        $.get("list", {},
            function (response, textStatus, jqXHR) {
                $('#userList').html('');
                $('#userList').append(response.output);
            },
        );
    }
    getUsers();
    /* Ajax chọn tất cả */
    $('#checkAll').change(function (e) {
        e.preventDefault();
        if (this.checked) {
            console.log('Check All');
        }
    });

    /* Xử lí khóa tài khoản */
    $(document).on('click', '.btnLockAgree', function (e) {
        e.preventDefault();
        var idUser = JSON.parse($(this).attr('data'))[0];
        var status = JSON.parse($(this).attr('data'))[1];
        $.ajax({
            type: "POST",
            url: "update-status",
            data: {
                idUser: idUser,
                status: status
            },
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    getUsers();
                    toastr.success(response.msgSuccess);
                    $('.btnLockDisagree').click();
                } else {
                    toastr.success(response.msgError);
                }
            }
        });
    });

    /* Xử lí mở khóa tài khoản */
    $(document).on('click', '.btnModalUnlock', function (e) {
        e.preventDefault();
        var idUser = JSON.parse($(this).attr('data'))[0];
        var status = JSON.parse($(this).attr('data'))[1];
        $.ajax({
            type: "POST",
            url: "update-status",
            data: {
                idUser: idUser,
                status: status
            },
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    getUsers();
                    toastr.success(response.msgSuccess);
                } else {
                    toastr.success(response.msgError);
                }
            }
        });
    });

    /* Xóa */
    $(document).on('click', '.btnModalDelete', function (e) {
        e.preventDefault();

        $('.btnAgree').click(function (e) {
            e.preventDefault();
            var idUser = JSON.parse($(this).attr('data'))[0];
            console.log(idUser);
            $.ajax({
                url: "delete/" + idUser,
                method: "GET",
                success: function (response) {
                    console.log(response);
                    if (response.status == 200) {
                        getUsers();
                        toastr.success(response.msgSuccess);
                        $('.btnDisagree').click();
                    } else {
                        toastr.error(response.msgError);
                    }
                }
            });
        });
    });

    /* Thực thi khóa/mở tài khoản */
    function ajaxUpdateStatus(idUser, status) {
        $.ajax({
            type: "POST",
            url: "update-status",
            data: {
                idUser: idUser,
                status: status
            },
            // cache:false,
            // processData:false,
            dataType: "json",
            success: function (response) {
                if (response.status == 200) {
                    getUsers();
                    toastr.success(response.msgSuccess);
                } else {
                    toastr.success(response.msgError);
                }
            }
        });
    }

    /* Khóa/Mở tài khoản */
    $(document).on('submit', '.formUpdateStatus', function (e) {
        e.preventDefault();
        var idUser = JSON.parse($(this).attr('data'))[0];
        var status = JSON.parse($(this).attr('data'))[1];
        if (status == 1) {
            if (confirm('Bạn thật sự muốn khóa tài khoản này?')) {
                ajaxUpdateStatus(idUser, status);
            }
        } else {
            ajaxUpdateStatus(idUser, status);
        }
    });
});