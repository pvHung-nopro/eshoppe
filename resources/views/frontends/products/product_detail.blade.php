
<?php
//    dd($productDetail) ;
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">


                    <x-menu> </x-menu>

                    <x-brand> </x-brand>



                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('images/home/shipping.jpg')}}" alt="">
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            @if($productDetail->is_feature == '1')
                            <img src="{{asset('frontend/images/home/'.$productDetail->image)}}" alt="">
                            @endif
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item">
                                      <a href=""><img src="{{asset('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                                      <a href=""><img src="{{asset('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                                      <a href=""><img src="{{asset('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item active left">
                                        <a href=""><img src="{{asset('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{asset('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{asset('images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>
                                    <div class="item next left">
                                        <a href=""><img src="{{asset('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{asset('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                                        <a href=""><img src="{{asset('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                                    </div>

                                </div>

                              <!-- Controls -->
                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="">
                            <h2>{{$productDetail->name ?? null}}</h2>
                            <p>Web ID: {{$productDetail->id ?? null}}</p>
                            <img src="images/product-details/rating.png" alt="">
                            <span>
                                <span>US ${{$productDetail->price ?? null}}</span>
                                <label>Quantity:</label>
                                <input type="text" value="3">
                                <button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            @if($productBrands)
                            <p><b>Thươnhg hiệu:{{$productBrands->brand_name ?? null}}</b> </p>
                            @else
                            <p><b>Thương hiệu:không có</b> </p>
                            @endif
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                    @include('frontends.products.comment',[
                        'brandId'=> $brandId ?? null,
                        'categoryId' =>  $categoryId ?? null
                    ])
                <x-sale></x-sale>

                {{-- <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item next left">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item active left">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend1.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend2.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="images/home/recommend3.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>
                    </div>
                </div><!--/recommended_items--> --}}

            </div>
        </div>
    </div>
</section>
