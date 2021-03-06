<?php

use App\Http\Controllers\CadresController;
use App\Http\Controllers\CardresController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentOfHealthController;
use App\Http\Controllers\HealthFacilitiesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VitaminA\DeploymentLocationController;
use App\Http\Controllers\VitaminA\PatientController;
use App\Http\Controllers\VitaminA\ScheduleController;
use App\Http\Controllers\VitaminA\VitaminAController;
use App\Http\Controllers\VitaminA\VitaminController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\thuoc_vattu\Thuoc_vattuController;
use App\Http\Controllers\thuoc_vattu\DanhsachthuocController;
use App\Http\Controllers\thuoc_vattu\DanhsachduongdungController;
use App\Http\Controllers\thuoc_vattu\DanhsachnhacungcapController;
use App\Http\Controllers\thuoc_vattu\DanhsachhangsanxuatController;
use App\Http\Controllers\thuoc_vattu\DanhsachnuocsanxuatController;
use App\Http\Controllers\thuoc_vattu\DanhsachVattuController;
use App\Http\Controllers\thuoc_vattu\DanhsachThuoc7Controller;
use App\Http\Controllers\thuoc_vattu\DanhsachThuoc15Controller;
use App\Http\Controllers\thuoc_vattu\DanhsachThuoc30Controller;
use App\Http\Controllers\thuoc_vattu\DanhsachThuoc60Controller;
use App\Http\Controllers\thuoc_vattu\DanhsachThuoc90Controller;
use App\Http\Controllers\thuoc_vattu\DanhsachThuoc180Controller;
use App\Http\Controllers\thuoc_vattu\ThanhlyThuochethanController;
use App\Http\Controllers\thuoc_vattu\PhieulapController;
use App\Http\Controllers\thuoc_vattu\PhieuxuatController;
use App\Http\Controllers\thuoc_vattu\NguonnhapController;
use App\Http\Controllers\thuoc_vattu\BaocaoController;
use App\Http\Controllers\thuoc_vattu\LocationController;
use App\Http\Controllers\thuoc_vattu\PhanloaithuocController;
// use App\Http\Controllers\thuoc_vattu\PhieunhapthuocchitietController;
use App\Http\Controllers\thuoc_vattu\xacnhan_huythuoc\HuythuocController;
use App\Http\Controllers\thuoc_vattu\xacnhan_huythuoc\DuyetController;
use App\Http\Controllers\thuoc_vattu\xacnhan_nhapkho\XacnhanphieulapController;
use App\Http\Controllers\thuoc_vattu\xacnhan_xuatthuoc\XuatthuocController;

Route::middleware('PreventBackHistory')->group(function(){
    Route::view('/', 'login');
    Route::view('login', 'login')->name('login');
    Route::post('/check-login', [LoginController::class, 'checkLogin'])->name('check-login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});



Route::view('api-list-provices', 'api-provices');


/* H??? TH???NG QU???N L?? V20 */
Route::prefix('manager')->name('manager.')->group(function(){
    Route::middleware(['auth','check_account_status'])->group(function(){

        /* B???ng ??i???u khi???n */
        Route::prefix('dashboard')->name('dashboard.')->group(function(){
            Route::get('index', [DashboardController::class,'index'])->name('index');

            /* S??? y t??? */
            Route::prefix('department-of-health')->name('department-of-health.')->group(function(){
                /* Live search */

                /* Th???ng k?? s??? y t??? ???? ch???n (Admin, S??? y t???) */
                Route::get('statistical/{idDepartmentOfHealth}', [DashboardController::class,'statisticalDepartmentOfHealth'])
                ->name('statistical')->middleware('admin_department_of_health');
            });

            /* Trung t??m y t??? */
            Route::prefix('medical-center')->name('medical-center.')->group(function(){
                /* Danh s??ch c??c trung t??m y t??? theo s??? y t??? ???? ch???n(Admin, S??? y t???) */
                Route::get('list/{idDepartmentOfHealth}', [DashboardController::class,'getMedicalCenters'])
                ->name('list')->middleware('admin_department_of_health');

                /* Th???ng k?? trung t??m y t??? theo s??? y t??? (Admin, S??? y t???, Trung t??m y t???) */
                Route::get('statistical/{idMedicalCenter}', [DashboardController::class,'statisticalMedicalCenter'])
                ->name('statistical')->middleware('admin_department_of_health_medical_center');
            });

            /* Tr???m y t??? */
            Route::prefix('medical-station')->name('medical-station.')->group(function(){
                /* Danh s??ch c??c tr???m y t??? theo trung t??m y t??? ???? ch???n (Admin, S??? y t???, Trung t??m y t???) */
                Route::get('list/{idMedicalCenter}', [DashboardController::class,'getMedicalStations'])
                ->name('list')->middleware('admin_department_of_health_medical_center');

                /* Th???ng k?? tr???m y t??? theo trung t??m y t??? 
                (
                    - Admin: to??n quy???n, 
                    - S??? y t???, trung t??m y t???: ch??? xem th???ng k??,
                    - Tr???m y t???: xem th???ng k??, v??o trang ch??? c???a c??c ph??n h??? c???a tr???m
                ) */
                Route::get('statistical/{idMedicalStation}', [DashboardController::class,'statisticalMedicalStation'])->name('statistical');
            });
        });

        Route::view('profile', 'profile')->name('profile');
        Route::post('update-user', [UserController::class, 'updateProfileUser'])->name('update-user');


        Route::get('load-dark-mode', [UserController::class, 'loadDarkMode'])->name('load-dark-mode');
        Route::post('dark-mode', [UserController::class, 'darkMode'])->name('dark-mode');

        Route::prefix('department-of-health')->name('department-of-health.')->group(function(){
            Route::get('navigation/{idDeparmentOfHealth}', [DepartmentOfHealthController::class,'navigationDeparmentOfHealth']);
        });

        /* QU???N L?? NG?????I D??NG */
        Route::prefix('user')->name('user.')->group(function(){
            Route::middleware('admin')->group(function(){
                Route::get('index', [UserController::class, 'index'])->name('index');
                Route::get('list', [UserController::class, 'getUsers'])->name('list');
                Route::post('add', [UserController::class, 'addUser'])->name('add');
                Route::get('decentralization/{idUser}', [UserController::class, 'decentralizationUser'])->name('decentralization');
                Route::get('delete/{idUser}', [UserController::class, 'deleteUser'])->name('delete');
                Route::post('update-status', [UserController::class, 'updateStatus'])->name('update-status');
            });
        });

        /* DANH M???C ?????A ??I???M */
        Route::prefix('health-facilities')->name('health-facilities.')->group(function(){
            Route::get('index', [HealthFacilitiesController::class, 'index'])->name('index');
            Route::get('search', [HealthFacilitiesController::class, 'searchHealthFacilities'])->name('search');
            Route::get('load-option', [HealthFacilitiesController::class, 'getHealthFacilitiesLoadOption'])->name('load-option');
        });

        /* CH???C V??? */
        Route::prefix('position')->name('position.')->group(function(){
            Route::get('index', [PositionController::class, 'index'])->name('index');
            Route::get('list', [PositionController::class, 'getPositions'])->name('list');
            Route::post('edit', [PositionController::class, 'editPosition'])->name('edit');
            Route::post('delete', [PositionController::class, 'deletePosition'])->name('delete');
        });

        /* C??N B??? */
        Route::prefix('cardres')->name('cardres.')->group(function(){
            Route::get('index', [CadresController::class, 'index'])->name('index');
        });

        /* V20 - Vitamin A */
        Route::prefix('vitamin-a')->name('vitamin-a.')->group(function(){
            Route::get('detail', [VitaminAController::class, 'detail'])->name('detail');
            Route::get('dashboard/{idMedicalStation}/{idHealthFacility}', [VitaminAController::class, 'dashboard'])->name('dashboard');

            /* ?????A ??I???M TRI???N KHAI */
            Route::prefix('deployment-location')->name('deployment-location.')->group(function(){
                Route::get('index/{idMedicalStation}/{idHealthFacility}', [DeploymentLocationController::class, 'index'])->name('index');
            });

            /* QU???N L?? ?????I T?????NG (B???NH NH??N) */
            Route::prefix('patient')->name('patient.')->group(function(){
                Route::get('index/{idMedicalStation}/{idHealthFacility}', [PatientController::class, 'index'])->name('index');
                Route::get('list/{idHealthFacility}', [PatientController::class, 'getPatients'])->name('list');
                Route::get('patient-by-id', [PatientController::class, 'getPatientById'])->name('patient-by-id');
                Route::post('add', [PatientController::class, 'addPatient'])->name('add');
                Route::get('show-edit/{idMedicalStation}/{idHealthFacility}/{idPatient}', [PatientController::class, 'showEditPatient'])->name('show-edit');
                Route::post('edit', [PatientController::class, 'editPatient'])->name('edit');
                Route::post('delete/{idPatient}', [PatientController::class, 'deletePatient'])->name('delete');
                Route::get('search', [PatientController::class, 'searchPatient'])->name('search');
                Route::get('get-file-excel-import', [PatientController::class, 'getFileExcelImport'])->name('get-file-excel-import');
                Route::get('get-file-excel-export', [PatientController::class, 'getFileExcelExport'])->name('get-file-excel-export');
                Route::post('import-excel', [PatientController::class, 'importExcelPatient'])->name('import-excel');
                // Route::get('get-file-pdf-export', [PatientController::class, 'getFilePDFExport'])->name('get-file-pdf-export');
            });

            /* QU???N L?? VITAMIN */
            Route::prefix('vitamin')->name('vitamin.')->group(function(){
                Route::get('index/{idMedicalStation}/{idHealthFacility}', [VitaminController::class, 'index'])->name('index');
            });

            /* QU???N L?? L???CH TRI???N KHAI U???NG VITAMIN V?? X??? GIUN */
            Route::prefix('schedule')->name('schedule.')->group(function(){
                Route::get('index/{idMedicalStation}/{idHealthFacility}', [ScheduleController::class, 'index'])->name('index');
            });
        });


        // V20 thu???c v???t t?? 
        Route::prefix('thuoc_vattu')->name('thuoc_vattu.')->group(function(){
              // xem chi ti???t v???i quy???n syt v?? ttyt
            Route::get('statistical/{idHealthFacility}/{idMedicalStation}', [Thuoc_vattuController::class, 'detail'])->name('statistical');
             // xem chi ti???t v?? x??? l?? v???i quy???n admin tr???m y t???
            Route::get('dashboard/{idHealthFacility}/{idMedicalStation}', [Thuoc_vattuController::class, 'dashboard'])->name('dashboard');

           //danh s??ch thu???c
           Route::get('list_thuoc/{idHealthFacility}/{idMedicalStation}', [DanhsachthuocController::class, 'list'])->name('list_thuoc');
        //  danh s??ch ???????ng d??ng
           Route::get('list_duongdung/{idHealthFacility}/{idMedicalStation}', [DanhsachduongdungController::class, 'list'])->name('list_duongdung');
           //danh s??ch nh?? cung c???p
           Route::get('list_nhacungcap/{idHealthFacility}/{idMedicalStation}', [DanhsachnhacungcapController::class, 'list'])->name('list_nhacungcap');
           //danh s??ch hang san xu???t
           Route::get('list_hangsanxuat/{idHealthFacility}/{idMedicalStation}', [DanhsachhangsanxuatController::class, 'list'])->name('list_hangsanxuat');
           //danh s??ch n?????c s???n xu???t
           Route::get('list_nuocsanxuat/{idHealthFacility}/{idMedicalStation}', [DanhsachnuocsanxuatController::class, 'list'])->name('list_nuocsanxuat');
            //   Ngu???n nh???p
            Route::get('list_nguonnhap/{idHealthFacility}/{idMedicalStation}', [NguonnhapController::class, 'list'])->name('list_nguonnhap');
         
           //danh s??ch v???t t??
           Route::get('list_vattu/{idHealthFacility}/{idMedicalStation}', [DanhsachVattuController::class, 'list'])->name('list_vattu');
           
           // danh s??ch thu???c d?????i 7 ng??y
           Route::get('list_medicine7/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc7Controller::class, 'list'])->name('list_medicine7');
           // danh s??ch thu???c d?????i 15 ng??y
           Route::get('list_medicine15/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc15Controller::class, 'list'])->name('list_medicine15');
           // danh s??ch thu???c d?????i 1 th??ng
           Route::get('list_medicine30/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc30Controller::class, 'list'])->name('list_medicine30');
           // danh s??ch thu???c d?????i 2 th??ng
           Route::get('list_medicine60/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc60Controller::class, 'list'])->name('list_medicine60');
           // danh s??ch thu???c d?????i 3 th??ng
           Route::get('list_medicine90/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc90Controller::class, 'list'])->name('list_medicine90');
         // danh s??ch thu???c d?????i 6 th??ng
           Route::get('list_medicine180/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc180Controller::class, 'list'])->name('list_medicine180');


           // L???p phi???u nh??p phi???u l???p controller ??? ????y l?? phi???u nh???p
           Route::get('lapphieunhap/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'lapphieu'])->name('lapphieunhap');
           // luu d??? li???u v??o data vs trang thai l?? 0 (t???a nh?? l?? ch???c n??ng th??m)
           Route::post('lapphieu/Add/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'themlapphieu'])->name('themlapphieu');
            // ti???p theo phi???u nh???p chi ti???p l???p danh s??ch thu???c c???n nh???p
           Route::get('lapdanhsachthuoc/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'danhsachthuoccannhap'])->name('danhsachthuoccannhap');

           
           //Excel
           Route::post('/nhapthuoc/import_csv/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'import_csv'])->name('import_csv');
           Route::post('/nhapthuoc/export_csv/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'export_csv'])->name('export_csv');




            //    xem v??? tr?? tr???m y t???
            Route::get('xemvitri/{idHealthFacility}/{idMedicalStation}', [LocationController::class, 'location'])->name('location');


            // l???p phi???u xu???t
           Route::get('lapphieuxuat/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'lapphieu'])->name('lapphieuxuat');
           Route::post('lapphieuxuat/Add/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'themlapphieu'])->name('themlapphieu');
           // ti???p theo phi???u xu???t chi ti???p l???p danh s??ch thu???c c???n xu???t
           Route::get('lapdanhsachxuatthuoc/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'danhsachthuoccanxuat'])->name('danhsachthuoccanxuat');
                    

            //    excel
            Route::post('/xuatthuoc/import_csv/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'import_csv'])->name('import_csv');
            Route::post('/xuatthuoc/export_csv/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'export_csv'])->name('export_csv');


            // X??c nh???n phi???u nh???p xu???t ch??? ??? c???p trung t??m y t???
            // Route::get('confirm', [DanhsachThuoc125Controller::class, 'confirm'])->name('confirm');

           // thanh l?? thu???c h???t h???n b??n tr???m y t???
           Route::get('thanhlythuochethan/{idHealthFacility}/{idMedicalStation}',[ThanhlyThuochethanController::class, 'list'])->name('list_thanhlythuoc');
           //    G???i y??u c???u thanh l?? thu???c ?????n trung t??m y t???
           Route::get('guiyeucauthanhly/{idHealthFacility}/{idMedicalStation}',[ThanhlyThuochethanController::class, 'guiyeucau'])->name('guiyeucau');
            //    them th??ng tin v??o c?? s??? d??? li???u v?? g???i ??i ?????n trung t??m y t???
           Route::post('/thanhlythuoc/guiyeucau/{idHealthFacility}/{idMedicalStation}',[ThanhlyThuochethanController::class, 'themvaodanhsach'])->name('themvaodanhsach');
            // x??c nh???n h???y thu???c b??n trung t??m y t???
            Route::get('/xemchitiet/{idHealthFacility}/{idMedicalStation}',[HuythuocController::class, 'xemchitiet'])->name('xemchitiet');
            // duy???t phi???u 
            Route::get('/duyetphieu/{idHealthFacility}/{idMedicalStation}',[DuyetController::class, 'xoa'])->name('xoa');


            // X??c nh???n nh???p thu???c b??n trung t??m y t???
            Route::get('/xacnhan_nhapthuoc/{idHealthFacility}/{idMedicalStation}',[XacnhanphieulapController::class, 'xemchitiet'])->name('xemchitietnhap');
            // duy???t phi???u nh???p th??m d??? li???u v??o b???ng thuoc
            Route::get('/duyetphieunhap/{idHealthFacility}/{idMedicalStation}',[XacnhanphieulapController::class, 'them'])->name('xemchitiet');

            
            // X??c nh???n xu???t thu???c b??n trung t??m y t???
            Route::get('/xacnhan_xuatthuoc/{idHealthFacility}/{idMedicalStation}',[XuatthuocController::class, 'xemchitiet'])->name('xemchitietxuat');
            Route::get('/duyetphieuxuat/{idHealthFacility}/{idMedicalStation}',[XuatthuocController::class, 'duyetphieuxuat'])->name('xemchitietxuat');

            //   ph??n lo???i thu???c

            Route::get('/phanloaithuoc/{idHealthFacility}/{idMedicalStation}',[PhanloaithuocController::class, 'phanloai'])->name('phanloai');
            Route::get('loaithuoc/{idHealthFacility}/{idMedicalStation}/{idthuoc}',[PhanloaithuocController::class, 'loaithuoc'])->name('loaithuoc');

            
            // Qu???n l?? v?? k???t xu???t th??ng tin b??o c??o
            Route::get('/bienbankiemnhap/{idHealthFacility}/{idMedicalStation}',[BaocaoController::class, 'baocaonhap'])->name('baocaonhap');
            Route::post('/laybienbankiemnhap/{idHealthFacility}/{idMedicalStation}',[BaocaoController::class, 'laybaocaonhap'])->name('laybaocaonhap');
            Route::get('/inbaocaonhap/{idHealthFacility}/{idMedicalStation}/{ngaybatdau}/{ngayketthuc}',[BaocaoController::class, 'inbaocaonhap'])->name('inbaocaonhap');
            
            Route::get('/bienbankiemxuat/{idHealthFacility}/{idMedicalStation}',[BaocaoController::class, 'baocaoxuat'])->name('baocaoxuat');
            Route::post('/laybienbankiemxuat/{idHealthFacility}/{idMedicalStation}',[BaocaoController::class, 'laybaocaoxuat'])->name('laybaocaoxuat');
            Route::get('/inbaocaoxuat/{idHealthFacility}/{idMedicalStation}/{ngaybatdau}/{ngayketthuc}',[BaocaoController::class, 'inbaocaoxuat'])->name('inbaocaoxuat');


            Route::get('/bienbankiemke/{idHealthFacility}/{idMedicalStation}',[BaocaoController::class, 'baocaokiemke'])->name('baocaokiemke');
            Route::get('/inbaocaokiemke/{idHealthFacility}/{idMedicalStation}',[BaocaoController::class, 'inbaocaokiemke'])->name('inbaocaokiemke');
        });
        
        // 
        #region /* KHU V???C TH??? NGHI???M */

            Route::get('char', function(){
                return view('char');
            });

            /* API C??C T???NH - HUY???N - X?? ??? VI???T NAM */
            Route::view('api-list-provices', 'api-provices');

            /* T???O D??? LI???U V??O B???NG COUNTRIES */
            Route::get('api-countries-create-seed', function(){
                $countries = json_decode(Http::get('https://countriesnow.space/api/v0.1/countries')->body())->data;
                $vietNam = [];
                foreach($countries as $item){
                    echo $item->iso3 . '<br/>';
                }


                // for ($i=0; $i < count($countries); $i++) { 
                //     DB::table('countries')->insert(['TEN_QUOC_GIA'=>$countries[$i]->country]);
                // }
                // echo 'oke';
            });

            /* Google Map (Ch??a c?? Key) */
            Route::view('api-google-map', 'map');
        #endregion
    });
});
