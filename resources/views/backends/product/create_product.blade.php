@extends('backends.dashboard.section')
@section('main')
<section id="main-content">
	<section class="wrapper">
        <div class="form-w3layouts">
            <!-- page start-->
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                        <section class="panel">

<div class="panel-body">
    <div class="position-center">
        @if(session()->has('messageImage'))
        <div class="invalid-feedback">
             {{session()->get('messageImage')}}
          </div>
        @endif
        <form role="form" action="{{Route('post.create.product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Name</label>

                    <input class=" form-control" id="cname" name="name"  type="text" >
                    <p class="help is-danger errors_sub">{{ $errors->first('name') }}</p>
            </div>

            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Slug</label>

                    <input class=" form-control" id="cname" name="slug"  type="text" >
                    <p class="help is-danger errors_sub">{{ $errors->first('slug') }}</p>
            </div>

            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Price</label>

                    <input class=" form-control" id="cname" name="price"  type="text" >
                    <p class="help is-danger errors_sub">{{ $errors->first('price') }}</p>
            </div>

            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">meta_title</label>

                    <input class=" form-control" id="cname" name="title"  type="text" >
                    <p class="help is-danger errors_sub">{{ $errors->first('title') }}</p>
            </div>

            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">meta_desc</label>

                    <input class=" form-control" id="cname" name="desc"  type="text" >
                    <p class="help is-danger errors_sub">{{ $errors->first('desc') }}</p>
            </div>
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">meta_keyword</label>

                    <input class=" form-control" id="cname" name="keyword"  type="text" >
                    <p class="help is-danger errors_sub">{{ $errors->first('desc') }}</p>
            </div>




            <div class="form-group">
                <div class="form-check">
                     <label for="exampleInputFile">show home</label>
                     <br/>
                    <input class="form-check-input" type="radio" name="is_feature" value="1" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Yes
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_feature" value="0" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                     No
                    </label>
                  </div>

                </div>

                <div class="form-group">

                    <label for="cars" class="control-label col-lg-3">category</label>
                    <div class="">
                    <select class="form-control m-bot15" name="category">
                        <option value="">chưa chọn </option>
                         @foreach($category as $item)
                        <option value="{{$item->id ?? null}}">{{$item->name ?? null}}</option>
                         @endforeach
                    </select>
                    </div>
                </div>

                <div class="form-group">

                    <label for="cars" class="control-label col-lg-3">subcategory</label>
                    <div class="">
                    <select class="form-control m-bot15" name="subcategory">
                        <option value="">chưa chọn </option>
                         @foreach($subCategory as $item)
                        <option value="{{$item->id ?? null}}">{{$item->sub_name ?? null}}</option>
                         @endforeach
                    </select>
                    </div>
                </div>

                <div class="form-group">

                    <label for="cars" class="control-label col-lg-3">brand</label>
                    <div class="">
                    <select class="form-control m-bot15" name="brand">
                        <option value="">chưa chọn </option>
                         @foreach($brand as $item)
                        <option value="{{$item->id ?? null}}">{{$item->name ?? null}}</option>
                         @endforeach
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">select image</label>
                    <input type="file" id="exampleInputFile" name="imageProduct" >

                </div>
                <button type="submit" class="btn btn-info">create</button>
            </div>




    </form>
    </div>

</div>

</div>
</div>
</div>
    </section>
    </section>
</section>
@endsection
