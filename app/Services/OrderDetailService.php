<?php
   namespace App\Services;
   use App\Models\OrderDetail;

   class OrderDetailService
   {
       public function store($orderId , $product)
       {
        //    dd(session()->get('cart')) ;
           foreach($product as $products)
           {
                  OrderDetail::create([
                  'order_id'     => $orderId,
                  'product_id'   => $products->id,
                  'product_name' => $products->name,
                  'price'        => $products->price,
                  'qty'          => $products->qty,
                  'created_at'   => now(),
                  'updated_at'    => now(),

             ]);
           }
       }
   }


