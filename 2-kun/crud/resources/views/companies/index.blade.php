<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Postlar ro'yxati</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .post {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-bottom: 20px;
            padding: 20px;
            transition: 0.3s;
        }

        .post:hover {
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .post h2 {
            margin-top: 0;
            color: #333;
        }

        .post p {
            color: #555;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .pagination .page-link {
            margin: 0 5px;
            padding: 8px 14px;
            background-color: #fff;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background-color: #007bff;
            color: #fff;
        }

        .pagination .active .page-link {
            background-color: #007bff;
            color: #fff;
            pointer-events: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Postlar ro'yxati</h1>

    @foreach ($companies as $company)
        <div class="post">
            <h2>{{ $company->name }}</h2>
            <p>{{ Str::limit($company->description, 200, '...') }}</p>
            <small>{{ $company->created_at->format('Y-m-d') }}</small>
        </div>
    @endforeach

    <div>
        {{ $companies->links() }}
    </div>
</div>
</body>
</html>
