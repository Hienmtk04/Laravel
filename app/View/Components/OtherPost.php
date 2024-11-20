<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OtherPost extends Component
{
    public $post_at;
    public function __construct(Post $post)
    {
        $this->post_at = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args_post = [
            ['status', '!=', 0],
            ['id', '!=', $this->post_at->id],
            ['topic_id', '=', $this->post_at->topic_id]

        ];
        $other_post = Post::where( $args_post)
            ->limit(4)
            ->get();
        return view('components.other-post', compact('other_post'));
    }
}
