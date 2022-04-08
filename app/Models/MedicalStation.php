<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalStation extends Model
{
    use HasFactory;

    function searchMedicalStations($searchKey){
        try {
            $medicalStations = MedicalStation::where('ten_tram_y_te','like','%'.$searchKey.'%')->get();
            $output = '';
            foreach ($medicalStations as $medicalStation) {
                $output .= '
                    <a href="'. route('manager.dashboard.medical-station.statistical',['idMedicalStation'=>$medicalStation->id]) .'" class="col-lg-3 col-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fa-solid fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">'. $medicalStation->ten_tram_y_te .'</span>
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
