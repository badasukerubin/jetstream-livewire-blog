<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-includes.head />
</head>

<body class="bg-white font-family-karla">
    <x-includes.header />
    <x-includes.nav />

    <div class="container mx-auto flex flex-wrap py-6">
        <x-blog.post />
    </div>

    <x-includes.footer />
</body>

</html>
