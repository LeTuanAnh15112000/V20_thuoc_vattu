<?php

namespace App\Http\Controllers;

use App\Models\Cadres;
use Illuminate\Http\Request;

class CadresController extends Controller
{
    function index(){
        $cadres = Cadres::all();
        return view('cadres.list', ['cadres'=>$cadres]);
    }
}
