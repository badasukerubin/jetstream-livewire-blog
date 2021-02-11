<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    /**
     * Post title
     *
     * @var string
     */
    public $title;

    /**
     * Post description
     *
     * @var string
     */
    public $description;

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required|max:255|string',
        'description' => 'required|string',
    ];

    /**
     * Create blog post
     *
     * @return Redirect
     */
    public function createBlogPost()
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] = auth()->id();

        Post::create($validatedData);

        return redirect(route('dashboard.blog.read'));
    }

    public function render()
    {
        return view('livewire.blog.create');
    }
}
