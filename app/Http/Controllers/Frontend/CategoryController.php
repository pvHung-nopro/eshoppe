<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\SubCategoryService;
use App\Services\BrandService;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $productService;
    protected $subcategoryService;
    protected $brandService;
    public function __construct(CategoryService $categoryService, ProductService $productService,  SubCategoryService $subcategoryService, BrandService $brandService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->subcategoryService = $subcategoryService;
        $this->brandService = $brandService;
    }

    public function showCategory($slug)
    {
        $category = $this->categoryService->findBySlug($slug) ;
        if($category){
        $productFeature = $this->productService->getByCategoryId($category->id);
        }
        // $subcategory = $this->subcategoryService->findBySubSlug($slug);
        // if($subcategory)
        // {
        //  $productSubFeature = $this->productService->getBySubCategoryId($subcategory->id);
        // }
        // $brand = $this->brandService->findByBrand($slug) ;
        // if($brand)
        // {
        //  $productBrand = $this->productService->getByBrandId($brand->id);
        // }


          return view('frontends.category.show',[
                'headTitle' => $category->name ?? null,
                // 'headsubTitle'=>$subcategory->sub_name ?? null,
                // 'headbrandTitle'=>$brand->name ?? null,
                'productFeature'=>$productFeature ?? null,
                // 'productSubFeature'=>$productSubFeature ?? null,
                // 'productBrand'=>$productBrand ?? null,



          ]) ;
    }

    public function showSubCategory($slug)
    {
           $subcategory = $this->subcategoryService->findBySubSlug($slug);
        if($subcategory)
        {
         $productSubFeature = $this->productService->getBySubCategoryId($subcategory->id);
        }
        return view('frontends.subcategory.show',[
              'headsubTitle'=>$subcategory->sub_name ?? null,
                'productSubFeature'=>$productSubFeature ?? null,
        ]);
    }
}
