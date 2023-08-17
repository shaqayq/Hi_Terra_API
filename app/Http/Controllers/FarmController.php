<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\farm;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getFarms()
    {
      
        $farmResults = farm::select('farmName','longitude', 'latitude')->get();
        return response()->json([ 'farmsResult'=>$farmResults]);
    }

   

    public function getCountOfFarms()
    {
        $totalFarms = Farm::countAllFarms();
        return response()->json(['totalFarms' => $totalFarms]);
    }

    
  
}
