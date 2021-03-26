<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SliderService;
use App\Services\CategoryService;
use App\Services\ProductService;
use App\Services\CartService;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    protected $sliderService;
    protected $categoryService;
    protected $productService;



    public function __construct(SliderService $sliderService , CategoryService $categoryService , ProductService $productService )
    {
          $this->sliderService = $sliderService;
          $this->categoryService = $categoryService;
          $this->productService = $productService;


    }
    public function index()
    {

          return view('frontends.home.index',[
             'slider' => $this->sliderService->all(),
             'products' => $this->productService->feature(),

          ]);
    }
}
