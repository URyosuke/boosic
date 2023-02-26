@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('posts.store') }}" method="post">
@csrf 
<dl class="form-list">
    <dt>タイトル</dt>
    <dd><input type="text" name="title" value="{{ old('title') }}"></dd>
    <dt>本文</dt>
    <dd><textarea name="body" rows="5">{{ old('body') }}</textarea></dd>
</dl>
<button type="submit">投稿する</button>
<a href="{{ route('posts.index') }}">キャンセル</a>
</form>
@endsection()