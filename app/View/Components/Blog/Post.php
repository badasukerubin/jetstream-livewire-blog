<?php

namespace App\View\Components\Blog;

use App\Queries\Posts\EloquentPostQuery;
use Illuminate\View\Component;

class Post extends Component
{
    /**
     * All Posts
     *
     *@var Collection $post
     */
    public $posts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(EloquentPostQuery $eloquentPostQuery)
    {
        $requestParams = request()->toArray();

        $this->posts = $eloquentPostQuery->getPosts($requestParams, 'list');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.blog.post');
    }
}
