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

        @yield('content')

    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src='../app.js'></script>
    <script src="../show.js"></script>
</body>
</html>