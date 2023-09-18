@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
    <body>
        <div class="bg-white rounded-lg p-6 m-6 max-w-xs sm:max-w-s md:max-w-3xl lg:max-w-4xl mx-auto">
            <div class="flex items-center space-x-6 mb-4">
                @if (!$book_imag_url == null)
                    <img class="h-46 w-28 object-cover object-center" 
                    src="{{ $book_imag_url}}">
                @endif
                <div>
                    <p class="text-xl text-gray-700 font-normal mb-1">{{ $book_title}}</p>
                    @if (!$author == null)
                        <p class="text-base text-gray-600 font-normal">{{ $author}}</p>
                    @endif
                    @if (!$publish_date == null)
                        <p class="text-sm text-gray-600 font-normal">{{ $publish_date}}</p>
                    @endif
                </div>
            </div>
        </div>
        
        <h1 class="text-center text-3xl md:text-4xl lg:text-5xl pb-8">マイ主題歌を選ぶ</h1>
        <form action="{{ route('posts.selectmusic') }}" method="get" class="text-center">
            @csrf
            <input type="hidden" name="item[]" value={{ $book_title }}>
            <input type="hidden" name="item[]" value={{ $book_imag_url }}>
            <input type="hidden" name="item[]" value={{ $author }}>
            <input type="hidden" name="item[]" value={{ $publish_date }}>
            <input type="hidden" name="item[]" value={{ $book_url }}>
            <input type="text" name="keyword" size="50" value="{{ $keyword }}" class="text-black border-red-300 w-64 md:w-1/2 lg:w-1/2">&nbsp;
            <button type="submit" class="text-white border-2 border-white">検索</button>
        </form>
        @if ($Items == null)
            
        @else (count($Items["tracks"]["items"]) > 0)
            <div class="overflow-auto h-96 m-6 rounded-lg p-6 bg-white text-black max-w-xs sm:max-w-s md:max-w-3xl lg:max-w-4xl mx-auto">
                @foreach ($Items["tracks"]["items"] as $item)
                <div>
                    <div class="flex items-center space-x-6 mt-4">
                        @if (array_key_exists('images', $item['album']))
                            <img class='rounded-full h-24 w-24 object-cover object-center'src="{{ $item['album']['images'][2]["url"]}}"><br>
                        @endif
                        <div>
                            <p class="text-xl text-gray-700 font-normal mb-1">{{ $item['name']}}</p>
                            @if (array_key_exists('artists', $item['album']))
                                <p class="text-xl text-gray-600 font-normal mb-1">{{ $item['album']['artists'][0]["name"]}}</p>
                            @endif
                            @if (array_key_exists('preview_url', $item))
                                <a href={{ $item["preview_url"]}} target="_blank" class="text-sm text-gray-600 font-normal">聞いてみる</a><br>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('posts.create') }}" method="get" class="text-right pb-4">
                        @csrf
                        <input type="hidden" name="item[]" value={{ $book_title }}>
                        <input type="hidden" name="item[]" value={{ $book_imag_url }}>
                        <input type="hidden" name="item[]" value={{ $author }}>
                        <input type="hidden" name="item[]" value={{ $publish_date }}>
                        <input type="hidden" name="item[]" value={{ $book_url }}>
                        <input type="hidden" name="item[]" value={{ $item['name'] }}>
                        <input type="hidden" name="item[]" value={{ $item['album']['images'][2]["url"]}}>
                        <input type="hidden" name="item[]" value={{ $item['album']['artists'][0]["name"] }}>
                        <input type="hidden" name="item[]" value={{ $item['preview_url'] }}>
                        <button type="submit" class="text-white bg-gray-500 mt-4 ">主題歌に選択</button>
                    </form>
                    <hr>
                </div>
                @endforeach
            </div>
        @endif
    </body>
</html>
@endsection()