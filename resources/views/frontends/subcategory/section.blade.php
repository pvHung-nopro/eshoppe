<?php
// dd($headTitle);
// die;
//    dd($productFeature) ;
//    die;

// dd($headsubTitle);
// die;
// dd($productSubFeature);
// die;
?>
<section id="advertisement">
    <div class="container">
        <img src="{{asset('frontend/images/shop/advertisement.jpg')}}" alt="">
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    {{-- <h2>Category</h2> --}}

                    <x-menu> </x-menu>

                    <x-brand> </x-brand>
                    @include('frontends.priceFiltering.price_filtering')

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('frontend/images/home/shipping.jpg')}}" alt="">
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">

                         @if($headsubTitle)
                         {{$headsubTitle}}
                         @endif

                    </h2>


                @if($productSubFeature)
                @foreach($productSubFeature as $products )
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('frontend/images/shop/product12.jpg')}}" alt="">
                            <h2>${{floatval($products->price)}}</h2>
                            <p>{{$products->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>${{floatval($products->price)}}</h2>
                                    <p>{{$products->name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


                    <ul class="pagination ">


                      @if($productSubFeature)
                      {{ $productSubFeature->links() }}
                      @endif

                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
