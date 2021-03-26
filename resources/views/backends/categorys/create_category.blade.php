@extends('backends.dashboard.section')
@section('main')
<section id="main-content">
	<section class="wrapper">
        <div class="form-w3layouts">
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Advanced Form validations
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">
                @if(session()->has('messagecategory'))
                <p style="text-align: center;color: red;font-size: 14px; padding-bottom: 4px;">{{session()->get('messagecategory')}}</p>
                @endif
                <div class="form">
                    <form class="cmxform form-horizontal " id="signupForm" method="post" action="{{Route('create.post.categorys')}}" novalidate="novalidate">
                        @csrf
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-3">subcategory name</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="firstname" name="name" type="text">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('name') }}</p>
                        </div>

                        <div class="form-group ">
                            <label for="lastname" class="control-label col-lg-3">slug subcategory</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="lastname" name="slug" type="text">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('slug') }}</p>
                        </div>
                        <div class="form-group ">
                            <label for="username" class="control-label col-lg-3">meta_title</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="username" name="title" type="text">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('title') }}</p>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-3">meta_desc</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="password" name="desc" type="text">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('desc') }}</p>
                        </div>
                        <div class="form-group ">
                            <label for="confirm_password" class="control-label col-lg-3">meta_keyword</label>
                            <div class="col-lg-6">
                                <input class="form-control " id="confirm_password" name="keyword" type="text">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('keyword') }}</p>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Save</button>
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
