@if ($details)
@foreach ($details as $detail)
@if ($detail->post_id == request()->id)
<section class="w-2/3 md:w-2/3 flex flex-col items-center px-3 mx-auto">
    <article class="flex flex-col shadow my-4">
        <div class="bg-white flex flex-col justify-start p-6">
            <span class="text-3xl font-bold hover:text-gray-700 pb-4">{{$detail->title}}</span>
            <p class="text-sm pb-8">
                By <a class="font-semibold hover:text-gray-800">{{$detail->user_name}}</a>, Published on
                {{$detail->publication_date->format('M d, Y')}}
            </p>
            {!!$detail->description!!}
        </div>
    </article>

    <div class="w-full flex pt-6">
        @if ($detail->post_id < request()->id)
            <a href="{{route('blog.details', $detail->post_id)}}"
                class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i>
                    Previous
                </p>
                <p class="pt-2">{{$detail->title}}</p>
            </a>
            @endif
            @if ($detail->post_id > request()->id)
            <a href="{{route('blog.details', $detail->post_id)}}"
                class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i
                        class="fas fa-arrow-right pl-1"></i></p>
                <p class="pt-2">{{$detail->title}}</p>
            </a>
            @endif
    </div>

    <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-white mt-10 mb-10 p-6">
        <div class="flex-1 flex flex-col justify-center md:justify-start">
            <p class="font-semibold text-2xl">{{$detail->user_name}}</p>
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
@endforeach
@else
<div>
    This post no longer exists
</div>
@endif
