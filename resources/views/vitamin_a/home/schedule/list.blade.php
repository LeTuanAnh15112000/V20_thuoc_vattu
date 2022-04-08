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
        </tr>
    </thead>
    <tbody id="scheduleList">
        @php
            $i = 1;
        @endphp
        
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
