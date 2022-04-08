<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cadres extends Model
{
    use HasFactory;

    function workUnitOfCadres($idWorkUnitByCardres){
        $workUnitOfCardres = WorkUnit::find($idWorkUnitByCardres);

        if($workUnitOfCardres->tinh_trang_xoa == 0){
            return $workUnitOfCardres;
        }else{
            return null;
        }
    }
}
