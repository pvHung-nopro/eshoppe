@extends('layouts.frontend')


@section('content')
   @include('frontends.search.product_search',[
       'productSearch' => $productSearch  ?? null,
       'categorySub_product' => $categorySub_product ?? null,
       'categorys_product' > $categorys_product ?? null
   ])

@endsection
