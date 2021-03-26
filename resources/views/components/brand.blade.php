



<div class="brands_products"><!--brands_products-->
    <h2>Brands</h2>
    <div class="brands-name">
        <ul class="nav nav-pills nav-stacked">
            @foreach($brands as $brand)
        <li><a href="{{route('frontend.brand.show',$slug=$brand['slug']) ?? null }}"> <span class="pull-right">({{$brand['pull-right'] ?? null }})</span>{{$brand['name']}}</a></li>
            @endforeach
        </ul>
    </div>
</div><!--/brands_products-->
