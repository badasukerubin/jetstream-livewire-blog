<?php

namespace App\View\Components\Blog;

use App\Models\Post;
use Illuminate\View\Component;

class Article extends Component
{
    const PAGINATE = 10;
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
    public function __construct(Post $post)
    {
        $this->posts = $post->paginate(self::PAGINATE);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.blog.article');
    }
}
