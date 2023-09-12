@extends('layouts.app')
@section('content')
@include('commons.errors')
<div class="mx-4 flex justify-center">
    <div class="flex justify-center w-full border max-w-3xl hover:shadow-none relative shadow-lg bg-gray-400">
        <img class="max-h-20 w-full opacity-80 absolute top-0" style="z-index:-1" src="https://unsplash.com/photos/h0Vxgz5tyXA/download?force=true&w=640" alt="" />
        <div class="profile w-full m-3 ml-4 text-black">
            <img class="w-28 h-28 p-1 bg-white rounded-full" src="https://images.pexels.com/photos/61100/pexels-photo-61100.jpeg?crop=faces&fit=crop&h=200&w=200&auto=compress&cs=tinysrgb" alt=""/>
            <div class="title ml-3 font-bold name break-words">{{ Auth::user()->name }}</div>
        </div>
        <div class="flex absolute font-bold right-0 bottom-0 text-base text-white space-x-0 my-3.5 mr-3">
            <span id="followerNum" class="px-4">フォロワー {{ Auth::user()->howManyFollowers(Auth::user()->id) }}</span>
            <span id="followNum"> フォロー {{ Auth::user()->howManyFollow(Auth::user()->id) }}</span>
        </div>
    </div>
</div>
<div class="px-14 flex justify-center">
    <ul class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-500 dark:text-gray-400 grid grid-cols-2 py-4 max-w-3xl w-full">
        <li class="flex justify-center nav-item col-span-1  border-b-2 border-white">
            <a href="{{ route('posthome',Auth::user()->id) }}" class="nav-link inline-block text-gray-400 active text-xl py-3">
                投稿
            </a>
        </li>
        <li class="flex justify-center nav-item col-span-1 bg-white border-b-2 border-white">
            <a href="{{ route('bookmarks') }}" class="nav-link inline-block text-muted text-xl py-3 text-muted active text-2xl">
                お気に入り
            </a>
        </li>
    </ul>
</div>
@include('posts.posts')
@endsection()