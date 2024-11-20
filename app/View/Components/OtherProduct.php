<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OtherProduct extends Component
{
    public $product_at;

    public function __construct(Product $product)
    {
        $this->product_at = $product;
    }

    public function render(): View|Closure|string
    {
        $args_cat = [
            ['status', '!=', 0],
            ['category_id', '=', $this->product_at->category_id],
            ['id', '!=', $this->product_at->id]
        ];
        $other_product = Product::where($args_cat)
            ->limit(6) 
            ->get();

        return view('components.other-product', compact('other_product'));
    }
}
