@extends('layouts.frontend')


@section('content')
       @include('frontends.category.section',['headTitle'=>$headTitle ?? null,
                                              'productFeature'=>$productFeature ?? collect(),
                                            //   'headsubTitle'=>$headsubTitle ?? null,
                                            //   'productSubFeature'=>$productSubFeature ?? collect(),
                                            //   'headbrandTitle'=>$headbrandTitle ?? null,
                                            //   'productBrand'=>$productBrand ?? collect(),
                                            ]);

@endsection
