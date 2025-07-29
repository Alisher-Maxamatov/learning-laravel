<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resource/js/app.js']);
</head>
<body class="bg-dark-subtle">
<div id="app">
    <main class="py-4">
        @yield('content')
    </main>


</div>
</body>
</html>
