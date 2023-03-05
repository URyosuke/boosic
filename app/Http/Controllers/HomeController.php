<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = \Auth::user()->posts()->orderBy('created_at','desc')->paginate(10);
        $data = [
            'posts' => $posts,
        ];
        return view('home',$data);
    }
}
