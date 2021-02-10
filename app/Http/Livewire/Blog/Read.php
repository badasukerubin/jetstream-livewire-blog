<?php

namespace App\Http\Livewire\Blog;

use App\Queries\Posts\EloquentPostQuery;
use Livewire\Component;

class Read extends Component
{
    /**
     * All Posts
     *
     *@var Collection $post
     */
    protected $posts;

    public function mount(EloquentPostQuery $eloquentPostQuery)
    {
        $requestParams = request()->toArray();
        $requestParams['user_id'] = auth()->id();

        $this->posts = $eloquentPostQuery->getPosts($requestParams, 'list');
    }

    public function render()
    {
        $data = [
            'posts' => $this->posts,
        ];

        return view('livewire.blog.read')->with($data);
    }
}
