<?php

namespace App\View\Components\Blog;

use App\Models\Post;
use Illuminate\View\Component;

class Detail extends Component
{
    /**
     * The post details.
     *
     * @var string
     */
    public $details;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
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
