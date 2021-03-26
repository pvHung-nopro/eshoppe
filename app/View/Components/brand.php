<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\BrandService;

class brand extends Component
{
    public $brands = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BrandService $brandService)
    {
         $this->brands = $brandService->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.brand');
    }
}
