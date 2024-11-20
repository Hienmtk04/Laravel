<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

use Illuminate\View\Component;

class NewProduct extends Component
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
        $list = DB::table('product')
              ->orderBy('created_at', 'desc')
              ->limit(6)
              ->get();
        return view('components.new-product', compact('list'));
    }
}
