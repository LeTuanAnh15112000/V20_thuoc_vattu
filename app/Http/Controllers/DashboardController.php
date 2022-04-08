<?php

namespace App\Http\Controllers;

use App\Imports\MedicalStationImport;
use App\Models\AffiliatedArea;
use App\Models\CanBo;
use App\Models\DepartmentOfHealth;
use App\Models\DonViCongTacCanBo;
use App\Models\HealthFacility;
use App\Models\MedicalCenter;
use App\Models\MedicalStation;
use App\Models\SoYTe;
use Faker\Provider\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /* Điều hướng trang theo quyền */
    function index(){
        if(Auth::user()->hasRole('admin')){
            return view('dashboard.department_of_health.list',['departmentOfHealths'=>DepartmentOfHealth::all()]);
        }elseif(Auth::user()->hasRole('department_of_health')){
            $idDepartmentOfHealth = Auth::user()->healthFacilityByUser()->id_department_of_health;
            $departmentOfHealthByUser = DepartmentOfHealth::find($idDepartmentOfHealth);
            return view('dashboard.department_of_health.statistical',['departmentOfHealthById'=>$departmentOfHealthByUser]);
        }elseif(Auth::user()->hasRole('medical_center')){
            $idMedicalCenterByUser = Auth::user()->healthFacilityByUser()->id_medical_center;
            $medicalCenterByUser = MedicalCenter::find($idMedicalCenterByUser);
            return view('dashboard.medical_center.statistical',['medicalCenterById'=>$medicalCenterByUser]);
        }elseif(Auth::user()->hasRole('medical_station')){
            $idMedicalStationByUser = Auth::user()->healthFacilityByUser()->id_medical_station;
            $medicalStationById = MedicalStation::find($idMedicalStationByUser);
            $medicalCenterById = MedicalCenter::find($medicalStationById->id_medical_center);
            $departmentOfHealthById = DepartmentOfHealth::find($medicalCenterById->id_department_of_health);
            $healthFacility = HealthFacility::where('id_department_of_health', $departmentOfHealthById->id)
            ->where('id_medical_center',$medicalCenterById->id)
            ->where('id_medical_station', $medicalStationById->id)
            ->get()[0];
            return view('dashboard.medical_station.statistical',[
                'medicalStationById'=>$medicalStationById,
                'healthFacility'=>$healthFacility
            ]);
        }
    }
   
    /* Thống kê sở y tế*/
    function statisticalDepartmentOfHealth($idDepartmentOfHealth){
        $departmentOfHealthById = DepartmentOfHealth::find($idDepartmentOfHealth);
        return view('dashboard.department_of_health.statistical',['departmentOfHealthById'=>$departmentOfHealthById]);
    }

    /* Danh sách trung tâm y tế */
    function getMedicalCenters($idDepartmentOfHealth){
        $departmentOfHealthById = DepartmentOfHealth::find($idDepartmentOfHealth);
        $medicalCenterByIdDepartmentOfHealth = MedicalCenter::where('id_department_of_health',$idDepartmentOfHealth)->get();
        return view('dashboard.medical_center.list',[
            'departmentOfHealthById'=>$departmentOfHealthById,
            'medicalCenterByDepartmentOfHealth'=>$medicalCenterByIdDepartmentOfHealth
        ]);
    }

    /* Thống kê trung tâm y tế */
    function statisticalMedicalCenter($idMedicalCenter){
        $medicalCenterById = MedicalCenter::find($idMedicalCenter);
        return view('dashboard.medical_center.statistical',['medicalCenterById'=>$medicalCenterById]);
    }

    /* Danh sách trạm y tế */
    function getMedicalStations($idMedicalCenter){
        $medicalCenterById = MedicalCenter::find($idMedicalCenter);
        return view('dashboard.medical_station.list',[
            'medicalCenterById'=>$medicalCenterById,
            'medicalStationsByIdMedicalCenter'=>MedicalStation::where('id_medical_center',$idMedicalCenter)->get()
        ]);
    }
    
    /* Thống kê trạm y tế */
    function statisticalMedicalStation($idMedicalStation){
        if(Auth::user()->hasRole(['medical_station'])){
            if(Auth::user()->healthFacilityByUser()->id_medical_station != $idMedicalStation){
                return redirect()->back()->with(['msgError'=>'Bạn không có quyền truy cập!']);
            }
        }else{
            $medicalStationById = MedicalStation::find($idMedicalStation);
            $medicalCenterById = MedicalCenter::find($medicalStationById->id_medical_center);
            $departmentOfHealthById = DepartmentOfHealth::find($medicalCenterById->id_department_of_health);
            $healthFacility = HealthFacility::where('id_department_of_health', $departmentOfHealthById->id)
            ->where('id_medical_center',$medicalCenterById->id)
            ->where('id_medical_station', $medicalStationById->id)
            ->get()[0];
            return view('dashboard.medical_station.statistical',[
                'medicalStationById'=>$medicalStationById,
                'healthFacility'=>$healthFacility
            ]);
        }
    }
}
