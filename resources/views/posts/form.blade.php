@csrf 
<dl class="form-list">
    <dt>記事タイトル</dt>
    <dd><input type="text" name="title" value="{{ old('title',$post->title) }}"></dd>
    
    <dt>{{ $post->book_title}}</dt>
    <input type="hidden" name="book_title" value="{{ $post->book_title}}">
    @if (!$post->book_imag_url == null)
        <img src="{{ $post->book_imag_url}}"><br>
        <input type="hidden" name="book_imag_url" value="{{ $post->book_imag_url}}">
    @endif
    @if (!$post->author == null)
        著者：{{ $post->author}}<br>
        <input type="hidden" name="author" value="{{ $post->author}}">
    @endif
    @if (!$post->publish_date == null)
        発売日：{{ $post->publish_date}}<br>
        <input type="hidden" name="publish_date" value="{{ $post->publish_date}}">
    @endif
    <br>
    @if (!$post->book_url == null)
        書籍URL：{{ $post->book_url}}<br>
        <input type="hidden" name="book_url" value="{{ $post->book_url}}">
    @endif
    <br>
    <dt>マイ主題歌</d>
    @if (!$post->music_imag == null)
        <img src="{{ $post->music_imag}}"><br>
        <input type="hidden" name="music_imag" value="{{ $post->music_imag}}">
    @endif
    @if (!$post->author == null)
        アーティスト：{{ $post->music_artist}}<br>
        <input type="hidden" name="music_artist" value="{{ $post->music_artist}}">
    @endif
    @if (!$post->music_title == null)
        曲名：{{ $post->music_title}}<br>
        <input type="hidden" name="music_title" value="{{ $post->music_title}}">
    @endif
    <br>
    <dt>コメント</dt>
    <dd><textarea name="body" rows="5" cols="10">{{ old('body', $post->body) }}</textarea></dd>
</dl>