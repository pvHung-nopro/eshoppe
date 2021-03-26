<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\CustomersService;
use App\Services\OrderService;
use App\Services\OrderDetailService;
use Mail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    protected $cartService;
    protected $customersService;
    protected $orderService;
    protected $orderDetailService;



    public function __construct(CartService $cartService ,
                                CustomersService $customerstService ,
                                OrderService $orderService ,
                                OrderDetailService $orderDetailService
    )
    {
        // session()->flush();
        $this->cartService        = $cartService;
        $this->customersService   = $customerstService;
        $this->orderService       = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

     public function store($productId)
     {
      $cart =   $this->cartService->store($productId) ;
       return redirect()->back();
     }

     public function all()
     {
        $allCart =  $this->cartService->all();
        $array_form = $this->cartService->total_cart();
        return view('frontends.cart.show',[
            'allCart'=>$allCart ?? collect(),
            'array_form'=>$array_form ?? [] ]);
     }

     public function destroy($productId)
     {
         $this->cartService->deleted($productId);
         return redirect()->back();
        // $allCart =  $this->cartService->all();
        // dd($allCart);
     }

     public function deleted_all()
     {
        $this->cartService->deleted_all();
        return redirect()->back();
     }

     public function update(Request $request , $productId)
     {


            $this->cartService->update($request->quantity,$productId);
            return redirect()->back();

     }

    //  public function checkout(Request $request)
    //  {

    //     try {
    //        if(empty(session()->get('cart'))){
    //            return response()->json([
    //                'status' => false
    //            ]);
    //        } else {

    //         $customers =  $this->customersService->save($request->all()) ;
    //         $order  = $this->orderService->save( ['customer_id'=>$customers->id,
    //                                               'content'=>$request->content ?? null] );
    //         $orderDetail = $this->orderDetailService->store($order->id,session()->get('cart')) ;

    //         $product_total = $this->cartService->total_cart();

    //         $product_cart = session()->get('cart');


    //         // dd(session()->get('cart'));

    //         // dd($customers->email);
    //         // dd($product_total ) ;


    //         $to_name = "eshoppe";
    //         $to_email = "$customers->email";//send to this email



    //         $data = array("product_name"=>$product_cart,"total"=>$product_total);

    //         Mail::send('frontends.order.mail_order',$data,function($message) use ($to_name,$to_email){
    //             $message->to($to_email)->subject('test mail nhé');//send this mail with subject
    //             $message->from($to_email,$to_name);//send from this mail
    //         });

    //        session()->forget('cart');


    //         return response()->json([
    //             'customers' => $customers,
    //             'status'    => true,
    //         ]);
    //        }
    //     }
    //    catch (\Exception $e){
    //     return response()->json([
    //         'message' => $e->getMessage(),
    //         'status' => false,
    //     ]);
    //    }


    //  }



    //  public function











}
