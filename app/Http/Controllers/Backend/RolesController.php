<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RolesService;
use Auth;
use Validation;
class RolesController extends Controller
{

    protected $rolesService;
    public function __construct(RolesService $rolesService)
    {
       $this->rolesService = $rolesService;
    }

    public function createRoles()
    {
        // dd($request->all()) ;

       if(Auth::check())
       {
     $permission =   $this->rolesService->createPermission();
           return view('backends.admin.roles.create_roles',[
               'permission' => $permission ?? null,
           ]);
       }else{
        return redirect()->route('get.login.admin');
       }
    }

    public function postCreateRoles(Request $request)
    {
        // dd($request->all());
           $this->validateRoles($request);
       return     $this->rolesService->postCreateRoles($request) ;
    }

    public function showRoles()
    {
      if(Auth::check())
      {
          $allRoles = $this->rolesService->showRoles();
          return view('backends.admin.roles.show_roles',[
              'allRoles'=>$allRoles ?? null,
          ]
        );
      }else{
        return redirect()->route('get.login.admin');
      }
    }

    public function validateRoles(Request $request)
    {
        $request->validate([
            'name'=>'required|min:2',
            'display_name'=>'required|min:2'

         ],[
            'name.required'=>'ko dc de trong',
            'name.min'=>'tên quá ngắn!',
            'display_name.required'=>'không được để trống!',
            'display_name.min'=>'tên quá  ngắn!'
         ]);
    }

    public function editRoles($id)
   {
    $this->rolesService->editCheck($id);

         if(Auth::check())
         {
            $permission =   $this->rolesService->createPermission();
             $rolesId = $this->rolesService->editRoles($id);
            $checkId = $this->rolesService->editCheck($id);
             return view('backends.admin.roles.edit_roles',[
                 'rolesId'=>$rolesId ?? null,
                 'permission' =>  $permission ?? null,
                 'checkId' =>  $checkId ?? null
             ]);
         }else{
            return redirect()->route('get.login.admin');
         }
   }

   public function postEditRoles(Request $request,$id)
   {
       $this->validateRoles($request);
      return  $this->rolesService->postEditRoles($request,$id);

   }

   public function deletedRoles($id)
   {
       $this->rolesService->deletedRoles($id);

   }

}
