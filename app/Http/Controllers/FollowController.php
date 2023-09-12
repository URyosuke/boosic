<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;
use Auth;

class FollowController extends Controller
{
    
    public function store($userId)
    {
        $user = \Auth::user();
        // dd($user->is_follow($userId));
        if(!$user->is_follow($userId)){
            $user->follows()->attach($userId);
            return($user->follows()->where('followed_user_id', $userId)->count());
        }else{
            Auth::user()->follows()->detach($userId);
            return($user->follows()->where('followed_user_id', $userId)->count());
        }
    }
    
    //フォローする
    public function follow(Request $request)
    {
        Follow::firstOrCreate([
            'followed_user_id' => $request->post_user,
            'following_user_id' => $request->auth_user
        ]);
        return true;
    }
    //フォロー解除する
    public function unfollow(Request $request)
    {
        $follow = Follow::where('followed_user_id', $request->post_user)
            ->where('following_user_id', $request->auth_user)
            ->first();
        if ($follow) {
            $follow->delete();
            return false;
        }
    }
}
