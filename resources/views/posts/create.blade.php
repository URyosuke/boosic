@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('posts.store',$post) }}" method="post">
    @include('posts.form')
    <div class="bg-white mx-auto w-10/12 text-gray-800 border border-gray-300 p-4 shadow-lg max-w-4xl">
        <button type="submit" class="border hover:bg-gray-400">投稿する</button>
        <a href="{{ route('posts.index') }}" class='hover:text-blue-700'>キャンセル</a>
    </div>
</form>
@endsection()