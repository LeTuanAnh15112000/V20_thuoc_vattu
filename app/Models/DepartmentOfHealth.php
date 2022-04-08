<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DepartmentOfHealth extends Model
{
    use HasFactory;

    public function searchDepartmentOfHealths($searchKey){
        try {
            $departmentOfHealths = DepartmentOfHealth::where('ten_so_y_te','like','%'.$searchKey.'%')->get();
            $output = '';
            foreach ($departmentOfHealths as $departmentOfHealth) {
                $output .= '
                    <a href="'. route('manager.dashboard.department-of-health.statistical',['idDepartmentOfHealth'=>$departmentOfHealth->id]) .'" class="col-lg-3 col-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fa-solid fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">'. $departmentOfHealth->ten_so_y_te .'</span>
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
