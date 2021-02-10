{{-- {{ray($post->all())}} --}}
@forelse ($posts as $post)
<article class="flex flex-col shadow my-4">
    <div class="bg-white flex flex-col justify-start p-6">
        <a href="{{route('blog.details', $post->id)}}"
            class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
        <p href="{{route('blog.details', $post->id)}}" class="text-sm pb-3">
            By <a href="{{route('blog.details', $post->id)}}"
                class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>,
            Published {{$post->publication_date->format('M d, Y')}}
        </p>
        <a href="{{route('blog.details', $post->id)}}"
            class="pb-6">{{\Illuminate\Support\Str::limit(strip_tags($post->description), 250, $end='...')}}</a>
        <a href="{{route('blog.details', $post->id)}}" class="uppercase text-gray-800 hover:text-black">Continue Reading
            <i class="fas fa-arrow-right"></i></a>
    </div>
</article>
{!! $posts->render() !!}
@empty
There are no posts yet!
@endforelse
