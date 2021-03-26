<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Models\roles;
use App\User;
use Auth;

class UserController extends Controller
{
        protected $adminService;

        public  function __construct(AdminService $adminService)
        {
           $this->adminService= $adminService;
        }
        protected function  createUser()
         {


             if(Auth::check())
             {
                 $allRoles =  $this->adminService->allRoles();
                   return view('backends.admin.users.create_user',[
                       'allRoles' => $allRoles ?? null ,
                   ]);
             }else{
                return redirect()->route('get.login.admin');
             }
         }

         protected function postCreateUser(Request $request)
         {
           return $this->adminService->postCreateUsers($request);
         }

         protected function showUser()
         {
             if(Auth::check()){
                 $users =  $this->adminService->showUsers();
                 return view('backends.admin.users.show',[
                     'users'=>$users ?? null,
                 ]);
             }else{
                return redirect()->route('get.login.admin');
             }

         }

         // edit user

         protected function editUser($id)
         {
             $this->adminService->roles($id) ;
            if(Auth::check()){
                $userId =  $this->adminService->editUsers($id);
                $userNotId =$this->adminService->roles($id) ;
                return view('backends.admin.users.edit_user',[
                    'userId'=>$userId ?? null ,
                    'userNotId'=> $userNotId ?? null
                ]);
            }else{
                return redirect()->route('get.login.admin');
            }


         }

         protected function postEditUser(Request $request,$id)
         {
            return   $this->adminService->post_editUsers($request,$id);
         }

         protected function deletedUser($id)
         {
           return   $this->adminService->deleteUsers($id);
         }




}
