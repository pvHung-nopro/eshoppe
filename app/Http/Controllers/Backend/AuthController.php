<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
   public function getLogin()
   {
       return view('backends.login.section');
   }

   public function postLogin(Request $request)
   {
    $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:3'
     ],[
        'email.required'=>'is not allowed to be empty!',
        'email.email'=>'Email invalidate!',
        'password.required'=>'is not allowed to be empty!',
        'password.min'=>'password is too short!'
     ]);
    $credentials = $request->only('email', 'password');

    // dd(Auth::attempt($credentials));

    if (Auth::attempt($credentials)) {
       return redirect()->route('admin.dasboard');
    }else{
        return redirect()->back();
    }
   }

   public function logout()
   {
       Auth::logout();
       return redirect()->route('get.login.admin');
   }
}
