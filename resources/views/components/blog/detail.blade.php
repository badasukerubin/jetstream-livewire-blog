@if ($current)
<section class="w-2/3 md:w-2/3 flex flex-col items-center px-3 mx-auto">
    <article class="flex flex-col shadow my-4">
        <div class="bg-white flex flex-col justify-start p-6">
            <span class="text-3xl font-bold hover:text-gray-700 pb-4">{{$current->title}}</span>
            <p class="text-sm pb-8">
                By <a class="font-semibold hover:text-gray-800">{{$current->user_name}}</a>, Published on
                {{$current->publication_date->format('M d, Y g:i A')}}
            </p>
            {!!$current->description!!}
        </div>
    </article>

    <div class="w-full flex pt-6">
        @if ($prev)
        <a href="{{route('blog.details', $prev->post_id)}}" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
            <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i>
                Previous
            </p>
            <p class="pt-2">{{$prev->title}}</p>
        </a>
        @endif
        @if ($next)
        <a href="{{route('blog.details', $next->post_id)}}"
            class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
            <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i
                    class="fas fa-arrow-right pl-1"></i></p>
            <p class="pt-2">{{$next->title}}</p>
        </a>
        @endif
    </div>

    <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
        <div class="flex-1 flex flex-col justify-center md:justify-start">
            <p class="font-semibold text-2xl">{{$current->user_name}}</p>
            <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero
                suscipit suscipit eu eu urna.</p>
            <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-4" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-4" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-4" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@else
<div>
    This post no longer exists
</div>
@endif
