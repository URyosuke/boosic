<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Spotify;

class MusicController extends Controller
{
    public function form(Request $request)
    {
        $data = [];
        $Items = null;
        
        if(!empty($request->keyword))
        {
            $Items = Spotify::searchItems($request->keyword, 'track')->get();
            // dd($Items["tracks"]["items"][0]);
        }
        
        $data = [
            'book_title' => $request->item[0],
            'book_imag_url' => $request->item[1],
            'author' => $request->item[2],
            'publish_date' => $request->item[3],
            'book_url' => $request->item[4],
            'Items' => $Items,
            'keyword' => $request->keyword,
        ];
        // dd($data['items']);
        return view('posts.selectmusic', $data);
        // dd($item);
    }
    
}
