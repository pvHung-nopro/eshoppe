<div class="row">
    <div class="col-sm-4 col-sm-offset-1">
        <div class="login-form"><!--login form-->
            <h2>Login to your account</h2>
            {{-- <div id="app">
               <login></login>
            </div> --}}

            <form action="{{route('post.login')}}" method="post">
                @csrf
                <input type="text" name="email" placeholder="email" >
                <p class="errors__">{{ $errors->first('email') }}</p>
                <input type="password" name="password" placeholder="password">
                <p class="errors__">{{ $errors->first('password') }}</p>
                <div class="checkbox__">
                <div>
                   <span> <input type="checkbox" class="checkbox checkbox___"> </span>
               <span>Giữ cho tôi đăng nhập</span>

                    </div>
                &nbsp; &nbsp;
                 <div style=" color: blue;font-size: 13px;line-height: 2;"><a href="{{Route('forgout.fasswords')}}">quên mật khẩu</a></div>
                 </div>
                 <div class="login___">
                 <span class=""><a href="{{Route('login.ocialite',$google)}}"><i class="fab fa-google"></i> google</a></span>
                 &nbsp; &nbsp;
                 <span><a href="{{Route('login.ocialite',$facebook)}}" ><i class="fab fa-facebook-square"></i> facebook</a></span>
                </div>
                {{-- <a href="{{Route('login.ocialite',$google)}}">login google</a>
                <a href="{{Route('login.ocialite',$facebook)}}">login facebook</a> --}}
                <button type="submit" class="btn btn-default"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng nhập</font></font></button>
            </form>

        </div><!--/login form-->
    </div>
    <div class="col-sm-1">
        <h2 class="or">OR</h2>
    </div>
    <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
            <h2>New User Signup!</h2>
            {{-- <div id="register">
        <register></register>
            </div> --}}
            <form action="{{route('register')}}" method="post">
                @csrf
                <input type="text" name="name" placeholder="Tên">
                <p class="errors__">{{ $errors->first('name') }}</p>
                <input type="text" name="email" placeholder="Địa chỉ email">
                <p class="errors__">{{ $errors->first('email') }}</p>
                <input type="password" name="password" placeholder="Mật khẩu">
                <p class="errors__">{{ $errors->first('password') }}</p>
                <input type="password" name="password_confim" placeholder="Nhập lại mật khẩu">
                <p class="errors__">{{ $errors->first('password_confim') }}</p>
                <button type="submit" class="btn btn-default"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đăng ký</font></font></button>
            </form>


        </div><!--/sign up form-->
    </div>
</div>


<style>
  .errors__{
    color: red;
    font-size: 13px;
  }
}
.login___{
    display: flex;
}
/* .login__ a{
    display:block;
} */
</style>

<script>



</script>
