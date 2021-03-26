<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{
     public function index(){
         if(Auth::check()  == true){
            return view('backends.dashboard.section');
         }
        else{
            return redirect()->route('get.login.admin');
        }
     }
}
