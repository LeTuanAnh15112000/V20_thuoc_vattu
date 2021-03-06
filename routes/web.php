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


/* HỆ THỐNG QUẢN LÍ V20 */
Route::prefix('manager')->name('manager.')->group(function(){
    Route::middleware(['auth','check_account_status'])->group(function(){

        /* Bảng điều khiển */
        Route::prefix('dashboard')->name('dashboard.')->group(function(){
            Route::get('index', [DashboardController::class,'index'])->name('index');

            /* Sở y tế */
            Route::prefix('department-of-health')->name('department-of-health.')->group(function(){
                /* Live search */

                /* Thống kê sở y tế đã chọn (Admin, Sở y tế) */
                Route::get('statistical/{idDepartmentOfHealth}', [DashboardController::class,'statisticalDepartmentOfHealth'])
                ->name('statistical')->middleware('admin_department_of_health');
            });

            /* Trung tâm y tế */
            Route::prefix('medical-center')->name('medical-center.')->group(function(){
                /* Danh sách các trung tâm y tế theo sở y tế đã chọn(Admin, Sở y tế) */
                Route::get('list/{idDepartmentOfHealth}', [DashboardController::class,'getMedicalCenters'])
                ->name('list')->middleware('admin_department_of_health');

                /* Thống kê trung tâm y tế theo sở y tế (Admin, Sở y tế, Trung tâm y tế) */
                Route::get('statistical/{idMedicalCenter}', [DashboardController::class,'statisticalMedicalCenter'])
                ->name('statistical')->middleware('admin_department_of_health_medical_center');
            });

            /* Trạm y tế */
            Route::prefix('medical-station')->name('medical-station.')->group(function(){
                /* Danh sách các trạm y tế theo trung tâm y tế đã chọn (Admin, Sở y tế, Trung tâm y tế) */
                Route::get('list/{idMedicalCenter}', [DashboardController::class,'getMedicalStations'])
                ->name('list')->middleware('admin_department_of_health_medical_center');

                /* Thống kê trạm y tế theo trung tâm y tế 
                (
                    - Admin: toàn quyền, 
                    - Sở y tế, trung tâm y tế: chỉ xem thống kê,
                    - Trạm y tế: xem thống kê, vào trang chủ của các phân hệ của trạm
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

        /* QUẢN LÍ NGƯỜI DÙNG */
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

        /* DANH MỤC ĐỊA ĐIỂM */
        Route::prefix('health-facilities')->name('health-facilities.')->group(function(){
            Route::get('index', [HealthFacilitiesController::class, 'index'])->name('index');
            Route::get('search', [HealthFacilitiesController::class, 'searchHealthFacilities'])->name('search');
            Route::get('load-option', [HealthFacilitiesController::class, 'getHealthFacilitiesLoadOption'])->name('load-option');
        });

        /* CHỨC VỤ */
        Route::prefix('position')->name('position.')->group(function(){
            Route::get('index', [PositionController::class, 'index'])->name('index');
            Route::get('list', [PositionController::class, 'getPositions'])->name('list');
            Route::post('edit', [PositionController::class, 'editPosition'])->name('edit');
            Route::post('delete', [PositionController::class, 'deletePosition'])->name('delete');
        });

        /* CÁN BỘ */
        Route::prefix('cardres')->name('cardres.')->group(function(){
            Route::get('index', [CadresController::class, 'index'])->name('index');
        });

        /* V20 - Vitamin A */
        Route::prefix('vitamin-a')->name('vitamin-a.')->group(function(){
            Route::get('detail', [VitaminAController::class, 'detail'])->name('detail');
            Route::get('dashboard/{idMedicalStation}/{idHealthFacility}', [VitaminAController::class, 'dashboard'])->name('dashboard');

            /* ĐỊA ĐIỂM TRIỂN KHAI */
            Route::prefix('deployment-location')->name('deployment-location.')->group(function(){
                Route::get('index/{idMedicalStation}/{idHealthFacility}', [DeploymentLocationController::class, 'index'])->name('index');
            });

            /* QUẢN LÍ ĐỐI TƯỢNG (BỆNH NHÂN) */
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

            /* QUẢN LÍ VITAMIN */
            Route::prefix('vitamin')->name('vitamin.')->group(function(){
                Route::get('index/{idMedicalStation}/{idHealthFacility}', [VitaminController::class, 'index'])->name('index');
            });

            /* QUẢN LÍ LỊCH TRIỂN KHAI UỐNG VITAMIN VÀ XỔ GIUN */
            Route::prefix('schedule')->name('schedule.')->group(function(){
                Route::get('index/{idMedicalStation}/{idHealthFacility}', [ScheduleController::class, 'index'])->name('index');
            });
        });


        // V20 thuốc vật tư 
        Route::prefix('thuoc_vattu')->name('thuoc_vattu.')->group(function(){
              // xem chi tiết với quyền syt và ttyt
            Route::get('statistical/{idHealthFacility}/{idMedicalStation}', [Thuoc_vattuController::class, 'detail'])->name('statistical');
             // xem chi tiết và xử lý với quyền admin trạm y tế
            Route::get('dashboard/{idHealthFacility}/{idMedicalStation}', [Thuoc_vattuController::class, 'dashboard'])->name('dashboard');

           //danh sách thuốc
           Route::get('list_thuoc/{idHealthFacility}/{idMedicalStation}', [DanhsachthuocController::class, 'list'])->name('list_thuoc');
        //  danh sách đường dùng
           Route::get('list_duongdung/{idHealthFacility}/{idMedicalStation}', [DanhsachduongdungController::class, 'list'])->name('list_duongdung');
           //danh sách nhà cung cấp
           Route::get('list_nhacungcap/{idHealthFacility}/{idMedicalStation}', [DanhsachnhacungcapController::class, 'list'])->name('list_nhacungcap');
           //danh sách hang san xuất
           Route::get('list_hangsanxuat/{idHealthFacility}/{idMedicalStation}', [DanhsachhangsanxuatController::class, 'list'])->name('list_hangsanxuat');
           //danh sách nước sản xuất
           Route::get('list_nuocsanxuat/{idHealthFacility}/{idMedicalStation}', [DanhsachnuocsanxuatController::class, 'list'])->name('list_nuocsanxuat');
            //   Nguồn nhập
            Route::get('list_nguonnhap/{idHealthFacility}/{idMedicalStation}', [NguonnhapController::class, 'list'])->name('list_nguonnhap');
         
           //danh sách vật tư
           Route::get('list_vattu/{idHealthFacility}/{idMedicalStation}', [DanhsachVattuController::class, 'list'])->name('list_vattu');
           
           // danh sách thuốc dưới 7 ngày
           Route::get('list_medicine7/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc7Controller::class, 'list'])->name('list_medicine7');
           // danh sách thuốc dưới 15 ngày
           Route::get('list_medicine15/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc15Controller::class, 'list'])->name('list_medicine15');
           // danh sách thuốc dưới 1 tháng
           Route::get('list_medicine30/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc30Controller::class, 'list'])->name('list_medicine30');
           // danh sách thuốc dưới 2 tháng
           Route::get('list_medicine60/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc60Controller::class, 'list'])->name('list_medicine60');
           // danh sách thuốc dưới 3 tháng
           Route::get('list_medicine90/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc90Controller::class, 'list'])->name('list_medicine90');
         // danh sách thuốc dưới 6 tháng
           Route::get('list_medicine180/{idHealthFacility}/{idMedicalStation}', [DanhsachThuoc180Controller::class, 'list'])->name('list_medicine180');


           // Lập phiếu nhâp phiếu lập controller ở đây là phiếu nhập
           Route::get('lapphieunhap/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'lapphieu'])->name('lapphieunhap');
           // luu dữ liệu vào data vs trang thai là 0 (tụa như là chức năng thêm)
           Route::post('lapphieu/Add/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'themlapphieu'])->name('themlapphieu');
            // tiếp theo phiếu nhập chi tiếp lập danh sách thuốc cần nhập
           Route::get('lapdanhsachthuoc/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'danhsachthuoccannhap'])->name('danhsachthuoccannhap');

           
           //Excel
           Route::post('/nhapthuoc/import_csv/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'import_csv'])->name('import_csv');
           Route::post('/nhapthuoc/export_csv/{idHealthFacility}/{idMedicalStation}', [PhieulapController::class, 'export_csv'])->name('export_csv');




            //    xem vị trí trạm y tế
            Route::get('xemvitri/{idHealthFacility}/{idMedicalStation}', [LocationController::class, 'location'])->name('location');


            // lập phiếu xuất
           Route::get('lapphieuxuat/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'lapphieu'])->name('lapphieuxuat');
           Route::post('lapphieuxuat/Add/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'themlapphieu'])->name('themlapphieu');
           // tiếp theo phiếu xuất chi tiếp lập danh sách thuốc cần xuất
           Route::get('lapdanhsachxuatthuoc/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'danhsachthuoccanxuat'])->name('danhsachthuoccanxuat');
                    

            //    excel
            Route::post('/xuatthuoc/import_csv/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'import_csv'])->name('import_csv');
            Route::post('/xuatthuoc/export_csv/{idHealthFacility}/{idMedicalStation}', [PhieuxuatController::class, 'export_csv'])->name('export_csv');


            // Xác nhận phiếu nhập xuất chỉ ở cấp trung tâm y tế
            // Route::get('confirm', [DanhsachThuoc125Controller::class, 'confirm'])->name('confirm');

           // thanh lý thuốc hết hạn bên trạm y tế
           Route::get('thanhlythuochethan/{idHealthFacility}/{idMedicalStation}',[ThanhlyThuochethanController::class, 'list'])->name('list_thanhlythuoc');
           //    Gửi yêu cầu thanh lý thuốc đến trung tâm y tế
           Route::get('guiyeucauthanhly/{idHealthFacility}/{idMedicalStation}',[ThanhlyThuochethanController::class, 'guiyeucau'])->name('guiyeucau');
            //    them thông tin vào cơ sở dữ liệu và gửi đi đến trung tâm y tế
           Route::post('/thanhlythuoc/guiyeucau/{idHealthFacility}/{idMedicalStation}',[ThanhlyThuochethanController::class, 'themvaodanhsach'])->name('themvaodanhsach');
            // xác nhận hủy thuốc bên trung tâm y tế
            Route::get('/xemchitiet/{idHealthFacility}/{idMedicalStation}',[HuythuocController::class, 'xemchitiet'])->name('xemchitiet');
            // duyệt phiếu 
            Route::get('/duyetphieu/{idHealthFacility}/{idMedicalStation}',[DuyetController::class, 'xoa'])->name('xoa');


            // Xác nhận nhập thuốc bên trung tâm y tế
            Route::get('/xacnhan_nhapthuoc/{idHealthFacility}/{idMedicalStation}',[XacnhanphieulapController::class, 'xemchitiet'])->name('xemchitietnhap');
            // duyệt phiếu nhập thêm dữ liệu vào bảng thuoc
            Route::get('/duyetphieunhap/{idHealthFacility}/{idMedicalStation}',[XacnhanphieulapController::class, 'them'])->name('xemchitiet');

            
            // Xác nhận xuất thuốc bên trung tâm y tế
            Route::get('/xacnhan_xuatthuoc/{idHealthFacility}/{idMedicalStation}',[XuatthuocController::class, 'xemchitiet'])->name('xemchitietxuat');
            Route::get('/duyetphieuxuat/{idHealthFacility}/{idMedicalStation}',[XuatthuocController::class, 'duyetphieuxuat'])->name('xemchitietxuat');

            //   phân loại thuốc

            Route::get('/phanloaithuoc/{idHealthFacility}/{idMedicalStation}',[PhanloaithuocController::class, 'phanloai'])->name('phanloai');
            Route::get('loaithuoc/{idHealthFacility}/{idMedicalStation}/{idthuoc}',[PhanloaithuocController::class, 'loaithuoc'])->name('loaithuoc');

            
            // Quản lý và kết xuất thông tin báo cáo
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
        #region /* KHU VỰC THỬ NGHIỆM */

            Route::get('char', function(){
                return view('char');
            });

            /* API CÁC TỈNH - HUYỆN - XÃ Ở VIỆT NAM */
            Route::view('api-list-provices', 'api-provices');

            /* TẠO DỮ LIỆU VÀO BẢNG COUNTRIES */
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

            /* Google Map (Chưa có Key) */
            Route::view('api-google-map', 'map');
        #endregion
    });
});
