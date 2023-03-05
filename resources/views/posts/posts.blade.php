@foreach ($posts as $post)
<post class="post-item">
    <div class="post-title"><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></div>
    <div class="post-info">
        {{ $post->created_at }}｜{{ $post->user->name }}
    </div>
    <div class="post-control">
        @if (!Auth::user()->is_bookmark($post->id))
        <form action="{{ route('bookmark.store', $post) }}" method="post">
            @csrf
            <button>お気に入り登録</button>
        </form>
        @else
        <form action="{{ route('bookmark.destroy', $post) }}" method="post">
            @csrf
            @method('delete')
            <button>お気に入り解除</button>
        </form>
        @endif
    </div>
</post>
@endforeach
{{ $posts->links() }}