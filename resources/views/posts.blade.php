<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
    
    @foreach ($posts as $post)
        <article>
            <h1> <a href="posts/{{$post->slug}}"> {{ $post->title }}</a></h1>
            <p>
                {{$post->excert}}
            </p>
        </article>
        <br>
    @endforeach
    
</body>
