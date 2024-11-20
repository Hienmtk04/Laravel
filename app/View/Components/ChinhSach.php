<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ChinhSach extends Component
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
        $list = Menu::where([['status','=',1], ['position','=','footermenu'], ['parent_id','=',22]])
        ->get();
        return view('components.chinh-sach', compact('list'));
    }
}
