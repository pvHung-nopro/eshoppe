<div class="price-range-block">

	<div class="sliderText slider_text"><p><h4>PHẠM VI GIÁ</h4></p></div>

	<div id="slider-range" class="price-filter-range input_price" name="rangeInput">
        <div>

        </div>
    </div>
    <div id="searchResults" class="search-results-block"></div>
	<div class="price_rand">
        <form action="{{Route('product.price')}}"  method="post" style="text-align: center;">
            @csrf
	  <input type="number" min=0 max="9999" name="min" value=""  id="min_price" class="price-range-field" />
	  <input type="number" min=0 max="10000" name="max" value="" id="max_price" class="price-range-field" />
      <br/>
      <button class="price-range-search btn btn-warning " id="price-range-submit" style="padding: 2px 3px; margin-top:14px">Search</button>
        </form>
    </div>





</div>

<style>
.sliderText{
    margin-top: 30px;
    color: #FE980F;
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    font-weight: 700;
    margin: 0 auto 30px;
    text-align: center;
    text-transform: uppercase;
}
.price-filter-range {
    width: 178px;
    margin: auto;
    border-radius: 15px;
    background-image: linear-gradient(to bottom, #f5f5f5, #f9f9f9);
    }

.ui-slider-range  {
    background: none repeat scroll 0 0 #FE980F;
    border-radius: 15px;
    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0)

}
.ui-widget.ui-widget-content {
    /* border: 2px solid #202020;
     background: green */
    }
.ui-slider-handle.ui-corner-all.ui-state-default {
    width: 1em;
    height: 1.4em;
}
.ui-state-focus.ui-state-hover.ui-state-active{
    border: none;
}
.price_rand input{
    visibility: hidden;
}
.search-results-block{
    background-color: #FE980F;
    width: 26%;
    margin: auto;
    text-align: center;
    margin-top: 6px;
}
</style>
<script>

</script>
