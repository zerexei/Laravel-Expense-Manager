<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Expense Manager</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>

<body class="antialiased">
    <div id="app" class="relative min-h-screen bg-gray-100 py-4 sm:pt-0">
        {{ $slot }}
    </div>
</body>

</html>
