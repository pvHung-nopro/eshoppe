@extends('layouts.frontend')

@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    {{-- <div id="app">
                       <login></login>
                    </div> --}}
                   <div id="rand">
                     <rand></rand>
                   </div>

                </div><!--/login form-->
            </div>
            {{-- <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div> --}}
            {{-- <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <div id="register">
                <register></register>
                    </div>
                    </form>
                </div><!--/sign up form-->
            </div> --}}
        </div>

    </div>
</section>

@endsection
