<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form action="{{ route('companies.update', $company->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nomi:</label>
    <input type="text" name="name" value="{{ old('name', $company->name) }}"><br>

    <label for="address">Manzil:</label>
    <input type="text" name="address" value="{{ old('address', $company->address) }}"><br>

    <label for="phone">Telefon:</label>
    <input type="text" name="phone" value="{{ old('phone', $company->phone) }}"><br>

    <button type="submit">Saqlash</button>
</form>
</body>
</html>
