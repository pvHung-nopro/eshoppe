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


                    {{-- <div class="price-range"><!--price-range-->
                        <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phạm vi giá</font></font></h2>
                        <div class="well">
                             <div class="slider slider-horizontal" style="width: 178px;"><div class="slider-track"><div class="slider-selection" style="left: 41.6667%; width: 33.3333%;"></div><div class="slider-handle round left-round" style="left: 41.6667%;"></div><div class="slider-handle round" style="left: 75%;"></div></div><div class="tooltip top" style="top: -30px; left: 70.8333px;"><div class="tooltip-arrow"></div><div class="tooltip-inner"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">250: 450</font></font></div></div><input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" style=""></div><br>
                             <b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 0</font></font></b> <b class="pull-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 600</font></font></b>
                        </div>
                    </div><!--/price-range--> --}}
                    @include('frontends.priceFiltering.price_filtering')

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('frontend/images/home/shipping.jpg')}}" alt="">
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->

                 <h2 class="title text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Các mục tính năng</font></font></h2>
                   @foreach($product_price as $item)
                 <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('frontend/images/home/'.$item->image)}}" alt="">
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

                    <ul class="pagination">
                       {{$product_price->links()}}
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
