@csrf 
<dl class="form-list">
    <dt>記事タイトル</dt>
    <dd><input type="text" name="title" value="{{ old('title',$post->title) }}"></dd>
    @if(1 == 1)
        <button type="button" onclick="location.href='{{ route('posts.selectbook') }}'">本を選ぶ</button>
    @endif
    <dt>コメント</dt>
    <dd><textarea name="body" rows="5">{{ old('body', $post->body) }}</textarea></dd>
</dl>