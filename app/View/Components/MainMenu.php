<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class MainMenu extends Component
{

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $args_menu = [
            ['status','!=',0],
            ['parent_id','=',0]
        ];
        $list = Menu::where($args_menu)->get();
        return view('components.main-menu', compact('list'));
    }
}
