<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <header>
        <div class="site-title">BOOSIC</div>
    </header>
    <main class="container">
        @foreach ($posts as $post)
        <article class="article-item">
            <div class="article-title">{{ $post->title }}</div>
            <div class="article-body">{{ $post->body }}</div>
        </article>
        @endforeach
    </main>
</body>
</html>