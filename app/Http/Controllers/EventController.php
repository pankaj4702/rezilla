<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email_Massage;

class EventController extends Controller
{
    public function sendMail(){
        return view('admin.events.sendMail');
    }
    public function addMail(Request $request){
        $email = Email_Massage::create([
            'email_message' => $request->massage,
            'status' => 1,
        ]);
        return redirect()->back();
    }
}
