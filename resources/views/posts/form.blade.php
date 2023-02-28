@csrf 
<dl class="form-list">
    <dt>タイトル</dt>
    <dd><input type="text" name="title" value="{{ old('title',$post->title) }}"></dd>
    <dt>本文</dt>
    <dd><textarea name="body" rows="5">{{ old('body', $post->body) }}</textarea></dd>
</dl>