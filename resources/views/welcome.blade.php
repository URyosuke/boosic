<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOOSIC-好きな小説のマイ主題歌を共有するSNS-</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('output.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <section class="flex justify-between bg-black z-20 fixed">
        <a href="/boosic" class="items-center">
            <span class="font-serif self-center text-2xl font-semibold whitespace-nowrap text-white ml-3">BOOSIC</span>
        </a>
        <button id="apphumberger" data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center p-2 humbergerML text-sm text-white rounded-lg focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700" aria-controls="navbar-hamburger" aria-expanded="false">
            <i id="xmark"class="fa-solid fa-xmark fa-2x hide_area"></i>
            <i id="bars"class="fa-solid fa-bars fa-2x area_x"></i>
        </button>
    </section>
    <div id="humbergerList"  class="hide_area w-full transition duration-500" id="navbar-hamburger">
        <ul class="flex flex-col font-medium bg-opacity-50 dark:bg-gray-800 dark:border-gray-700 text-white transition ease-linear ml-3 transition duration-500">
            @if (Auth::check())
                <li class="p-2"><a class="tab-item{{ Request::is('home') ? ' active' : ''}}" href="{{ route('home',['userid' => Auth::id()]) }}">マイページ</a></li>
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
    <header id="header">
        <div class="header-area">
            <p class="text-6xl md:text-7xl lg:text-8xl xl:text-9xl eachTextAnime font-serif">BOOSIC</p>
            <h2 class="text-xl md:text-2xl lg:text-4xl eachTextAnime font-mono">～物語に自分だけの主題歌を～</h2>
        </div>
        <div id="header-img"></div>
    </header>
    <main id="mainContainer" class="bg-gray-900 text-slate-200">
        <section class="md:container md:mx-auto pt-40">
            <h2 class="text-3xl md:text-4xl lg:text-5xl text-center pb-10 font-serif">思い出の小説と音楽</h2>
            <img src="https://images.unsplash.com/photo-1519791883288-dc8bd696e667?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="mx-auto md:max-w-xl m-0">
            <div class="pt-10 text-center top-1/2">
                <p class="font-serif text-lg md:text-xl lg:text-2xl">
                  好きな小説と音楽<br>
                  思い出の小説に自分だけの主題歌を添えて<br>共有してみませんか？
                </p>
            </div>
        </section>
        <section class="md:flex mt-40">
            <div class="basis-1/2 md:order-2">
                <img src="https://images.unsplash.com/photo-1588580000645-4562a6d2c839?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="md:max-w-md">
            </div>
            <div class="basis-1/2 text-center pt-32 md:order-1">
                <h2 class="font-serif text-2xl md:text-3xl lg:text-4xl">お気に入りの本を見つける</h2>
            </div>
        </section>
        <section class="md:flex mt-40">
            <div class="basis-1/2  flex justify-center">
                <img src="https://images.unsplash.com/photo-1580537659053-7d38f300118c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="md:max-w-md m-0">
            </div>
            <div class="basis-1/2 text-center pt-32">
                <h2 class="font-serif text-2xl md:text-3xl lg:text-4xl">ぴったりの音楽を見つける</h2>
            </div>
        </section>
        <section class="md:flex mt-40 pb-40">
            <div class="basis-1/2 md:order-2">
                <img src="https://images.unsplash.com/photo-1423784346385-c1d4dac9893a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" class="md:max-w-md">
            </div>
            <div class="basis-1/2 text-center pt-32 md:order-1 pb-32">
                <h2 class="font-serif text-2xl md:text-3xl lg:text-4xl">投稿する</h2>
                
            </div>
        </section>
        
    </main>
    <div id="app"></div>
    <footer id="footer" class="bg-black">
        <small>&copy; copyright.</small>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset('main.js')}}"></script>
</body>
</html>
