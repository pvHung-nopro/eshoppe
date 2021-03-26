<?php
   namespace App\Services;
   use App\User;
   use App\Models\roles;
   use Illuminate\Http\Request;
   use DB;
   class AdminService
{
      public function allRoles()
      {
         return roles::all();

      }

      public function postCreateUsers(Request $request)
      {

          try{
            $data = [];
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);

            $user = User::create($data);

            $user->roles()->attach($request->roles);
            return redirect()->route('create.user')->with('message','thêm thành công!');

          }catch (Exception $e){
            DB::rollBack();
            return redirect()->route('create.user')->with('message',$e->getMessage());
          }

      }

      public function showUsers()
      {
        //  $a =  User::join('table_user_roles','users.id','table_user_roles.user_id')
        //  ->sync(['table_user_roles.user_id'])
        //  ->addSelect('users.*','table_user_roles.user_id as user_id','table_user_roles.roles_id as roles_id[]')

        // //  ->leftjoin('')
        //  ->get();
        //  dd($a);
            return    User::with('roles')->paginate(10);

      }

      // edit user
      public function editUsers($id)
      {
         return  User::with('roles')->find($id);

      }

      public function roles($id)
      {
         $rolesId = $this->editUsers($id);
        $rolesIds =  $rolesId->roles->toArray();
        $count = count($rolesIds) ;

      $rolesId_array = [];
       for($i= 0 ; $i<$count ;$i++)
       {
          //  echo ($i);
          array_push($rolesId_array,$rolesIds[$i]['id']) ;
       }



       return  DB::table('roles')->whereNotIn('id',$rolesId_array )->get();

      }

      public function post_editUsers(Request $request,$id)
      {

     try{
         $data = [];
         $data['name'] = $request->name;
         $data['email'] = $request->email;
         if($request->password != null  ){
            $data['password'] = bcrypt($request->password);
            $user = User::find($id) ;
            $user->update($data);
            $user->roles()->sync($request->roles);
            return redirect()->route('show.user')->with('message','edit thành công');
         }else{
            $user = User::find($id) ;
            $user->update($data);
            $user->roles()->sync($request->roles);
            return redirect()->route('show.user')->with('message','edit thành công');
         }



     }catch (Exception $e){
        DB::rollBack();
        return redirect()->back()->with('message',$e->getMessage());

      }
    }

    public function deleteUsers($id)
    {
        $user = User::find($id);
        $user->destroy($id);
        $user->roles()->detach() ;
        return redirect()->route('show.user')->with('message','xóa thành công! ');
    }


}
