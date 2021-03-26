<?php
   namespace App\Services;
   use App\Models\Products;
   use Illuminate\Http\Request;
   use Illuminate\Support\Collection;


   class CartService
{
     public function store($productId)
     {
        // session()->flush();

        $cart = Session()->get('cart') ?? collect();

         $product = Products::find($productId);
        //  dd($cart);
        //  dd($cart->count());
        // dd (Session()->all());
        if($cart->count() === 0 ){
            $product->qty = 1;
            // dd($product);
            $cart->push($product);
            // dd($cart);
            //  Session()->put('cart',$cart) ;
            // return Session()->get('cart');


        }else{
          $checkHas = $cart->where('id',$productId)->count();


        //  dd($checkHas);
          if($checkHas === 0 && is_null($product) == false ){
            //   dd(is_null($product));
              $product->qty = 1 ;
              $cart->push($product);

          }else{
             foreach($cart as $item){
                 if($item->id == $productId){
                 $item->qty += 1  ;
                 }
             }
            }
        }
          Session()->put('cart',$cart) ;
        //    dd(Session()->get('cart'));
     }


    public function total()
    {
        $total = 0;
        $cart  = session()->get('cart') ?? collect();

        foreach ($cart as $item) {
            $total += $item->qty;

        }

        return $total;
    }

    public function all()
    {
        return session()->get('cart') ?? collect();
    }

    public function total_cart()
    {
        $total = 0;
        $total_cart = 0 ;
        $total_qty = 0;
        $cart  = session()->get('cart') ?? collect();

     $array_cart =  $cart->toArray();
     foreach($array_cart as $key =>$item)
     {
        $total = $item['qty']*$item['price'];
         $total_cart += $total;
         $total_qty += $item['qty'];
     }

     $array_form = ['total_cart'=> $total_cart,
     'total_qty'=>$total_qty];
      return $array_form;
    }

    public function deleted($productId)
    {
          $products = session()->get('cart') ?? collect();


      $filtered = $products->reject(function ($products)  use ($productId) {
              return $products->id == $productId;
            //   return $products->id == $productId;
        });

     session()->put('cart', $filtered);
        // $filtered->all();

    //    dd(Session()->all());
    }

    public function deleted_all()
    {
         session()->forget('cart');


        //   return $products->id>0;
          //   return $products->id == $productId;

    //   dd(  $filtered );
    //   $filtered->all();
    }

    public function update($qty_number,$productId)
    {
        $cart  = session()->get('cart') ?? collect();

        $cartId = $cart->where('id',$productId)->all();
        $cart_count = $cart->where('id',$productId)->count();
    //    $keys =  collect($cartId);
    //     // dd($k);
    //     // dd($a);
    //     $cartkeys =  $keys->keys();
    //     $keyId =  $cartkeys[0];
    if($cart_count>0){
        foreach($cartId as $keys => $item)
        {
           $item->qty = $qty_number;
           $cart->merge([$keys=>$cartId]);
        }
    }

        return session()->put('cart',$cart);

        // dd($cart);
        // dd( $cart->keys());
    //   dd($cartkeys[0]);
    //    dd($b);

    //     dd($a);
    //     $keys = $cart->keys();
    //     dd($keys);
    //    dd($cart);

 //



    }


}




