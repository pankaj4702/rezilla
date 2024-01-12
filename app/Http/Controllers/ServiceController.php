<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{AssetManagement,Commercial,Holiday_Homes,Service};


class ServiceController extends Controller
{
    public function getAsset(){
        $assets = AssetManagement::where('status',1)->get();
        $services = Service::where('status',1)->get();
      return view('frontend.services.asset',compact('assets','services'));
    }

    public function getHolidayHomes(){
        $assets = Holiday_Homes::where('status',1)->get();
        $services = Service::where('status',1)->get();
        return view('frontend.services.holidayHomes',compact('assets','services'));
    }

    public function getCommercial(){
               $assets = Commercial::where('status',1)->get();
        return view('frontend.services.commercial',compact('assets'));
    }


}
