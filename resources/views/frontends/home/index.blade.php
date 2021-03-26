@extends('layouts.frontend')

@section('content')
  <?php

    if(session()->has('alert')){
        $alert  = session()->get('alert');

        echo "<script>";
      echo "alert('$alert')";
        echo "</script>";
       session()->forget('alert') ;
    }

  ?>
     @include('frontends.partitions.slider',['slider'=>$slider ?? collect()])
     @include('frontends.partitions.section',['products'=> $products ?? collect()])
@endsection
