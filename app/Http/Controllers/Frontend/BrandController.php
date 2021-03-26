<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BrandService;
use App\Services\ProductService;

class BrandController extends Controller
{

    protected $productService;

    protected $brandService;

    public function __construct(ProductService $productService,  BrandService $brandService)
    {

        $this->productService = $productService;

        $this->brandService = $brandService;
    }

    public function showBrand($slug)
    {
          $brand = $this->brandService->findByBrand($slug) ;
        if($brand)
        {
         $productBrand = $this->productService->getByBrandId($brand->id);
        }


        return view('frontends.brand.show',[

            'headbrandTitle'=>$brand->name ?? null,

            'productBrand'=>$productBrand ?? null,

      ]) ;
    }
}
