@extends('layouts.app')
@section('content')
@include('commons.errors')
<h1>マイページ</h1>
<p>ようこそ、{{ Auth::user()->name }}さん</p>
<p>新規投稿はこちら→<a href="{{ route('posts.selectbook') }}">本を選ぶ</a></p>
@include('posts.posts')
@endsection()