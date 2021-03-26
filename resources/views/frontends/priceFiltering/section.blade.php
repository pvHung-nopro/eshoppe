@extends('layouts.frontend')


@section('content')
       @include('frontends.priceFiltering.show_product',[
                          'product_price' =>   $product_price ?? null
                                            ]);

@endsection
