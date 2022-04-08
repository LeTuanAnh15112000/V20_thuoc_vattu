function getPositions() {
    $.get("list", {},
        function (response, textStatus, jqXHR) {
            $('#positionList').html('');
            $('#positionList').append(response.output);
        },
    );
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* Load Users */
    function getPositions() {
        $.get("list", {},
            function (response, textStatus, jqXHR) {
                $('#positionList').html('');
                $('#positionList').append(response.output);
            },
        );
    }

    getPositions();

    // $('#formAddUser').submit(function (e) {
    //     e.preventDefault();
    //     let formData = new FormData($('#formAddUser')[0]);
    //     $.ajax({
    //         url: "/manager/user/add",
    //         method: "POST",
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         success: function (response) {
    //             console.log(response);
    //         }
    //     });
    // });
});

$(document).on('submit', '.formEditPosition', function (e) {
    e.preventDefault();
    let formData = new FormData($(this)[0]);
    $.ajax({
        url: "/manager/position/edit",
        method: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status == 200) {
                getPositions();
                toastr.success(response.msgSuccess);
                $('.btnEditExit').trigger('click');
            }
        }
    });
});


$(document).on('click', '.btnDelete', function (e) {
    e.preventDefault();
    var idPosition = $(this).attr('id-position');
    console.log(idPosition);
    $.ajax({
        url: "/manager/position/delete",
        method: "POST",
        data: { idPosition: idPosition },
        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                toastr.success(response.msgSuccess);
                getPositions();
            }
        }
    });
});