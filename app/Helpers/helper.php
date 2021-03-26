<?php

use App\Services\CartService;

if(!function_exists('cartTotal')){
   function cartTotal(){
    return app(CartService::class)->total();
   }
}
