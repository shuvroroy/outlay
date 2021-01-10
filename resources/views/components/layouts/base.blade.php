<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Outlay | {{ $title }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <livewire:styles />
    </head>
    <body class="antialiased font-sans">
        <div class="min-h-screen bg-gray-50">
            {{ $slot }}
        </div>
        <livewire:scripts />
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
