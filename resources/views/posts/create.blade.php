@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('posts.store',$post) }}" method="post">
    @include('posts.form')
    <button type="submit">投稿する</button>
    <a href="{{ route('posts.index') }}">キャンセル</a>
</form>
@endsection()