<!DOCTYPE html>
<html>
<head>
    <title>Yangi Post</title>
</head>
<body>
<h1>Yangi Post Yaratish</h1>

@if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $xato)
                <li>{{ $xato }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label>Sarlavha:</label>
    <input type="text" name="title" value="{{ old('title') }}">
    <br>
    <label>Matn:</label>
    <textarea name="body">{{ old('body') }}</textarea>
    <br>
    <button type="submit">Saqlash</button>
</form>

<a href="{{ route('posts.index') }}">Orqaga</a>
</body>
</html>
