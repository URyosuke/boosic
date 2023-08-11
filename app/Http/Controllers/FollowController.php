<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FollowController extends Controller
{
    
    public function store($userId)
    {
        Auth::user()->follows()->attach($userId);
        return;
    }
}
