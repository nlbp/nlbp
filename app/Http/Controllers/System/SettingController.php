<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    
    public function passportClients()
    {
        return view('system.passport.client');
    }
    
    public function passportAuthorized()
    {
        return view('system.passport.authorized');
    }
}
