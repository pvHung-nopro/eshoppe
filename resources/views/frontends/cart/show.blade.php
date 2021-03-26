@extends('layouts.frontend')


@section('content')
    @include('frontends.cart.section',['allCart'=>$allCart ?? collect()])
    @include('frontends.cart.total_cart',['array_form'=>$array_form ?? null])

@endsection
