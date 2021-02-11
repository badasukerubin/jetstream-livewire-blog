<?php

namespace App\Http\Livewire\Blog;

use App\Queries\Posts\EloquentPostQuery;
use Livewire\Component;

class Details extends Component
{
    protected $prev;
    protected $next;
    protected $current;

    public function mount(EloquentPostQuery $eloquentPostQuery)
    {
        $requestParams = request()->toArray();
        $requestParams['id'] = request()->id;

        $this->current = $eloquentPostQuery->getOnePost($requestParams)->first();
        $this->prev = $eloquentPostQuery->getPrevNextPosts(request()->id, 'prev')->latest('post_id')->first();
        $this->next = $eloquentPostQuery->getPrevNextPosts(request()->id, 'next')->oldest('post_id')->first();
    }

    public function render()
    {
        $data = [
            'current' => $this->current,
            'prev' => $this->prev,
            'next' => $this->next,
        ];

        return view('livewire.blog.details')->with($data);
    }
}
