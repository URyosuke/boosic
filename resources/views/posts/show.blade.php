@extends('layouts.app')
@section('content')
<div class="flex justify-center text-black">
    <!-- Column -->
        <div class="flex flex-col justify-center my-1 px-1 max-w-5xl">
            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-gray-400 container">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black font-black text-2xl" href="{{ route('posts.show', $post) }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                        {{ $post->created_at }}
                    </p>
                </header>
                <hr class="h-px bg-gray-500 border-0">
                <div id="articleContent" class="grid grid-cols-3 pb-2">
                    <a href="{{ route('posts.show', $post) }}" class="flex justify-center col-span-1 mt-2">
                        <img alt="Placeholder" class="pl-4 block left-1/2" src="{{ $post->book_imag_url}}">
                    </a>
                    <div class="top-1/2 col-span-2 text-black pl-5">
                        <div id="detail" class="grid grid-cols-2 pt-8 px-4 text-center">
                            <div id="detailContents" class="flex text-left justify-center flex-col col-span-1 text-lg font-bold w-fit mx-auto">
                                <div class="text-left mb-5">
                                    @if (!$post->author == null)
                                        <div>
                                            <span class="w-20 mr-5 bg-gray-700 text-white text-base text-center items-center shadow-md inline-block">著者</span>
                                            <span class="text-base">{{ $post->author}}</span>
                                        </div>
                                    @endif
                                    @if (!$post->publish_date == null)
                                        <div>
                                            <span class="w-20 mr-5 bg-gray-700 text-white text-base text-center shadow-md inline-block">
                                                発売日
                                            </span>
                                            <span class="text-base">
                                                {{ $post->publish_date}}
                                            </span>
                                        </div>
                                    @endif
                                    @if (!$post->book_url == null)
                                        <div>
                                            <span class="w-20 mr-5 bg-gray-700 text-white text-base text-center shadow-md inline-block">
                                                詳細
                                            </span>
                                            <span>
                                                <a class="hover:text-sky-700 text-base" href="{{ $post->book_url}}" target="_blank" rel="noopener noreferrer">書籍詳細情報</a>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-span-1 text-lg font-bold">
                                マイ主題歌
                                <div>
                                    <img class="rounded-full inline-block" src="{{ $post->music_imag }}">
                                </div>
                                <div>
                                    {{ $post->music_title }}
                                </div>
                            </div>
                        </div>
                        <div id="articleComment" class="text-lg font-bold col-span-3 text-black mt-8">
                            コメント
                            <div class="mt-2 h-48 w-full bg-gray-200 text-base rounded-lg">
                                {{ $post->body }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="h-px bg-gray-500 border-0">
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    <a class="flex items-center no-underline hover:underline text-black" href="{{ route('posthome', $post->user->id) }}">
                        
                        
                        @if($post->user->image == null)
                            <img id="preview" class="m-xauto w-12 h-12 p-1 rounded-full" src="{{ asset("storage/images/kkrn_icon_user_1.png") }}" alt=""/>
                        @else
                            <img id="preview" class="mx-auto w-12 h-12 p-1 rounded-full" src="{{ asset(Auth::user()->image) }}" alt=""/>
                        @endif
                        
                        
                        <p class="ml-2 text-sm">
                            {{ $post->user->name }}
                        </p>
                    </a>
                    <div class="post-control">
                        @if (!Auth::user()->is_bookmark($post->id))
                            <button onclick="like({{$post->id}})" class="bg-gray-400">
                                <span><i id="heart{{$post->id}}" class="fa-regular fa-heart fa-xl" aria-hidden="true"></i> </span>
                                <span id="heartsNum{{ $post->id }}">{{ Auth::user()->howManyBookmarks($post->id) }}</span>
                            </button>
                        @else
                            <button onclick="like({{$post->id}})" class="bg-gray-400">
                                <span><i id="heart{{$post->id}}" class="fa-heart fa-xl fa-solid fa-heart-solid" aria-hidden="true"></i> </span>
                                <span id="heartsNum{{ $post->id }}">{{ Auth::user()->howManyBookmarks($post->id) }}</span>
                            </button>
                        @endif
                    </div>
                </footer>
            </article>
            <!-- END Article -->
            <div class="flex text-white p-4">
                @if($post->user->id == Auth::id())
                    <a class="pr-4" href="{{route('posts.edit',$post)}}">編集</a>
                    <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit text-white bg-gray-700">削除</button>
                    </form> 
                @endif
            </div>
        </div>
    <!-- END Column -->
</div>
<script src="{{asset('show.js')}}"></script>
@endsection