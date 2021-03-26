<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\ProductService;
class sale extends Component
{
    public $productsSale = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ProductService $productService)
    {
        $this->productsSale = $productService->bestSeller();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sale');
    }
}
