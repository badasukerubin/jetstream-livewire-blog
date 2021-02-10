<?php

namespace App\Http\Livewire\Blog;

use App\Queries\Posts\EloquentPostQuery;
use Livewire\Component;

class Details extends Component
{
    protected $details;

    public function mount(EloquentPostQuery $eloquentPostQuery)
    {
        $requestParams = request()->toArray();
        $requestParams['user_id'] = auth()->id();
        $requestParams['id'] = request()->id;

        $this->details = $eloquentPostQuery->getPosts($requestParams, 'details');
    }

    public function render()
    {
        $data = [
            'details' => $this->details,
        ];

        return view('livewire.blog.details')->with($data);
    }
}
