<!DOCTYPE html>
<html>
<head>
    <title>Postni Tahrirlash</title>
</head>
<body>
<h1>Postni Tahrirlash</h1>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $xato)
                <li>{{ $xato }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Sarlavha:</label>
    <input type="text" name="title" value="{{ old('title', $post->title) }}">
    <br>
    <label>Matn:</label>
    <textarea name="body">{{ old('body', $post->body) }}</textarea>
    <br>
    <button type="submit">Yangilash</button>
</form>

<a href="{{ route('posts.index') }}">Orqaga</a>
</body>
</html>
