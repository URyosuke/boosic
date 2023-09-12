<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
//Clientクラスを使用する
use GuzzleHttp\Client;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $data = ['posts' => $posts];
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->item);
        $post = new Post();
        $post->book_title = $request->item[0];
        $post->book_imag_url = $request->item[1];
        $post->author = $request->item[2];
        $post->publish_date = $request->item[3];
        $post->book_url = $request->item[4];
        $post->music_title = $request->item[5];
        // dd($request->item[7]);
        $post->music_imag = $request->item[6];
        $post->music_artist = $request->item[7];
        $post->music_url = $request->item[8];
        $data = ['post' => $post];
        return view('posts.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        
        $post->user_id = \Auth::id();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->book_title = $request->book_title;
        $post->book_imag_url = $request->book_imag_url;
        $post->author = $request->author;
        $post->publish_date = $request->publish_date;
        $post->book_url = $request->book_url;
        $post->music_title = $request->music_title;
        $post->music_imag = $request->music_imag;
        $post->music_artist = $request->music_artist;
        $post->music_url = $request->music_url;
        // dd($post);
        $post->save();

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = ['post' => $post];
        return view('posts.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize($post);
        $data = ['post' => $post];
        return view('posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize($post);
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect(route('posts.show', $post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize($post);
        $post->delete();
        return redirect(route('posts.index'));
    }
    
    public function bookmark_posts()
    {
        $posts = \Auth::user()->bookmark_posts()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'posts' => $posts,
        ];
        return view('posts.bookmarks', $data);
    }
    
    public function bookmark_others_posts($userid)
    {
        $posts = User::find($userid)->bookmark_posts()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'user' => User::find($userid),
            'posts' => $posts,
        ];
        return view('posts.othersbookmarks', $data);
    }
    
}
