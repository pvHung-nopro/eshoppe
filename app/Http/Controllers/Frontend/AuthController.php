<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Socialites as ModelsSocialites;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Socialites;
use Illuminate\Auth\Events\Validated;
use Mail;
use Socialite;
class AuthController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function form()
    {
        $google = 'google';
        $facebook = 'facebook';
        return view('frontends.users.form',[
            'google' => $google,
            'facebook' => $facebook,
        ]);
    }
    public function rand(){
        return view('frontends.users.rand_code');
    }

    public function login(Request $request){
        // dd($request->expectsJson());
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
            // Authentication passed...
            return redirect()->route('fontend.cart.order');
            // dd(Auth::check());
    }else{
        return redirect()->back();
    }

    }


    public function register(Request $request){
        $request->validate([
            'name'=>'required|min:3|alpha',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3',
            'password_confim'=>'required|same:password'
         ],[
            'name.required'=>'is not allowed to be empty!',
            'name.min'=>'name is too short!',
            'name.alpha'=>'Malformed name!',
            'email.required'=>'is not allowed to be empty!',
            'email.email'=>'Email invalidate!',
            'email.unique'=>'Email already exists!',
            'password.required'=>'is not allowed to be empty!',
            'password.min'=>'password is too short!',
            'password_confim.required'=>'is not allowed to be empty!',
            'password_confim.same' => 'password confim is not the same!'
         ]);

         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = bcrypt($request->password);
         $user->save();

         return redirect()->back();
    }

    public function logout()
   {
       Auth::logout();
      return redirect()->route('login');
   }

    public function forgotFassword()
   {
       return view('frontends.users.forgot_password') ;
   }

   public function postForgotFassword(Request $request){

    $request->validate([
        'email'=>'required|email',
     ],[
        'email.required'=>'is not allowed to be empty!',
        'email.email'=>'Email invalidate!',
     ]);

    $user = User::where('email','=',$request->email)->get()->toArray();
    if($user  !=  []){

        $rand = rand(100000,999999);

        $to_name = "eshoppe";
        $to_email = "$request->email";//send to this email
        $userId = $user[0]['id'];
        $remember_token = md5($rand);
        $user = User::find($userId);
        // if($user->remember_token  == null){
            $user->remember_token =  $remember_token ;
            $user->save();
            $data = array("link"=>Route('user.updatefassword',$remember_token));

            Mail::send('frontends.users.verify',$data,function($message) use ($to_name,$to_email){
             $message->to($to_email)->subject('LINK FORGOT FASSWORD');//send this mail with subject
             $message->from($to_email,$to_name);//send from this mail


         });
        // }

          return redirect()->back()->with('forgot','Chúng tôi đã gửi qua email liên kết đặt lại mật khẩu của bạn!');


        }else{
            return redirect()->back()->with('forgot','email bạn chưa đăng kí');
        }




   }

   public function updateFassword($remember_token){
    $user = User::where('remember_token',$remember_token)->get()->toArray();
    if($user == [])
    {
        return view('frontends.errors.erorrs');
    }
       return view('frontends.users.update_password',[
           'remember_token'=>$remember_token
       ]);
   }

   public function postUpdateFassword(Request $request, $remember_token){

    $request->validate([
        'password'=>'required|min:3',
        'password_confim'=>'required|same:password'
     ],[
        'password.required'=>'is not allowed to be empty!',
        'password.min'=>'password is too short!',
        'password_confim.required'=>'is not allowed to be empty!',
        'password_confim.same' => 'password confim is not the same!'
     ]);

       $user = User::where('remember_token',$remember_token)->get()->toArray();
       $userId = $user[0]['id'];
       $user  = User::find($userId);
       $user->password = bcrypt($request->password);
       $user->remember_token = null;
      $user->save();

    return redirect()->route('login');
   }


   public function redirectToGoogle($ocialite)
   {
       return Socialite::driver($ocialite)->redirect();
   }


   public function handleGoogleCallback($ocialite)
   {
       try {


           $user = Socialite::driver($ocialite)->user();
        //    dd($user);
           $socialiteProvider =   ModelsSocialites::where('provider_id',$user->getId())->first();

           if(!$socialiteProvider)
           {
               $userId = User::where('email',$user->getEmail())->first();
               if($userId){
                   return redirect()->route('login')->with('erorr','email đã tồn tại ');
               }else{
                   $users = new User();
                   $users->name = $user->getName();
                   $users->email = $user->getEmail();
                   $users->password = bcrypt(12345678);
                   $users->save();

               }
               $provider = new Socialites();
               $provider->provider_id = $user->getId();
               $provider->email = $user->getEmail();
               $provider->provider  = $ocialite ;
               $provider->save();

               $userId = User::where('email',$user->getEmail())->first();
               Auth::login($userId,true) ;
               return redirect()->route('frontend.home');

           }else{
            $userId = User::where('email',$user->getEmail())->first();
           }

           Auth::login($userId,true) ;
           return redirect()->route('frontend.home');



       } catch (\Exception $e) {
           dd($e->getMessage());
       }



   }


}
