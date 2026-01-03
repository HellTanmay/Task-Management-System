<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Manager')</title>

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Additional Meta Tags for Better SEO and Performance --}}
    <meta name="description" content="A simple and efficient task manager to organize your daily tasks.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    {{-- Preload Fonts or Other Assets if Needed --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen font-sans antialiased">

    {{-- Main Content --}}
    <main class="relative">
        @yield('content')
    </main>


    @stack('scripts')

</body>
</html>