<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainMenuItem extends Component
{
    public $row_menu = null;
    public function __construct($rowmenu)
    {
        $this->row_menu = $rowmenu;
    }

    public function render(): View|Closure|string
    {
        $menu = $this->row_menu;

        $args_menu_sub = [
            ['status','!=',0],
            ['parent_id','=',$menu->id]
        ];
        $list_menu_sub = Menu::where($args_menu_sub)
        ->get();

        return view('components.main-menu-item',compact('list_menu_sub','menu'));
    }
}
