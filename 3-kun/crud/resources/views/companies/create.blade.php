<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-5">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>create</title>
</head>
<body>
<h1>Tashkilot qo'shish</h1>
<div class="row">
    <div class="mb-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('companies.store')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tashkilot nomi</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Tashkilot manzili</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Tashkilot telefon raqami</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <button type="submit" class="btn btn-primary">Saqlash</button>
        </form>
    </div>
</div >

</body>
</html>
