<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>BOOSIC-好きな小説のマイ主題歌を共有するSNS-</title>
    <link href="{{ asset('output.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet">
</head>
<body class="bg-gray-700 text-white font-serif">
    <section class="flex justify-between bg-black z-20 fixed">
        <a href="/" class="items-center">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white ml-3">BOOSIC</span>
        </a>
        <button id="apphumberger" data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center p-2 humbergerML text-sm text-white rounded-lg focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700" aria-controls="navbar-hamburger" aria-expanded="false">
            <i id="xmark"class="fa-solid fa-xmark fa-2x hide_area"></i>
            <i id="bars"class="fa-solid fa-bars fa-2x area_x"></i>
        </button>
    </section>
    <div id="humbergerList"  class="hide_area w-full transition duration-500 text-gray-700 hidez" id="navbar-hamburger">
        <ul class="flex flex-col font-medium bg-opacity-50 dark:bg-gray-800 dark:border-gray-700 transition ease-linear ml-3">
            @if (Auth::check())
                <li class="p-2"><a class="tab-item{{ Request::is('home') ? ' active' : ''}}" href="{{ route('home', ['userid' => Auth::id()]) }}">マイページ</a></li>
                <li class="p-2"><a class="tab-item{{ Request::is('posts') ? ' active' : ''}}" href="{{ route('posts.index') }}">記事一覧</a></li>
                <li class="p-2"><a class="tab-item{{ Request::is('bookmarks') ? ' active' : ''}}" href="{{ route('bookmarks') }}">お気に入り</a></li>
                <li class="p-2"><a href="{{ route('posts.selectbook') }}">記事作成</a></li>
                <li class="p-2">
                    <form  method="post" name="logout" on-submit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:logout.submit();">ログアウト</a>
                    </form>
                </li>
            @else
                <li class="p-2"><a href="{{ route('login') }}">ログイン</a></li>
                <li class="p-2"><a href="{{ route('register') }}">会員登録</a></li>
            @endif        
        </ul>
    </div>
    <main id="mainContainer" class="-mt-28 z-10 h-full ">

        <form action="{{ route('posts.update', $post) }}" method="post">
            @method('patch')
            @csrf 
            <div class="bg-white editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-4xl">
                <p class="px-2 mx-2 font-bold">記事タイトル</p>
                <input class="title bg-gray-100 border border-gray-300 p-2 m-2 outline-none" spellcheck="false" placeholder="Title" type="text" name="title" value="{{ old('title',$post->title) }}">
                <div id="formDetail" class='grid grid-cols-2 mb-4'>
                    <div class="col-span-1 text-center text-align-center bg-white rounded-lg m-2 border">
                        <div class="flex items-center space-x-6 justify-center items-center h-full p-2">
                            @if (!$post->book_imag_url == null)
                                <img class="h-46 w-28 object-cover object-center" 
                                src="{{ $post->book_imag_url }}">
                            @endif
                            <div>
                                <p class="text-xl text-gray-700 font-normal mb-1">{{ $post->book_title }}</p>
                                @if (!$post->author == null)
                                    <p class="text-base text-gray-600 font-normal">{{ $post->author }}</p>
                                @endif
                                @if (!$post->publish_date == null)
                                    <p class="text-sm text-gray-600 font-normal">{{ $post->publish_date }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 text-center rounded-lg m-2 border ">
                        <div class="flex items-center space-x-6 justify-center items-center h-full p-2">
                            @if (!$post->music_imag == null)
                                <img class='rounded-full h-28 w-28 object-cover object-center'src="{{ $post->music_imag }}"><br>
                            @endif
                            <div>
                                <p class="text-xl text-gray-700 font-normal mb-1">{{ $post->music_title }}</p>
                                @if (!$post->music_artist == null)
                                    <p class="text-xl text-gray-600 font-normal mb-1">{{ $post->music_artist }}</p>
                                @endif
                                @if (!$post->music_url == null)
                                    <a href={{ $post->music_url }} target="_blank" class="text-sm text-gray-600 font-normal">聞いてみる</a><br>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <p class="px-2 mx-2 font-bold">コメント</p>
                <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="Comment" name="body" rows="5" cols="10">{{ old('body', $post->body) }}</textarea>
            </div>
            <input type="hidden" name="book_title" value="{{ $post->book_title}}">
            <input type="hidden" name="book_imag_url" value="{{ $post->book_imag_url}}">
            <input type="hidden" name="author" value="{{ $post->author}}">
            <input type="hidden" name="publish_date" value="{{ $post->publish_date}}">
            <input type="hidden" name="book_url" value="{{ $post->book_url}}">
            <input type="hidden" name="music_imag" value="{{ $post->music_imag}}">
            <input type="hidden" name="music_artist" value="{{ $post->music_artist}}">
            <input type="hidden" name="music_title" value="{{ $post->music_title}}">
            <imput type="hidden" name="music_url" value="{{ $post->music_url }}">
            <div class="text-center mt-2">
                <button type="submit" class="text-white bg-gray-600 mr-2 hover:bg-gray-400">更新する</button>
                <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-200">キャンセル</a>
            </div>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src='../../app.js'></script>
    <script src="../../form.js"></script>
</body>
</html>