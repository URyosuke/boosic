@extends('layouts.app')
@section('content')
<p><a href="{{ route('posts.create') }}">記事を書く</a></p>
@foreach ($articles as $article)
<article class="post-item">
    <div class="post-title">{{ $post->title }}</div>
    <div class="post-body">{{ $post->body }}</div>
</article>
@endforeach
@endsection()