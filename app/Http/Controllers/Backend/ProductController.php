<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $categoryService;

    protected $subCategoryService;

    protected $productService;

     public function __construct(CategoryService $categoryService , SubCategoryService $subCategoryService ,
      ProductService $productService){
        $this->categoryService = $categoryService;
        $this->subCategoryService = $subCategoryService;
        $this->productService = $productService;
     }

    public function createProduct()
    {

        if(Auth::check())
        {
            $category =  $this->productService-> productCategory();
            $subCategory =    $this->productService->productSubCategory();
            $brand =  $this->productService->productBrand();
            return view('backends.product.create_product',[
                'category'=>$category ?? null,
                'subCategory'=>$subCategory ?? null,
                'brand'=>$brand ??null

            ]);
        }else{
            return redirect()->route('get.login.admin');
        }
    }

    public function postCreateProduct(Request $request)
    {
        return   $this->productService->createProduct($request);
    }

    public function showProduct()
    {
        // dd($this->productService->showProducts());
        if(Auth::check()){
            $products =   $this->productService->showProducts();
            return view('backends.product.show_product',[
                'products' => $products ?? null
            ]);
        }else{
            return redirect()->route('get.login.admin');
        }

    }

   public function editProduct($id)
   {

       if(Auth::check())
       {
           $category_productId = $this->productService->category_productId($id);
           $notcategory_productId = $this->productService->notCategory_product($id);

           $subcategory_productId = $this->productService->subcategory_productId($id);
           $notsubcategory_productId = $this->productService->notsubCategory_product($id) ;

           $brand_productId = $this->productService->brand_productId($id);
           $notbrand_productId = $this->productService->notbrand_product($id);


           $productIds =  $this->productService->productId($id);
           return view('backends.product.edit_product',[
               'productIds' =>   $productIds ?? null,
               'category_productId' =>   $category_productId ?? null,
               'notcategory_productId' => $notcategory_productId ?? null,
               'subcategory_productId' => $subcategory_productId ?? null,
               'notsubcategory_productId' => $notsubcategory_productId ?? null,
               'brand_productId'=> $brand_productId ?? null,
               'notbrand_productId'=>$notbrand_productId ?? null

           ]);
       }else{
        return redirect()->route('get.login.admin');
       }
   }

   public function postEditProduct(Request $request , $id , $check ,$image )
   {
      return   $this->productService->postUpdateProduct($request,$id,$check,$image);

   }

   public function deletedProduct($id,$check,$image)
   {
       return $this->productService->deleteProducts($id,$check,$image) ;
   }
}
