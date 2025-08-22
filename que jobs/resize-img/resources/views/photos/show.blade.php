<!DOCTYPE html>
<html>
<head>
    <title>Rasm ko‘rish</title>
</head>
<body>
<h1>Rasm tafsilotlari</h1>

<p>Status: {{ $photo->status }}</p>

<p>Original:</p>
<img src="{{ asset('storage/' . $photo->original_path) }}" width="200">

@if($photo->status === 'done')
    <p>Thumb:</p>
    <img src="{{ asset('storage/' . $photo->thumb_path) }}" width="100">

    <p>Medium:</p>
    <img src="{{ asset('storage/' . $photo->medium_path) }}" width="200">

    <p>Large:</p>
    <img src="{{ asset('storage/' . $photo->large_path) }}" width="400">
@else
    <p>Rasmlar hali tayyor emas. Worker bajarib bo‘lgach chiqadi.</p>
@endif
</body>
</html>
