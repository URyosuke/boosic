<div class="mx-auto px-4 md:px-12">
    <div class="flex justify-center flex-wrap -mx-1 lg:-mx-4">
        @foreach ($posts as $post)
        <!-- Column -->
        <div class="flex justify-center my-1 px-1 w-full max-w-5xl">
            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg bg-gray-400 container">
                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-lg">
                        <a class="no-underline hover:underline text-black font-black text-2xl" href="{{ route('posts.show', $post) }}">
                            {{ $post->title }}
                        </a>
                    </h1>
                    <p class="text-grey-darker text-sm">
                        {{ $post->created_at }}
                    </p>
                </header>
                <hr class="h-px bg-gray-500 border-0">
                <div name="articleContents" class="grid grid-cols-5 pb-2">
                    <a href="{{ route('posts.show', $post) }}" class="flex justify-center col-span-1 mt-2">
                        <img alt="Placeholder" class="block w-40 left-1/2" src="{{ $post->book_imag_url}}">
                    </a>
                    <div class="top-1/2 col-span-1 text-black">
                        <div class="py-8 px-4 text-center">
                            <p class="text-lg font-bold">
                                マイ主題歌
                            </p>
                            <div>
                                <img class="rounded-full inline-block" src="{{ $post->music_imag }}">
                            </div>
                            <div>
                                {{ $post->music_title }}
                            </div>
                        </div>
                        
                    </div>
                    <div name="articleComment" class="text-lg font-bold col-span-3 text-black mt-8">
                        コメント
                        <div class="mt-2 h-3/4 w-full bg-gray-200 text-base rounded-lg">
                            {{ $post->body }}
                        </div>
                    </div>
                </div>
                <hr class="h-px bg-gray-500 border-0">
                <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    <a class="flex items-center no-underline hover:underline text-black" href="#">
                        <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                        <p class="ml-2 text-sm">
                            {{ $post->user->name }}
                        </p>
                    </a>
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
                </footer>
            </article>
            <!-- END Article -->
        </div>
        <!-- END Column -->
        @endforeach
    </div>
</div>
{{ $posts->links() }}