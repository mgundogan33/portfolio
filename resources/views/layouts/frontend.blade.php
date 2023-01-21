<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="bg-slate-200 dark:bg-slate-900">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <div class="max-w-7xl mx-auto">{{ session('success') }}</div>
            </div>
        @endif

        <x-frontend.header></x-frontend.header>
        {{-- Header --}}
        <main class="min-h-screen">
            {{ $slot }}
        </main>
        {{-- Footer --}}
        <x-frontend.footer></x-frontend.footer>
    </div>
</body>

</html>
