@foreach ($posts as $post)
<post class="post-item">
    <div class="post-title"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></div>
    <div class="post-info">
        {{ $post->created_at }}｜{{ $post->user->name }}
    </div>
</post>
@endforeach