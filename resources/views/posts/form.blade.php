@csrf 
<div class="bg-white editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-4xl">
    <p class="px-2 mx-2 font-bold">記事タイトル</p>
    <input class="title bg-gray-100 border border-gray-300 p-2 m-2 outline-none" spellcheck="false" placeholder="Title" type="text" name="title" value="{{ old('title',$post->title) }}">
    <div id="formDetail" class='grid grid-cols-2 mb-4'>
        <div class="col-span-1 text-center text-align-center bg-white rounded-lg m-2 border">
            <div class="flex items-center space-x-6 justify-center items-center h-full p-2">
                @if (!$post->book_imag_url == null)
                    <img class="h-46 w-28 object-cover object-center" 
                    src="{{ $post->book_imag_url }}">
                @endif
                <div>
                    <p class="text-xl text-gray-700 font-normal mb-1">{{ $post->book_title }}</p>
                    @if (!$post->author == null)
                        <p class="text-base text-gray-600 font-normal">{{ $post->author }}</p>
                    @endif
                    @if (!$post->publish_date == null)
                        <p class="text-sm text-gray-600 font-normal">{{ $post->publish_date }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-1 text-center rounded-lg m-2 border ">
            <div class="flex items-center space-x-6 justify-center items-center h-full p-2">
                @if (!$post->music_imag == null)
                    <img class='rounded-full h-28 w-28 object-cover object-center'src="{{ $post->music_imag }}"><br>
                @endif
                <div>
                    <p class="text-xl text-gray-700 font-normal mb-1">{{ $post->music_title }}</p>
                    @if (!$post->music_artist == null)
                        <p class="text-xl text-gray-600 font-normal mb-1">{{ $post->music_artist }}</p>
                    @endif
                    @if (!$post->music_url == null)
                        <a href={{ $post->music_url }} target="_blank" class="text-sm text-gray-600 font-normal">聞いてみる</a><br>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <p class="px-2 mx-2 font-bold">コメント</p>
    <textarea class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="Comment" name="body" rows="5" cols="10">{{ old('body', $post->body) }}</textarea>
</div>
<input type="hidden" name="book_title" value="{{ $post->book_title}}">
<input type="hidden" name="book_imag_url" value="{{ $post->book_imag_url}}">
<input type="hidden" name="author" value="{{ $post->author}}">
<input type="hidden" name="publish_date" value="{{ $post->publish_date}}">
<input type="hidden" name="book_url" value="{{ $post->book_url}}">
<input type="hidden" name="music_imag" value="{{ $post->music_imag}}">
<input type="hidden" name="music_artist" value="{{ $post->music_artist}}">
<input type="hidden" name="music_title" value="{{ $post->music_title}}">
<imput type="hidden" name="music_url" value="{{ $post->music_url }}">
<script src="{{asset('form.js')}}"></script>