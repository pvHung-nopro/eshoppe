

  <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categorys</font></font></h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach ($categorys as $key=>$category)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
            @if(!$category->subcategory->isEmpty())
            <a data-toggle="collapse" data-parent="#accordian" href="#{{$category['name']}}">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                   {{$category['name']}}
            </a>
            @else
            <a  href="{{route('frontend.category.show',$slug=$category['slug'])}}">
                {{$category['name']}}
            </a>
            @endif
            </h4>
        </div>

    <div id="{{$category['name'] ?? null  }}" class="panel-collapse collapse">
        @if(!$category->subcategory->isEmpty())
            <div class="panel-body">
                <ul>
                    @foreach($category->subcategory as $sub)
                    <li><a href="{{route('frontend.subcategory.show',$slug=$sub['sub_slug']) ?? null}}">{{$sub['sub_name']}} </a></li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>
    @endforeach
</div><!--/category-products-->
