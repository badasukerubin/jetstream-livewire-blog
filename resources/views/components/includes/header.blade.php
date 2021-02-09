<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="{{route('welcome')}}">
            {{ config('app.name') }}
        </a>
        <p class="text-lg text-gray-600">
            Welcome to {{ config('app.name') }}
        </p>
    </div>
</header>
