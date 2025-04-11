<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bowling Brooklyn')</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Add Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-800"> <!-- Add Tailwind utility classes -->
    <nav class="bg-blue-500 text-white p-4">
        <!-- Add navigation bar here if needed -->
    </nav>
    <main class="container mx-auto p-4">
        @yield('content')
    </main>
    <footer class="bg-gray-800 text-white text-center p-4">
        <!-- Add footer here if needed -->
    </footer>
</body>
</html>
