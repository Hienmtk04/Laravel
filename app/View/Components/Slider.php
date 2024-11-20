<?php

namespace App\View\Components;

use App\Models\Banner;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;


class Slider extends Component
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
        $slideshow = Banner::where('position', '=','slideshow')->get();
        $banner = Banner::where('position', '=','banner')->get();
        return view('components.slider', compact('slideshow','banner'));
    }
}
