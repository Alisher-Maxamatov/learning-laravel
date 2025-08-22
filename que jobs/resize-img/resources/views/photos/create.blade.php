<!DOCTYPE html>
<html>
<head>
    <title>Rasm yuklash</title>
</head>
<body>
<h1>Rasm yuklash</h1>

@if(session('success'))
    <div style="color: green">{{ session('success') }}</div>
@endif

<form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" required>
    <button type="submit">Yuklash</button>
</form>
</body>
</html>
