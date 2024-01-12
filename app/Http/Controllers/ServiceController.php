<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getAsset(){
      return view('frontend.services.asset');
    }

    public function getHolidayHomes(){
        return view('frontend.services.holidayHomes');
    }

    public function getCommercial(){
        return view('frontend.services.commercial');
    }
}
