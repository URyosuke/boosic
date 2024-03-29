@extends('layouts.app')
@section('content')
@include('commons.errors')
<div class="px-4 flex justify-center">
    <div class="flex justify-center w-full border max-w-3xl hover:shadow-none relative shadow-lg bg-gray-400">
        <img class="max-h-20 w-full opacity-80 absolute top-0" style="z-index:-1" src="https://unsplash.com/photos/h0Vxgz5tyXA/download?force=true&w=640" alt="" />
        <div class="profile w-full m-3 ml-4 text-black">
            @if($user->image == null)
                <img id="preview" class="w-28 h-28 p-1 rounded-full" src="{{ asset("storage/images/kkrn_icon_user_1.png") }}" alt=""/>
            @else
                <img id="preview" class="w-28 h-28 p-1 rounded-full" src="{{ asset($user->image) }}" alt=""/>
            @endif
            <div class="title ml-3 font-bold flex flex-col">
                <div class="name break-words">{{ $user->name }}</div>
            </div>
        </div>
        <div class="buttons flex absolute font-bold right-0 text-xs text-gray-500 space-x-0 my-3.5 mr-3">
            @if (!Auth::user()->is_follow($user->id))
                <button id='followButton' onclick="follow({{$user->id}})"class="bg-white add border rounded-l-2xl rounded-r-sm border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">フォロー</button>
            @else
                <button id='followButton' onclick="follow({{$user->id}})"class="bg-gray-400 add border rounded-l-2xl rounded-r-sm border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">フォロー中</button>
            @endif
            <!-- <div class="add border rounded-r-2xl rounded-l-sm border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">Bio</div> -->
        </div>
        <div class="flex absolute font-bold right-0 bottom-0 text-base text-white space-x-0 my-3.5 mr-3">
            <span id="followerNum" class="px-4">フォロワー {{ Auth::user()->howManyFollowers($user->id) }}</span>
            <span id="followNum"> フォロー {{ Auth::user()->howManyFollow($user->id) }}</span>
        </div>
    </div>
</div>
<div class="px-4 flex justify-center">
    <ul class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-500 dark:text-gray-400 grid grid-cols-2 py-4 max-w-3xl w-full">
        <li class="flex justify-center nav-item col-span-1 bg-white border-b-2 border-white">
            <a href="{{ route('posthome',$user->id) }}" class="nav-link inline-block text-muted active text-xl py-3">
                投稿
            </a>
        </li>
        <li class="flex justify-center nav-item col-span-1 border-b-2 border-white">
            <a href="{{ route('othersbookmarks',$user->id) }}" class="nav-link inline-block text-gray-400 text-xl py-3 text-muted active text-2xl">
                お気に入り
            </a>
        </li>
    </ul>
</div>
@include('posts.posts')
@endsection()