<div>
    Sort By: <a href="{{url(App\Traits\RequestTrait::changeSortByInRoute(Route::current(), 'oldest'))}}">Oldest</a> | <a
        href="{{url(App\Traits\RequestTrait::changeSortByInRoute(Route::current(), 'latest'))}}">Latest</a>
    @forelse ($posts as $post)
    <article class="flex flex-col shadow my-4">
        <div class="bg-white flex flex-col justify-start p-6">
            <a href="{{route('blog.details', $post->post_id)}}"
                class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
            <p href="{{route('blog.details', $post->post_id)}}" class="text-sm pb-3">
                By <a href="{{route('blog.details', $post->post_id)}}"
                    class="font-semibold hover:text-gray-800">{{$post->user_name}}</a>,
                Published {{$post->publication_date->format('M d, Y g:i A')}}
            </p>
            <a href="{{route('blog.details', $post->post_id)}}"
                class="pb-6">{{\Illuminate\Support\Str::limit(strip_tags($post->description), 250, $end='...')}}</a>
            <a href="{{route('blog.details', $post->post_id)}}"
                class="uppercase text-gray-800 hover:text-black">Continue
                Reading
                <i class="fas fa-arrow-right"></i></a>
        </div>
    </article>
    @empty
    <br />
    There are no posts yet!
    @endforelse
    {!! $posts->render() !!}
</div>
