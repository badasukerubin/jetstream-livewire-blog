<?php

namespace App\View\Components\Blog;

use Illuminate\View\Component;

class Article extends Component
{
    /**
     * The posts.
     *
     * @var string
     */
    public $posts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($posts)
    {
        $this->posts = $posts;
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
