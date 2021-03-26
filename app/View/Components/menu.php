<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\CategoryService;
use App\Services\SubCategoryService;
class menu extends Component
{
     public $categorys  = [] ;
     public $subcategorys = [] ;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
         $this->categorys = $categoryService->all();
        $this->subcategorys = $categoryService->getSubCategory();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu');
    }
}
