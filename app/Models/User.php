<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'id',
        'ten_tai_khoan',
        'password',
        'trang_thai',
        'loai_nguoi_dung'
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Lấy cơ sở y tế của người dùng đang truy cập */
    public function healthFacilityByUser(){
        $cadresByIdUser = Cadres::find(Auth::user()->id_cadres);
        if(isset($cadresByIdUser->id_work_unit)){
            $wordUnitByIdCadres = WorkUnit::find($cadresByIdUser->id_work_unit);
            $healthFacilityByIdWorkUnit = HealthFacility::find($wordUnitByIdCadres->id_health_facility);
            return $healthFacilityByIdWorkUnit;
        }else{
            return null;
        }
    }

    /* Lấy thông tin cán bộ y tế của người dùng đang truy cập */
    public function cadresByUserAuth(){
        $cadresByIdUser = Cadres::find(Auth::user()->id_cadres);
        return $cadresByIdUser;
    }

    /* Lấy cán bộ từ người dùng */
    public function cadresByUser($idCadresByUser){
        $cadresByUser = Cadres::find($idCadresByUser);
        return $cadresByUser;
    }

    /* Lấy chức vụ của cán bộ */
    public function positionByCadres($idPositionCadres){
        if(isset($idPositionCadres)){
            $postionByCadres = Position::find($idPositionCadres);
            return $postionByCadres;
        }else{
            return null;
        }
    }

    /* Lấy chức danh của cán bộ */
    public function titleByCadres($idTitleCadres){
        if(isset($idTitleCadres)){
            $titleByCadres = Title::find($idTitleCadres);
            return $titleByCadres;
        }else{
            return null;
        }
    }

    /* Lấy đơn vị công tác của cán bộ */
    public function workUnitByCadres($idWorkUnitByCadres){
        if(isset($idWorkUnitByCadres)){
            $workUnitByCadres = WorkUnit::find($idWorkUnitByCadres);
            return $workUnitByCadres;
        }else{
            return null;
        }
    }

    /* Lấy chuyên ngành từ cán bộ */
    public function specializedByCadres($idSpecializedByCadres){
        if(isset($idSpecializedByCadres)){
            $specializedByCadres = Specialized::find($idSpecializedByCadres);
            return $specializedByCadres;
        }else{
            return null;
        }
    }
}
