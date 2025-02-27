<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PluginGuard') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{ asset('./favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('./favicon.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('./favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex">
    @include('layouts.sidebar')
    <div class="flex-1 flex flex-col">
        @include('layouts.navigation')
        <main class="flex-1 p-6 ml-64">
            @yield('content')
        </main>
    </div>
</body>
</html>
