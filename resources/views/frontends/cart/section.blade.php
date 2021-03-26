<?php
//    dd(  $allCart);
?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
    <?php
    //  if(!empty(session()->get('cart')))
    //  {
        // dd(!empty(session()->get('cart')));
        if(empty(session()->get('cart')) == true )
               {
    ?>
    <div class="message_error_cart">
       <p class="error_cart"> You have not bought any products </p>
    </div>
    @php
      }
    @endphp
        @include('frontends.cart.table_cart',[
              'allCart'=>$allCart ?? collect()
        ])

    </div>
</section>
