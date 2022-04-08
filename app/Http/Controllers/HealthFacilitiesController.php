<?php

namespace App\Http\Controllers;

use App\Models\DepartmentOfHealth;
use App\Models\MedicalCenter;
use App\Models\MedicalStation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthFacilitiesController extends Controller
{
    function index(Request $request){
        if(Auth::user()->hasRole('admin')){
            if(isset($request->idDepartmentOfHealth)){
                $medicalCenters = MedicalCenter::where('id_department_of_health', $request->idDepartmentOfHealth)->get();
                $output = '';
                foreach ($medicalCenters as $medicalCenter) {
                    $output .= '
                        <table class="table table-hover">
                            <tbody>
                                <tr class="medicalCenter" data-widget="expandable-table" aria-expanded="false" data="['.$medicalCenter->id.']">
                                    <td>
                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                        '. $medicalCenter->ten_trung_tam .'
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td>
                                        <div class="p-0" id="medicalStatus'.$medicalCenter->id.'"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    ';
                }
                return response()->json(['idDepartmentOfHealth'=>$request->idDepartmentOfHealth, 'output'=>$output]);
            }elseif(isset($request->idMedicalCenter)){
                $medicalStations = MedicalStation::where('ID_MEDICAL_CENTER', $request->idMedicalCenter)->get();
                $output = '';
                foreach ($medicalStations as $medicalStation) {
                    $output .= '
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>'.$medicalStation->ten_tram.'</td>
                                </tr>
                            </tbody>
                        </table>
                    ';
                }
                return response()->json(['idMedicalCenter'=>$request->idMedicalCenter, 'output'=>$output]);
            }else{
                $departmentOfHealths = DepartmentOfHealth::all();
                return view('medical_location.list',['departmentOfHealths'=>$departmentOfHealths]);
            }
        }elseif(Auth::user()->hasRole('department_of_health')){
            $medicalCenters = MedicalCenter::where('ID_DEPARTMENT_OF_HEALTH',Auth::user()->ID_DINH_DANG_KHU_VUC)->get();
            return view('medical_location.list',['medicalCenters'=>$medicalCenters]);
        }elseif(Auth::user()->hasRole('medical_center')){
            $medicalStations = MedicalStation::where('ID_MEDICAL_CENTER',Auth::user()->ID_DINH_DANG_KHU_VUC)->get();
            return view('medical_location.list',['medicalStations'=>$medicalStations]);
        }else{
            return redirect()->back()->with(['msgDanger'=>'Bạn không có quyền truy cập!']);
        }
    }

    function getHealthFacilitiesLoadOption(Request $request){
        if(isset($request->idDepartmentOfHealth)){
            $medicalCenters = MedicalCenter::where('id_department_of_health', $request->idDepartmentOfHealth)->get();
            $output = '<option>Chọn trung tâm y tế...</option>';
            foreach ($medicalCenters as $medicalCenter) {
                $output .= '
                    <option value="'.$medicalCenter->id.'">'.$medicalCenter->ten_trung_tam.'</option>
                ';
            }
            return response()->json($output);
        }elseif(isset($request->idMedicalCenter)){
            $medicalStations = MedicalStation::where('id_medical_center', $request->idMedicalCenter)->get();
            $output = '<option>Chọn trạm y tế...</option>';
            foreach ($medicalStations as $medicalStation) {
                $output .= '
                    <option value="'.$medicalStation->id.'">'.$medicalStation->ten_tram.'</option>
                ';
            }
            return response()->json(['idMedicalStation'=>$request->idMedicalStation,'output'=>$output]);
        }
    }

     /* Danh sách sở y tế - Live Search */
     function searchHealthFacilities(Request $request){
        $deparmentOfHealth = new DepartmentOfHealth;
        $resultDepartmentOfHealths = $deparmentOfHealth->searchDepartmentOfHealths($request->searchKey);
        if($resultDepartmentOfHealths != ''){
            return response()->json(['status'=>200, 'output'=>$resultDepartmentOfHealths]);
        }else{
            $medicalCenter = new MedicalCenter;
            $resultMedicalCenters = $medicalCenter->searchMedicalCenters($request->searchKey);
            if($resultMedicalCenters != ''){
                return response()->json(['status'=>200, 'output'=>$resultMedicalCenters]);
            }else{
                $medicalStation = new MedicalStation;
                $resultMedicalStations = $medicalStation->searchMedicalStations($request->searchKey);
                if($resultMedicalStations != ''){
                    return response()->json(['status'=>200, 'output'=>$resultMedicalStations]);
                }
            }
        }
    }
}
