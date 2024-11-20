<?php

namespace App\View\Components;

use App\Models\Topic;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopicOfPost extends Component
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
        $topic = Topic::where('status','!=',0)
        ->orderBy('created_at','DESC')
        ->get();
        return view('components.topic-of-post', compact('topic'));
    }
}
