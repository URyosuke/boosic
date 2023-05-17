@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>マイ主題歌を選ぶ</title>
    </head>
    <body>
        <dt>{{ $book_title}}</dt>
        @if (!$book_imag_url == null)
            <img src="{{ $book_imag_url}}"><br>
        @endif
        @if (!$author == null)
            著者：{{ $author}}<br>
        @endif
        @if (!$publish_date == null)
            発売日：{{ $publish_date}}<br>
        @endif
        <br>
        @if (!$book_url == null)
            <a href={{ $book_url}} target="_blank">書籍リンク</a><br>
        @endif
        <h1>マイ主題歌を選ぶ</h1>
        <form action="{{ route('posts.selectmusic') }}" method="get">
            @csrf
            <input type="hidden" name="item[]" value={{ $book_title }}>
            <input type="hidden" name="item[]" value={{ $book_imag_url }}>
            <input type="hidden" name="item[]" value={{ $author }}>
            <input type="hidden" name="item[]" value={{ $publish_date }}>
            <input type="hidden" name="item[]" value={{ $book_url }}>
            キーワード:<input type="text" name="keyword" size="50" value="{{ $keyword }}">&nbsp;<input type="submit" value="検索">
        </form>
        @if ($Items == null)
            <p>検索キーワードを入力してください。</p>
        @else (count($Items["tracks"]["items"]) > 0)
            <p>「{{ $keyword }}」の検索結果</p>
            <hr>
            @foreach ($Items["tracks"]["items"] as $item)
            <h2>{{ $item['name']}}</h2>
                @if (array_key_exists('images', $item['album']))
                    <img src="{{ $item['album']['images'][2]["url"]}}"><br>
                @endif
                                
                @if (array_key_exists('artists', $item['album']))
                    アーティスト名：{{ $item['album']['artists'][0]["name"]}}<br>
                @endif
                
                @if (array_key_exists('preview_url', $item))
                    <a href={{ $item["preview_url"]}} target="_blank">聞いてみる</a><br>
                @endif
                <br>
                <form action="{{ route('posts.create') }}" method="get">
                    @csrf
                    <input type="hidden" name="item[]" value={{ $book_title }}>
                    <input type="hidden" name="item[]" value={{ $book_imag_url }}>
                    <input type="hidden" name="item[]" value={{ $author }}>
                    <input type="hidden" name="item[]" value={{ $publish_date }}>
                    <input type="hidden" name="item[]" value={{ $book_url }}>
                    <input type="hidden" name="item[]" value={{ $item['name'] }}>
                    <input type="hidden" name="item[]" value={{ $item['album']['images'][2]["url"]}}>
                    <input type="hidden" name="item[]" value={{ $item['album']['artists'][0]["name"]}}>
                    <input type="hidden" name="item[]" value={{ $item['preview_url'] }}>
                    <input type="submit" value="my主題歌に選択">
                </form>
                <hr>
            @endforeach
        @endif
    </body>
</html>
@endsection()