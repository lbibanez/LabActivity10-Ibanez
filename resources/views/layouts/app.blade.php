<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Bulletin - Purok Ibanez</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">
    <header class="bg-blue-900 text-white p-4 shadow">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">
                <a href="{{ route('posts.index') }}">Barangay Bulletin - Purok Ibanez</a>
            </h1>
        </div>
    </header>

    <main class="max-w-4xl mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>