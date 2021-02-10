<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class Details extends Component
{
    protected $details;

    public function mount(Post $post)
    {
        $this->details = $post->where('id', request()->id)->first();
    }

    public function render()
    {
        $data = [
            'details' => $this->details,
        ];

        return view('livewire.blog.details')->with($data);
    }
}
