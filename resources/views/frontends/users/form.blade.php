@extends('layouts.frontend')

@section('content')
<section id="form"><!--form-->
    <div class="container">
         @include('frontends.users.register_login',[
             'google' => $google,
             'facebook' => $facebook,
         ]);
    </div>
</section>

@endsection
