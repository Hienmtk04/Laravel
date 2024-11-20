<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SaleProduct extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $args_sale = [
            ['status','!=',0],
            ['pricesale','>',0],
            ['pricesale','!=','price']
        ];
        $sale_product = Product::where($args_sale)
        ->limit(6)
        ->get();
        return view('components.sale-product', compact('sale_product'));
    }
}
