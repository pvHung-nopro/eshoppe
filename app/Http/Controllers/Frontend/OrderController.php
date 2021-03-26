<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\CartService;
use App\Services\OrderService;
use App\Services\CustomersService;
use App\Services\OrderDetailService;
use Illuminate\Http\Request;
use Auth;
use Mail;

class OrderController extends Controller
{
    protected $cartService;
    protected $orderService;
    protected $customerService;
    protected $orderDetailService;


    public function __construct(CartService $cartService , OrderService $orderService
    , CustomersService $customerService
    , OrderDetailService $orderDetailService
    )
    {
        // session()->flush();
        $this->cartService = $cartService;
        $this->orderService = $orderService;
        $this->customerService = $customerService;
        $this->orderDetailService = $orderDetailService;

    }
    public function order()
    {

        if(Auth::check() == false){
            return redirect()->route('login');
        }
        if(empty(session()->get('cart'))){
            return redirect()->route('frontend.cart.all');
        }
        $allCart =  $this->cartService->all();
          return view('frontends.order.show',['allCart'=>$allCart ?? collect()]) ;

    }

    public function orderCheckout(Request $request)
    {

        $customer = $this->customerService->save($request);
       $order =  $this->orderService->save($request,['customer_id'=>$customer->id]);
        $orderId = $order->id;
    //    dd($order->id);

      $this->orderDetailService->store($orderId,session()->get('cart'));

             $product_total = $this->cartService->total_cart();

              $product_cart = session()->get('cart');


              $to_name = "eshoppe";
              $to_email = "$customer->email";//send to this email



              $data = array("product_name"=>$product_cart,"total"=>$product_total);

              Mail::send('frontends.order.mail_order',$data,function($message) use ($to_name,$to_email){
                  $message->to($to_email)->subject('your order information');//send this mail with subject
                  $message->from($to_email,$to_name);//send from this mail
              });


              session()->forget('cart');

            return redirect()->route('test');



    }
}
