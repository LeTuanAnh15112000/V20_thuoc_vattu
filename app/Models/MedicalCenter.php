<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MedicalCenter extends Model
{
    use HasFactory;

    function searchMedicalCenters($searchKey){
        try {
            $medicalCenters = MedicalCenter::where('ten_trung_tam_y_te','like','%'.$searchKey.'%')->get();
            $output = '';
            foreach ($medicalCenters as $medicalCenter) {
                $output .= '
                    <a href="'. route('manager.dashboard.medical-center.statistical',['idMedicalCenter'=>$medicalCenter->id]) .'" class="col-lg-3 col-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fa-solid fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">'. $medicalCenter->ten_trung_tam_y_te .'</span>
                            </div>
                        </div>
                    </a>
                ';
            }
            return $output;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
