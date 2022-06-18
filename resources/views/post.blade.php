<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <article>
          <h1>{{$post->title}}</h1>
          <p>
            {{$post->body}}
          </p>
        </article>

        <a href="/">Back to Home</a>
    </body>
</html>
