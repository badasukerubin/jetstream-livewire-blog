<?php

namespace App\View\Components\Blog;

use App\Models\Post as ModelsPost;
use App\Queries\Posts\EloquentPostQuery;
use Illuminate\View\Component;

class Post extends Component
{
    /**
     * API URL for post import
     */
    const API_URL = 'https://sq1-api-test.herokuapp.com/posts';

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

        $this->automaticallyImportFromAPI();
    }

    private function automaticallyImportFromAPI()
    {
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_ENCODING => '',
            CURLOPT_AUTOREFERER => true,
            CURLOPT_CONNECTTIMEOUT => 120,
            CURLOPT_TIMEOUT => 120,
        ];

        $ch = curl_init(self::API_URL);
        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($content, true);
        $posts = $result['data'];
        $userId = 1; // Admin's ID
        $posts = array_map(function ($arr) use ($userId) {
            return $arr + ['user_id' => $userId, 'updated_at' => now()];
        }, $posts);

        ModelsPost::insert($posts);
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
