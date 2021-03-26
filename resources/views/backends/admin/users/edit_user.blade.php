@extends('backends.dashboard.section')
@section('main')

<section id="main-content">
	<section class="wrapper">
        <div class="form-w3layouts">
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                 Create User
                {{-- <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span> --}}
            </header>
            <div class="panel-body">
                @if(session()->has('messagecategory'))
                <p style="text-align: center;color: red;font-size: 14px; padding-bottom: 4px;">{{session()->get('messagecategory')}}</p>
                @endif
                <div class="form">
                    <form class="cmxform form-horizontal " id="signupForm" method="post" action="{{Route('post.edit.user',$userId->id ?? null)}}"   enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-3">Name</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="firstname" name="name" type="text" value="{{$userId->name ?? null}}">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('name') }}</p>
                        </div>

                        <div class="form-group ">
                            <label for="lastname" class="control-label col-lg-3">Email</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="lastname" name="email" type="email" value="{{$userId->email ?? null}}">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-3">Password</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="username" name="password" type="password" value="">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('password') }}</p>
                        </div>
                        {{-- <div class="form-group ">
                            <label for="password" class="control-label col-lg-3">Confirm_password</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="password" name="confirm_password" type="password">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('confirm_password') }}</p>
                        </div> --}}

                        <div class="form-group">

                            <label for="cars" class="control-label col-lg-3">Roles</label>
                            <div class="col-lg-6">
                              <div class="row">
                                {{-- @if() --}}
                                @foreach($userId->roles as $item)
                                <div class="col-lg-6">

                                    <div class="checkbox">
                                        <label>
                                            <input  name="roles[]" type="checkbox" value="{{$item->id ?? null}}" checked>
                                             {{$item->name ?? null}}
                                        </label>
                                    </div>



                                    </div>
                                    @endforeach
                                    @foreach(  $userNotId as $item)
                                    <div class="col-lg-6">
                                    <div class="checkbox">
                                        <label>
                                            <input  name="roles[]" type="checkbox" value="{{$item->id ?? null}}" >
                                             {{$item->name ?? null}}
                                        </label>
                                    </div>
                                </div>
                                    @endforeach
                                    {{-- @endif --}}
                                </div>
                                </div>


                                </div>


                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Create</button>
                                <button class="btn btn-default" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>



@endsection
