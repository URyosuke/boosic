<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOOSIC-好きな小説のマイ主題歌を共有するSNS-</title>
    <link href="{{ asset('output.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="navbar">
        <nav id="navID" class="border-gray-200 transition duration-500 dark:bg-gray-800 dark:border-gray-700 bg-opacity-50">
            <div class="flex flex-wrap items-center justify-between mx-2.5">
                <a href="/" class="flex items-center">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white left-10px">BOOSIC</span>
                </a>
                <button id="humberger" data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-white rounded-lg focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700" aria-controls="navbar-hamburger" aria-expanded="false">
                    <i id="xmark"class="fa-solid fa-xmark fa-2x hide_area"></i>
                    <i id="bars"class="fa-solid fa-bars fa-2x"></i>
                </button>
                <div id="humbergerList"  class="hide_area w-full" id="navbar-hamburger">
                    <ul class="flex flex-col font-medium bg-opacity-50 dark:bg-gray-800 dark:border-gray-700 text-white transition ease-linear">
                        @if (Auth::check())
                            <li class="p-2"><a class="tab-item{{ Request::is('home') ? ' active' : ''}}" href="{{ route('home') }}">マイページ</a></li>
                            <li class="p-2"><a class="tab-item{{ Request::is('posts') ? ' active' : ''}}" href="{{ route('posts.index') }}">記事一覧</a></li>
                            <li class="p-2"><a class="tab-item{{ Request::is('bookmarks') ? ' active' : ''}}" href="{{ route('bookmarks') }}">ブックマーク</a></li>
                            <li class="p-2">
                                <form on-submit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="text-white" type="submit">ログアウト</button>
                                </form>
                            </li>
                        @else
                            <li class="p-2"><a href="{{ route('login') }}">ログイン</a></li>
                            <li class="p-2"><a href="{{ route('register') }}">会員登録</a></li>
                        @endif        
                    </ul>
                </div>
            </div>    
        
    </div>
    <main>

        @yield('content')

    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>