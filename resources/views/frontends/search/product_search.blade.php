<?php
    // dd($categorySub_product);
    // dd($categorys_product);
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

                          <x-menu/>
                          <x-brand></x-brand>



                    @include('frontends.priceFiltering.price_filtering')

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('frontend/images/home/shipping.jpg')}}" alt="">
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->

                 <h2 class="title text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Các mục tính năng</font></font></h2>
                @foreach($productSearch as $item)
                 <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('frontend/'.$item->image)}}" alt="">
                                    <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ {{$item->price ?? null}}</font></font></h2>
                                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phiên bản Easy Polo Black</font></font></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào giỏ hàng</font></font></a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 56</font></font></h2>
                                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phiên bản Easy Polo Black</font></font></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào giỏ hàng</font></font></a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào danh sách yêu thích</font></font></a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào để so sánh</font></font></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if($categorys_product)
                    @foreach($categorys_product as $itemProduct)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('frontend/'.$itemProduct->image)}}" alt="">
                                    <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ {{$itemProduct->price ?? null}}</font></font></h2>
                                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phiên bản Easy Polo Black</font></font></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào giỏ hàng</font></font></a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 56</font></font></h2>
                                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phiên bản Easy Polo Black</font></font></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào giỏ hàng</font></font></a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào danh sách yêu thích</font></font></a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào để so sánh</font></font></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif


                    @if($categorySub_product)
                    @foreach($categorySub_product as $itemProduct)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('frontend/'.$itemProduct->image)}}" alt="">
                                    <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ {{$itemProduct->price ?? null}}</font></font></h2>
                                    <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phiên bản Easy Polo Black</font></font></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào giỏ hàng</font></font></a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 56</font></font></h2>
                                        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phiên bản Easy Polo Black</font></font></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào giỏ hàng</font></font></a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào danh sách yêu thích</font></font></a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm vào để so sánh</font></font></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif



                    <ul class="pagination">
                        {{-- <li class="active"><a href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></a></li>
                        <li><a href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">2</font></font></a></li>
                        <li><a href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></a></li>
                        <li><a href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">»</font></font></a></li> --}}
                       @if($categorys_product)
                       {{ $categorys_product->links() }}
                       @endif

                       @if($categorySub_product)
                       {{ $categorySub_product->links() }}
                       @endif
                    </ul>
                </div><!--features_items-->










            </div>
        </div>
    </div>
</section>
