@extends('layouts.app')
@section('content')
<post class="post-detail">
    <h1 class="post-title">タイトル：{{ $post->title }}</h1>
    <div class="post-info">{{ $post->created_at }}</div>
    <hr>
    <dt>{{ $post->book_title}}</dt>
    @if (!$post->book_imag_url == null)
        <img src="{{ $post->book_imag_url}}"><br>
    @endif
    @if (!$post->author == null)
        著者：{{ $post->author}}<br>
    @endif
    @if (!$post->publish_date == null)
        発売日：{{ $post->publish_date}}<br>
    @endif
    <br>
    @if (!$post->book_url == null)
        書籍URL：{{ $post->book_url}}<br>
    @endif
    <hr>
    <h1 class="post-title">コメント</h1>
    <div class="post-body">{!! nl2br(e($post->body)) !!}</div>
    @can('update',$post)
    <div class="post-control">
        <a href="{{route('posts.edit',$post)}}">編集</a>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
    @endcan
</post>
@endsection