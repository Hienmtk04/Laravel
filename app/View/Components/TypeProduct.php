<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TypeProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {   
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $list_category = Category::where('status','!=',0)->get();
        return view('components.type-product',compact('list_category'));
    }
}
