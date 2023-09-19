@extends('layouts.app')
@section('content')
@include('commons.errors')
<div class="mx-4 flex justify-center font-serif">
    <section id="modalArea" class="modalArea">
      <div id="modalBg" class="modalBg"></div>
      <div class="modalWrapper">
        <div class="modalContents">
            <form action="{{ route('profile.store',Auth::user()) }}" enctype="multipart/form-data" method="post">
                @csrf
                @if(Auth::user()->image == null)
                    <img id="preview" class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset("storage/images/kkrn_icon_user_1.png") }}" alt=""/>
                @else
                    <img id="preview" class="mx-auto w-28 h-28 p-1 rounded-full" src="{{ asset(Auth::user()->image) }}" alt=""/>
                @endif
                <label class="text-center text-black mb-2 block mx-auto hover:text-blue-600 cursor-pointer">
                    <input type="file" name="image" class="hidden" onchange="previewImage(this);">
                    プロフィール画像変更
                </label>
                <div class="rounded  shadow-md p-6 border border-1 border-slate-300">
                    <div class="pb-6">
                      <label for="name" class="font-semibold text-gray-800 block pb-1">ユーザー名</label>
                      <div class="flex">
                        <input name="name" id="name" class="text-black border border-1 border-slate-300 rounded-r px-4 py-2 w-full" type="text" value={{old('title',Auth::user()->name)}} />
                      </div>
                    </div>
                    <div class="pb-4">
                      <label for="email" class="font-semibold text-gray-700 block pb-1">Email</label>
                      <input id="email" name="email" class="text-black border border-1 border-slate-300 rounded-r px-4 py-2 w-full" type="email" value={{old('title',Auth::user()->email)}} />
                      <span class="text-gray-600 pt-4 block opacity-70">Personal login information of your account</span>
                    </div>
                </div>
                <button class="mt-2 text-right bg-gray-200 hover:bg-gray-400 border border-1 border-slate-300 justify-end block mx-auto">変更</button>
            </form>
        </div>
        <div id="closeModal" class="closeModal text-black">
          ×
        </div>
      </div>
    </section>
    <div class="flex justify-center w-full border max-w-3xl hover:shadow-none relative shadow-lg bg-gray-400">
        <div class="profile w-full m-3 ml-4 text-black">
            @if(Auth::user()->image == null)
                <img class="w-28 h-28 p-1 rounded-full" src="{{ asset("storage/images/kkrn_icon_user_1.png") }}" alt=""/>
            @else
                <img class="w-28 h-28 p-1 rounded-full" src="{{ asset(Auth::user()->image) }}" alt=""/>
            @endif
            
            <div class="title ml-6 font-bold name break-words">{{ Auth::user()->name }}</div>
        </div>
        <div class="buttons flex absolute font-bold right-0 text-xs text-gray-500 space-x-0 my-3.5 mr-3">
            <button id='openModal' class="bg-white add border rounded-l-2xl rounded-r-sm border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">プロフィール変更</button>
        </div>
        <div class="flex absolute font-bold right-0 bottom-0 text-base text-white space-x-0 my-3.5 mr-3">
            <span id="followerNum" class="px-4">フォロワー {{ Auth::user()->howManyFollowers(Auth::user()->id) }}</span>
            <span id="followNum"> フォロー {{ Auth::user()->howManyFollow(Auth::user()->id) }}</span>
        </div>
        </div>
    </div>
</div>
<div class="mx-4 flex justify-center">
    <ul class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-500 dark:text-gray-400 grid grid-cols-2 py-4 max-w-3xl w-full">
        <li class="flex justify-center nav-item col-span-1 bg-white border-b-2 border-white">
            <a href="{{ route('home') }}" class="nav-link inline-block text-muted active text-xl py-3">
                投稿
            </a>
        </li>
        <li class="flex justify-center nav-item col-span-1 border-b-2 border-white">
            <a href="{{ route('bookmarks') }}" class="nav-link inline-block text-gray-400 text-xl py-3 text-muted active text-2xl">
                お気に入り
            </a>
        </li>
    </ul>
</div>
@include('posts.posts')
@endsection()