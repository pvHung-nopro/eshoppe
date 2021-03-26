<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Services\ProductService;
use Auth;

class ProductController extends Controller
{
    protected $productService;

    public function  __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

     public function priceFiltering(Request $request){
           try{
            // return response()->json([
            //     'product' => $request->all(),
            //     'status' => true,
            // ]);

            $product_price =   $this->productService->filter($request->all());

            return view('frontends.priceFiltering.section',[
                     'product_price' =>   $product_price ?? null
            ]);
           } catch (\Exception $e){
            // return response()->json([
            //     'message' => $e->getMessage(),
            //     'status' => false,
            // ]);
     }
    }

    public function search(Request $request)
    {

        $search  = $request->search;
       $product_search =  $this->productService->search($search) ;

       $output = '';
       $link = Route('frontend.home') ;
    //    dd( $output);

       if( $product_search){
           foreach( $product_search  as $item){

            $output .= '<a style="font-size: 13px;
            font-weight: 600;" href="'.$link.'/product/search/'.$item->id.'">'.$item->name.'</a><br/>';
           }

       }

       return response($output);



    }

    public function productSearch($id)
    {
          $productSearch = $this->productService->productSearchs($id);
          $similar_product =  $productSearch->toArray() ;

          $product_category  =  $similar_product[0]['category_id'];
          if($product_category == 0)
          {
              $product_categorySlug = $similar_product[0]['subcategory_id'] ;
              $categorySub_product = $this->productService->product_subcategory($product_categorySlug,$id) ;
              return view('frontends.search.section',[
                'productSearch' => $productSearch ?? null ,
                'categorySub_product' => $categorySub_product ?? null
            ]);

          }else{
              $categorys_product = $this->productService->product_category($product_category,$id) ;
              return view('frontends.search.section',[
                'productSearch' => $productSearch ?? null ,
                'categorys_product' => $categorys_product ?? null
            ]);
          }
        //  dd($similar_product) ;

        //   $categoryId = $productSearch->

    }

    public function userCommnet(Request $request)
    {
        // dd($request->all()) ;
        if(Auth::check() == false || $request->comment == null)
        {
            return response()->json([
                'status' => false,
            ]);
        }else{
           $data =     $this->productService->comment_product($request);
           $listComment = ' <p>  <span>'.Auth::user()->name.':</span>   <span>'.$request->comment.'</span></p>';

                return response()->json([
                    'status' => true,
                    'data' => $data,
                    'listComment'=>$listComment
                ]);
        }
        // $comment =    $request->comment_class ;

    }


    public function productDetails($id)
    {
        if(session()->has('commentProductId'))
        {
            session()->forget(['commentProductId']);
        }
        session()->put('commentProductId',$id);

       $categoryId = $this->productService->productCategorys($id);
       $brandId = $this->productService->product_Brand($id);
       $productBrands = $this->productService->productDetailsBrand($id);
       $productDetail =  $this->productService->productDetails($id);

       return view('frontends.products.section',[
           'productDetail'=>  $productDetail ?? null,
           'productBrands'=>  $productBrands ?? null,
           'brandId'=> $brandId ?? null,
           'categoryId' =>  $categoryId ?? null

       ]);
    }
}
