@extends('layouts.frontend')

@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row" style="display: flex;justify-content: center">
            <div class="col-sm-5 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    @if(session()->has('forgot'))
                    <div class="alert alert-info" role="alert">
                        {{session()->get('forgot')}}
                      </div>
                    @endif
        <form action="{{route('forgout.fassword')}}" method="post">
            @csrf
            <input type="text" name="email" placeholder="email"  >
            <p class="errors__">{{ $errors->first('email') }}</p>
            <button type="submit" class="btn btn-default"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">gửi xác minh tới gmail</font></font></button>
        </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
