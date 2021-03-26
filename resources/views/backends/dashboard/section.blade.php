@extends('backends.layouts.index')


@section('contents')

    @include('backends.partitions.header')
    @include('backends.partitions.menu')
    @yield('main')

@endsection

