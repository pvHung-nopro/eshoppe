<?php

namespace App\Services;
   use App\User;
   use App\Models\roles;
   use App\Models\permission;
   use Illuminate\Http\Request;
   use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class RolesService{

     public function createPermission()
     {
        return permission::where('parent_id',0)->get();

     }

     public function create_permission_child()
     {
        //   permission::permissionChild()->get();
     }

     public function postCreateRoles(Request $request)
     {
           $data = [];
           $data['name'] = $request->name;
           $data['display_name'] = $request->display_name;

          $roles =  roles::create($data) ;
        $roles->permissions()->attach($request->permission_child);
           return redirect()->back()->with('messageRoles','thêm thành công');
     }


     public function showRoles()
     {
         return roles::paginate(4);

     }

    //edit

    public function editRoles($id)
    {
          return    roles::find($id);

    //    dd($b);
    }
    public function editCheck($id)
    {
        $checkout = $this->editRoles($id);
    return     $checkoutId = $checkout->permissions;

        // $a  =    $checkoutId->contains('id',2);
        // dd($a);

    }
    public function postEditRoles(Request $request,$id)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['display_name'] = $request->display_name;

       $roles = roles::find($id);
       $roles->update($data);
       $roles->permissions()->sync($request->permission_child);
       return redirect()->route('show.roles')->with('message','cập nhật thành công');

    }


    public function deletedRoles($id)
    {
          $rolesId = roles::find($id);
          $rolesId->destroy($id);


           $rolesId->users()->detach() ;
           $rolesId->permissions()->detach() ;
           return redirect()->back()->with('message','xóa thành công');

    }




}
