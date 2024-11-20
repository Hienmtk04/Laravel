<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        return view('frontend.home');
    }
    public function intro(){
        
        return view('frontend.intro_page');
    }

}
