<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Informatika Academy') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Informatika Academy</h1>
            <div class="space-x-4">
                @auth
                    <span>Halo, {{ auth()->user()->name }}</span>
                    <a href="/{{ auth()->user()->role }}" class="bg-blue-500 px-3 py-1 rounded">Dashboard</a>
                @else
                    <a href="/login" class="bg-blue-500 px-3 py-1 rounded">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-8">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>