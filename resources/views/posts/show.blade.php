@extends('layouts.app')
@section('content')
<article class="post-detail">
    <h1 class="post-title">{{ $post->title }}</h1>
    <div class="post-info">{{ $post->created_at }}</div>
    <div class="post-body">{!! nl2br(e($post->body)) !!}</div>
    <div class="post-control">
        <a href="{{route('posts.edit',$post)}}">編集</a>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
</article>
@endsection