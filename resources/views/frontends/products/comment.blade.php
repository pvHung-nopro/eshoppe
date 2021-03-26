<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class=""><a href="#details" data-toggle="tab">Brand</a></li>
            {{-- <li class=""><a href="#companyprofile" data-toggle="tab">Company Profile</a></li> --}}
            <li class=""><a href="#tag" data-toggle="tab">Category</a></li>
            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details">
            @if($brandId)
            @foreach($brandId as $item)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{asset('frontend/images/home/'.$item->image)}}" alt="">
                            <h2>${{floatval($item->price ?? null)}}</h2>
                            <p>{{$item->name ?? null}}</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>


        <div class="tab-pane fade" id="tag">
            @if($categoryId)
            @foreach( $categoryId as $item)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{asset('frontend/images/home/'.$item->image ?? null)}}" alt="">
                            <h2>${{floatval($item->price ?? null)}}</h2>
                            <p>{{$item->name ?? null}}</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>

        <div class="tab-pane fade active in" id="reviews">
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
              <div id="listComment">
                <p>  <span>Hung:</span>   <span> ok luaan</span></p>
              </div>

                <s><b>Write Your Review</b></span>

                <form action="" method="post" >

                    <span>
                        <input type="text" placeholder="Your Name">
                        <input type="email" placeholder="Email Address">
                    </span>
                    <textarea class="comment_class" name="commentOk" value=""></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="">
                    <button id="comment" type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
                <p class="errorComment"></p>
            </div>
        </div>

    </div>
</div><!--/category-tab-->
