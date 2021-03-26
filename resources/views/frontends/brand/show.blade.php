@extends('layouts.frontend')


@section('content')
       @include('frontends.brand.section',[


                                              'headbrandTitle'=>$headbrandTitle ?? null,
                                              'productBrand'=>$productBrand ?? collect(),
                                            ]);

@endsection
