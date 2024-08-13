<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white dark:bg-gray-900">
    <div class="mx-8 content-center">
        @yield('content')
    </div>
</body>
</html>