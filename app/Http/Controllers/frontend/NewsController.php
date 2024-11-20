<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news() 
    {
        $list = Post::where('status', '=', 1)
            ->paginate(8);
        return view('frontend.news', compact('list'));
    }
    public function post_detail($slug)
    {
        $post = Post::where('slug', $slug)
            ->first();
        return view('frontend.post_detail', compact('post'));
    }

    public function topic($slug)
    {
        $args_row = [
            ['slug', '=', $slug],
            ['status', '=', 1]
        ];
        $row = Topic::where($args_row)->select("id", "name", "slug", "description")->first();
        $listtopicid = [];
        if ($row != null) {
            array_push($listtopicid, $row->id);
            $list1 = Topic::where([['id', '=', $row->id], ['status', '=', 1]])->select("id")->get();
        }
        $list = Post::where([['status', '!=', 0],['topic_id','=', $listtopicid]])
            ->orderBy('created_at', 'DESC')
            ->paginate(4);
        return view('frontend.news_topic', compact('list', 'row'));
    }
}
