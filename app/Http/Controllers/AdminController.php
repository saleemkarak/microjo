<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
   {
       $setting = Setting::where(['status'=>'active'])->limit('1')->first();
       return view('backend.index',compact('setting'));
   }
}
