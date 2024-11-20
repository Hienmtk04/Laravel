<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ChinhSach extends Controller
{
    public function post_bao_hanh()
    {
        $post = Post::where([['status','=',1], ['title', '=', 'Chính sách bảo hành'], ['type', '=','page']])
            ->first();
        return view('frontend.cs_bao_hanh', compact('post'));
    }
    public function post_mua_hang()
    {
        $post = Post::where([['status','=',1], ['title', '=', 'Chính sách mua hàng'], ['type', '=','page']])
            ->first();
        return view('frontend.cs_bao_hanh', compact('post'));
    }
    public function post_van_chuyen()
    {
        $post = Post::where([['status','=',1], ['title', '=', 'Chính sách vận chuyển'], ['type', '=','page']])
            ->first();
        return view('frontend.cs_bao_hanh', compact('post'));
    }
    public function post_doi_tra()
    {
        $post = Post::where([['status','=',1], ['title', '=', 'Chính sách đổi trả'], ['type', '=','page']])
            ->first();
        return view('frontend.cs_bao_hanh', compact('post'));
    }
}
