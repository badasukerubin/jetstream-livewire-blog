<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-includes.head />
</head>

<body class="bg-white font-family-karla">
    <x-includes.header />
    <x-includes.nav />

    {{ $slot }}

    <x-includes.footer />
</body>

</html>
