@extends('layouts.app')
@section('content')
<p><a href="{{ route('posts.create') }}">記事を書く</a></p>
@foreach ($posts as $post)
<article class="post-item">
    <div class="post-title">
        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
    </div>
    <div class="post-info">{{ $post->created_at }}</div>
</article>
@endforeach
@endsection()