@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('posts.update', $post) }}" method="post">
    @method('patch')
    @include('posts.form')
    <button type="submit">更新する</button>
    <a href="{{ route('posts.show', $post) }}">キャンセル</a>
</form>
@endsection()