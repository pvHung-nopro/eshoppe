@extends('backends.dashboard.section')
@section('main')

<section id="main-content">
	<section class="wrapper">
        <div class="form-w3layouts">
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                 Create Roles
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
                    <form class="cmxform form-horizontal " id="signupForm" method="post" action="{{Route('post.edit.roles',$rolesId->id ?? null)}}"   enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-3">Name</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="firstname" name="name" type="text" value="{{$rolesId->name ?? null}}">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('name') }}</p>
                        </div>

                        <div class="form-group ">
                            <label for="lastname" class="control-label col-lg-3">Display_name</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="lastname" name="display_name" type="text" value="{{$rolesId->display_name ?? null}}">
                            </div>
                            <p class="help is-danger errors_sub">{{ $errors->first('display_name') }}</p>
                        </div>

                        <div class="form-group">

                            <label for="cars" class="control-label col-lg-3">Roles</label>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="button" id="btn1" class="btn btn-primary" value="chọn hết"/>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="button" id="btn2" class="btn btn-primary" value="xóa hết"/>
                                    </div>
                                </div>

                                @if($permission)
                                @foreach($permission as $item)


                                    <div class="checkbox card">
                                        <label class="permission_parent__" style="font-weight: 600">
                                            <input  class="check_parent"  name="permission_parent" type="checkbox" value="{{$item->id ?? null}}">
                                             {{$item->name ?? null}}

                                        </label>

                                        <div class="row">
                                            @foreach($item->permissionChild as $child)
                                          <div class="col-lg-6 ">
                                            <label>
                                                <input class="permission_child"  name="permission_child[]" type="checkbox" value="{{$child->id ??null}} "
                                               {{($checkId->contains('id',$child->id) == true ) ? 'checked' : '' }}
                                                >
                                                {{$child->name ?? null}}
                                            </label>
                                          </div>
                                          @endforeach
                                        </div>

                                    </div>




                                    @endforeach
                                    @endif

                                </div>


                                </div>


                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Update</button>
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
