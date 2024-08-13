<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre')</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</head>
<body class="bg-white dark:bg-gray-900">
    <div class="mx-8 content-center">
        @yield('content')
    </div>
</body>
</html>