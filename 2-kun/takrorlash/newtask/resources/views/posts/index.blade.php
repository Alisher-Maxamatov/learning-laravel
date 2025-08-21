<!DOCTYPE html>
<html>
<head>
    <title>Postlar ro‘yxati</title>
</head>
<body>

<h1>Postlar</h1>

@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif
<a href="{{ route('posts.create') }}">
    <button>Yangi Post Yaratish</button>
</a>

<hr>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Sarlavha</th>
        <th>Matn</th>
        <th>Amallar</th>
    </tr>

    @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>
                <a href="{{ route('posts.edit', $post->id) }}">
                    <button>Edit</button>
                </a>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
