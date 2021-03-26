<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\CartService;

class header extends Component
{
    public $cartotal = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CartService $cartService)
    {
        $this->cartotal = $cartService->total();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
