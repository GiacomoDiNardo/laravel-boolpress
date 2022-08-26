<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Gentile {{ $post->user->name }}</h1>
    <p>Siamo lieti di informarla che il post è stato creato e il codice funziona</p>
    <p>Per vedere il post clicca il link</p>
    <a href="{{ route("admin.posts.show", $post->slug) }}">Vai al post</a>
</body>
</html>