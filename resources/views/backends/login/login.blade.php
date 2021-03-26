]
    <div class="log-w3">
    <div class="w3layouts-main">
        <h2>Sign In Now</h2>
            <form action="{{Route('post.login.admin')}}" method="post">
                 @csrf
                 @if(session()->has('messages'))
                   <p class="getmessages_admin">{{session()->get('messages') ?? null}}</p>
                @endif
                <input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
                <p>{{ $errors->first('email') }}</p>
                <input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
                <p>{{ $errors->first('PASSWORD') }}</p>
                <span><input type="checkbox">Remember Me</span>

                <span>
                </span>
                <h6><a href="#">Forgot Password?</a></h6>
                    <div class="clearfix"></div>
                    <input type="submit" value="Sign In" name="login">
            </form>
            <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>
    </div>
    </div>




