<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BlogUploader - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 ">

    <div class="mx-auto max-w-screen-2xl">
        @section('header')
            {{-- This is the master header. --}}
        @show

        <div class="mt-5">
            <x-notifications.toast/>
            @yield('content')
        </div>
    </div>

</body>

</html>
