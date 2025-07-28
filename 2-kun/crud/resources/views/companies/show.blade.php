<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>show metodi</title>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table table-bordered">
        <tr>
            <td>Tashkilot nomi</td>
            <td>{{$company->name}}</td>
            <tr>
            <td>Tashkilot manzili</td>
            <td>{{$company->address}}</td>
            <tr>
            <td>Tashkilot telefon raqami</td>
            <td>{{$company->phone}}</td>
        </tr>
    </table>
        </div>
    </div>
</head>
<body>
<h1>Bu show sahifasi</h1>
</body>
</html>
