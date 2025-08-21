<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update</title>
</head>
<body>
<h1>Bu update sahifasi</h1>
<form action="{{ route('companies.update', $company->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" name="name" value="{{ $company->name }}" required><br>

    <label for="address">Address:</label>
    <input type="text" name="address" value="{{ $company->address }}" required><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" value="{{ $company->phone }}" required><br>

    <button type="submit">Yangilash</button>
</form>

</body>
</html>
