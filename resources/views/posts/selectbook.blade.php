@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>PHP/LaravelでGoogle books apiを使うサンプル</title>
    </head>
    <body>
        <h1 class="text-center text-5xl pb-8">本を選ぶ</h1>
        <form action="{{ route('posts.selectbook') }}" method="get" class="text-center ">
            @csrf
            <input type="text" name="keyword" size="50" value="{{ $keyword }}" class="text-black border-red-300 w-64 md:w-1/2 lg:w-1/2" placeholder=" Search">&nbsp;
            <button type="submit" class="text-white border-2 border-white">検索</button>
        </form>
 
        @if ($items == null)
            
        @else (count($items) > 0)
            
            
            @foreach ($items as $item)
            <div class="bg-white rounded-lg p-6 m-6 max-w-xs sm:max-w-s md:max-w-3xl lg:max-w-4xl mx-auto">
                <div class="flex items-center space-x-6 mb-4">
                    <img class="h-46 w-28 object-cover object-center" src="{{ $item['Item']['mediumImageUrl']}}">
                    <div>
                        <p class="text-xl text-gray-700 font-normal mb-1">{{ $item['Item']['title']}}</p>
                        <p class="text-base text-gray-600 font-normal">{{ $item['Item']['author']}}</p>
                        <p class="text-sm text-gray-600 font-normal">{{ $item['Item']['salesDate']}}</p>
                    </div>
                </div>
                <div>
                    <p class="text-gray-400 leading-loose font-normal text-base">{{ $item['Item']['itemCaption']}}</p>
                </div>
                <div>
                    
                </div>
                <form action="{{ route('posts.selectmusic') }}" method="get" class="text-right">
                    @csrf
                    <input type="hidden" name="item[]" value={{ $item['Item']['title']}}>
                    <input type="hidden" name="item[]" value={{ $item['Item']['largeImageUrl']}}>
                    <input type="hidden" name="item[]" value={{ $item['Item']['author']}}>
                    <input type="hidden" name="item[]" value={{ $item['Item']['salesDate']}}>
                    <input type="hidden" name="item[]" value={{ $item['Item']['itemUrl']}}>
                    <button type="submit" class="text-white bg-gray-500 mt-4 ">この本の主題歌を選ぶ</button>
                </form>
            </div>
            
            @endforeach
        @endif
    </body>
</html>
@endsection()