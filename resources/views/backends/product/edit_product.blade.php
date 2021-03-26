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
        <form role="form" action="{{Route('post.edit.product',['id'=>$productIds->id,'check'=>$productIds->is_feature,'image'=>$productIds->image ])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Name</label>

                    <input class=" form-control" id="cname" name="name"  type="text" value="{{$productIds->name ?? null}}" >
                    <p class="help is-danger errors_sub">{{ $errors->first('name') }}</p>
            </div>

            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Slug</label>

                    <input class=" form-control" id="cname" name="slug"  type="text" value="{{$productIds->slug ?? null}}" >
                    <p class="help is-danger errors_sub">{{ $errors->first('slug') }}</p>
            </div>

            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">Price</label>

                    <input class=" form-control" id="cname" name="price"  type="text" value="{{$productIds->price ?? null}}" >
                    <p class="help is-danger errors_sub">{{ $errors->first('price') }}</p>
            </div>

            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">meta_title</label>

                    <input class=" form-control" id="cname" name="title"  type="text" value="{{$productIds->meta_title ?? null}}" >
                    <p class="help is-danger errors_sub">{{ $errors->first('title') }}</p>
            </div>

            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">meta_desc</label>

                    <input class=" form-control" id="cname" name="desc"  type="text" value="{{$productIds->meta_desc ?? null}}" >
                    <p class="help is-danger errors_sub">{{ $errors->first('desc') }}</p>
            </div>
            <div class="form-group ">
                <label for="cname" class="control-label col-lg-3">meta_keyword</label>

                    <input class=" form-control" id="cname" name="keyword"  type="text" value="{{$productIds->meta_keyword ?? null}}">
                    <p class="help is-danger errors_sub">{{ $errors->first('desc') }}</p>
            </div>



            @if($productIds->is_feature == '0')
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
                @else
                <div class="form-group">
                    <div class="form-check">
                         <label for="exampleInputFile">show home</label>
                         <br/>
                        <input class="form-check-input" type="radio" name="is_feature" value="1" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                        Yes
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_feature" value="0" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                         No
                        </label>
                      </div>

                    </div>
                @endif

                <div class="form-group">

                    <label for="cars" class="control-label col-lg-3">category</label>
                    <div class="">

                    <select class="form-control m-bot15" name="category">

                        @if( $category_productId == [] )
                        <option value=""> chưa chọn </option>
                        @else
                        @foreach( $category_productId as $items)
                        <option value="{{$items['category_id'] ?? null}}">{{ $items['category_name'] ?? null}}  </option>

                        @endforeach

                        @endif
                        @if(  $notcategory_productId )
                         @foreach($notcategory_productId as $item)
                        <option value="{{$item->id ?? null}}">{{$item->name ?? null}}</option>
                         @endforeach
                         @endif
                    </select>
                    </div>
                </div>

                <div class="form-group">

                    <label for="cars" class="control-label col-lg-3">category</label>
                    <div class="">

                    <select class="form-control m-bot15" name="subcategory">

                        @if(  $subcategory_productId == [] )
                        <option value=""> chưa chọn </option>
                        @else
                        @foreach( $category_productId as $items)
                        <option value="{{$items['subcategory_id'] ?? null}}">{{ $items['subcategory_name'] ?? null}}  </option>

                        @endforeach

                        @endif
                        @if(     $notsubcategory_productId )
                         @foreach(   $notsubcategory_productId as $item)
                        <option value="{{$item->id ?? null}}">{{$item->sub_name ?? null}}</option>
                         @endforeach
                         @endif
                    </select>
                    </div>
                </div>


                <div class="form-group">

                    <label for="cars" class="control-label col-lg-3">category</label>
                    <div class="">

                    <select class="form-control m-bot15" name="brand">

                        @if(  $brand_productId == [] )
                        <option value=""> chưa chọn </option>
                        @else
                        @foreach(  $brand_productId as $items)
                        <option value="{{$items['subcategory_id'] ?? null}}">{{ $items['subcategory_name'] ?? null}}  </option>

                        @endforeach

                        @endif
                        @if( $notbrand_productId  )
                         @foreach(    $notbrand_productId  as $item)
                        <option value="{{$item->id ?? null}}">{{$item->name ?? null}}</option>
                         @endforeach
                         @endif
                    </select>
                    </div>
                </div>





                <div class="form-group">
                    <label for="exampleInputFile">select image</label>
                    <input type="file" id="exampleInputFile" name="imageProduct" >
                    @if($productIds)
                    @if($productIds->is_feature == '1')
                    <img style="width: 70px;" src="{{asset('frontend/images/home/'.$productIds->image ?? null)}}" />
                   @else
                   <img style="width: 70px;" src="{{asset('frontend/images/shop/'.$productIds->image ?? null)}}" />
                   @endif
                    @endif
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
