<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        $posts = \Auth::user()->posts()->orderBy('created_at','desc')->paginate(5);
        $data = [
            'posts' => $posts,
        ];
        return view('home',$data);
    }
    
    public function indexx($userid)
    {
        
        $posts = User::find($userid)->posts()->orderBy('created_at','desc')->paginate(5);
        $data = [
            'user' => User::find($userid),
            'posts' => $posts,
        ];
        
        if(User::find($userid) == \Auth::user()){
            return view('home',$data);
        }else{
            return view('othersHome',$data);
        }
    }
}
