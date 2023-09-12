<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store($postId) {
        // dd($postId);
        $user = \Auth::user();
        if (!$user->is_bookmark($postId)) {
            $user->bookmark_posts()->attach($postId);
        }
        else{
            $user->bookmark_posts()->detach($postId);
        }
        return($user->bookmark_posts()->where('post_id', $postId)->count());
    }
    public function destroy($postId) {
        $user = \Auth::user();
        if ($user->is_bookmark($postId)) {
            $user->bookmark_posts()->detach($postId);
        }
        return;
    }
}
