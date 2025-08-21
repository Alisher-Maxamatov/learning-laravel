<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<body>
<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>

<a href="{{ route('posts.edit', $post->id) }}">Tahrirlash</a>
<form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">O'chirish</button>
</form>

<br><a href="{{ route('posts.index') }}">Orqaga</a>
</body>
</html>
