<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentOfHealth;

class DepartmentOfHealthController extends Controller
{
    

    function navigationDeparmentOfHealth($idDepartmentOfHealth){
        return response()->json($idDepartmentOfHealth);
    }
}
