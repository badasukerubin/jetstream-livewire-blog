<?php

namespace App\View\Components\Blog;

use App\Models\Post;
use Illuminate\View\Component;

class Detail extends Component
{
    /**
     * The current post.
     *
     * @var Post $current
     */
    public $current;

    /**
     * The previous post.
     *
     * @var Post $prev
     */
    public $prev;

    /**
     * The next post.
     *
     * @var Post $next
     */
    public $next;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($current, $prev, $next)
    {
        $this->current = $current;
        $this->prev = $prev;
        $this->next = $next;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.blog.detail');
    }
}
