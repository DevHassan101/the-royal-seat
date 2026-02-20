<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('build/assets/app-71c0a4b5.css') }}">
    <script src="{{ asset('build/assets/app-ac76474c.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Outfit", sans-serif;
        }
    </style>

</head>

<body>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-slate-200 font-roboto">
        @include('layouts.navigation')

        <div class="flex overflow-hidden flex-col flex-1">
            @include('layouts.header')

            <main class="overflow-y-auto overflow-x-hidden flex-1 bg-slate-200 px-10">
                <div class="container py-8 mx-auto">
                    @if (session('success'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                            class="mb-4 flex items-center justify-between rounded-lg bg-green-50 border border-green-200 px-4 py-3 text-green-800">
                            <span>{{ session('success') }}</span>
                            <button @click="show = false" class="text-green-600 hover:text-green-800">&times;</button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                            class="mb-4 flex items-center justify-between rounded-lg bg-red-50 border border-red-200 px-4 py-3 text-red-800">
                            <span>{{ session('error') }}</span>
                            <button @click="show = false" class="text-red-600 hover:text-red-800">&times;</button>
                        </div>
                    @endif

                    @if (isset($header))
                        <h3 class="mb-4 text-3xl font-medium text-gray-700">
                            {{ $header }}
                        </h3>
                    @endif

                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    @stack('body')
</body>

</html>
