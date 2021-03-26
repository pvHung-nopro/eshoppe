<?php
   namespace App\Services;
   use App\Models\Customers;
   use Illuminate\Http\Request;
   use Auth;

   class CustomersService
   {
       public function save(Request $request)
       {

          $user = Auth::user() ;

           return Customers::updateOrCreate([
               'phone'=> $request->phone
           ],
           [
               'name'    => $user->name,
               'email'   => $user->email,
               'address' => $request->address,
               'user_id' => $user->id
           ]);
       }
   }


