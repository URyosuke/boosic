@csrf 
<dl class="form-list">
    <dt>記事タイトル</dt>
    <dd><input type="text" name="title" value="{{ old('title',$post->title) }}"></dd>
    @if($item == null)
        <button type="button" onclick="location.href='{{ route('posts.selectbook') }}'">本を選ぶ</button>
    @else
        <h2>{{ $item['Item']['title']}}</h2>
            @if (array_key_exists('mediumImageUrl', $item['Item']))
                <img src="{{ $item['Item']['mediumImageUrl']}}"><br>
            @endif
                            
            @if (array_key_exists('author', $item['Item']))
                著者：{{ $item['Item']['author']}}<br>
            @endif
            @if (array_key_exists('salesDate', $item['Item']))
                発売年月：{{ $item['Item']['salesDate']}}<br>
            @endif
            <br>
            @if (array_key_exists('itemCaption', $item['Item']))
                概要：{{ $item['Item']['itemCaption']}}<br>
            @endif
            <br>
            <hr>
    @endif
    <dt>コメント</dt>
    <dd><textarea name="body" rows="5">{{ old('body', $post->body) }}</textarea></dd>
</dl>