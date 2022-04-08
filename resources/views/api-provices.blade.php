<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

        {{-- Ajax --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <title>Document</title>
</head>
<body>
    {{-- {{ dd($provices[0]) }} --}}
    <h1>Tỉnh</h1>
    <select name="" id="provices"></select>

    <h1>Huyện</h1>
    <select name="" id="districts"></select>

    <h1>Phường - Xã</h1>
    <select name="" id="wards"></select>


    <script>
        $(document).ready(function(){
            fetch('https://provinces.open-api.vn/api/?depth=3')
            .then(response => response.json())
            .then(
                provices => {
                    /* Load danh sách tỉnh thành */
                    var idPro = 0;
                    var outputProvices = '<option value="">Chọn Tỉnh Thành...</option>';
                    provices.forEach(provice => {
                        outputProvices += `<option value="[${idPro++},${provice.code}]">${provice.name}</option>`
                    }),
                    $('#provices').html(outputProvices)

                    /* Xử lí sự kiện chọn Tỉnh */
                    $('#provices').change(function (e) { 
                        e.preventDefault();

                        /* Load danh sách Huyện theo Tỉnh */
                        var idProvice = JSON.parse($('#provices :selected').val())[0];
                        var codeProvice = JSON.parse($('#provices :selected').val())[1];
                        var districtsByIdProvice = provices[idProvice].districts;
                        var idDis = 0;
                        var outputDistricts = '<option value="">Chọn Huyện...</option>'
                        districtsByIdProvice.forEach(district => {
                            outputDistricts += `<option value="[${idDis++},${district.code}]">${district.name}</option>`
                        })
                        $('#districts').html(outputDistricts)

                        /* Xử lí sự kiện chọn Huyện */
                        $('#districts').change(function (e) {
                            e.preventDefault();

                            /* Load danh sách Phường Xã theo Huyện */
                            var idDistrict = JSON.parse($('#districts :selected').val())[0];
                            var codeDistrict = JSON.parse($('#districts :selected').val())[1];
                            var wardsByIdDistrict = districtsByIdProvice[idDistrict].wards;
                            var outputWards = '<option value="">Chọn Phường, Xã...</option>';
                            var idWar = 0;
                            wardsByIdDistrict.forEach(ward => {
                                outputWards += `<option value="[${idWar++},${ward.code}]">${ward.name}</option>`
                            })
                            $('#wards').html(outputWards)

                            
                        })
                    })
                    /* Trả về các mã hành chính Tỉnh - Huyện - Xã */
                    $('#wards').change(function(e){
                        e.preventDefault();
                        var codeProvice = JSON.parse($('#provices').val())[1];
                        var codeDistrict = JSON.parse($('#districts').val())[1];
                        var codeWard = JSON.parse($('#wards').val())[1];
                        console.log('Tỉnh: ' +codeProvice+ ' Huyện: ' +codeDistrict+ ' Xã: ' + codeWard);
                    })
                }
            )
        });
        
    </script>
</body>
</html>

