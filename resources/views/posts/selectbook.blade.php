@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>PHP/LaravelでGoogle books apiを使うサンプル</title>
    </head>
    <body>
        <h1>本を選ぶ</h1>
        <form action="{{ route('posts.selectbook') }}" method="get">
            @csrf
            書籍名:<input type="text" name="keyword" size="50" value="{{ $keyword }}">&nbsp;<input type="submit" value="検索">
        </form>
 
        @if ($items == null)
            <p>書籍名を入力してください。</p>
        @else (count($items) > 0)
            <p>「{{ $keyword }}」の検索結果</p>
            <hr>
            @foreach ($items as $item)
            <h2>{{ $item['Item']['title']}}</h2>
                @if (array_key_exists('mediumImageUrl', $item['Item']))
                    <img src="{{ $item['Item']['mediumImageUrl']}}"><br>
                @endif
                                
                @if (array_key_exists('author', $item['Item']))
                    著者：{{ $item['Item']['author']}}<br>
                @endif
                @if (array_key_exists('salesDate', $item['Item']))
                    発売年月：{{ $item['Item']['salesDate']}}<br>
                @endif
                <br>
                @if (array_key_exists('itemCaption', $item['Item']))
                    概要：{{ $item['Item']['itemCaption']}}<br>
                @endif
                <br>
                <form action="{{ route('posts.selectmusic') }}" method="get">
                    @csrf
                    <input type="hidden" name="item[]" value={{ $item['Item']['title']}}>
                    <input type="hidden" name="item[]" value={{ $item['Item']['largeImageUrl']}}>
                    <input type="hidden" name="item[]" value={{ $item['Item']['author']}}>
                    <input type="hidden" name="item[]" value={{ $item['Item']['salesDate']}}>
                    <input type="hidden" name="item[]" value={{ $item['Item']['itemUrl']}}>
                    <input type="submit" value="主題歌を選ぶ">
                </form>
                <hr>
            @endforeach
        @endif
    </body>
</html>
@endsection()