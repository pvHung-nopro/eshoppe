@extends('layouts.frontend')


@section('content')
    @include('frontends.order.order',['allCart'=>$allCart ?? collect()])

@endsection
