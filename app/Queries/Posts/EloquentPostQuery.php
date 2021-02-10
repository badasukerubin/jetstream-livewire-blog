<?php

namespace App\Queries\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;

class EloquentPostQuery
{
    const PAGINATE = 10;

    public function getPosts($requestParams = null, $type)
    {
        $query = Post::query();
        $this->applySelectStatement($query);
        $this->applyJoin($query);
        $this->applyRequestParams($query, $requestParams);
        if ($type == 'details') {
            $this->applyPreviousAndNextPost($query);
        }
        $paginator = $query->paginate(self::PAGINATE);
        $paginator->appends(request()->all());
        return $paginator;
    }

    private function applySelectStatement(Builder $query)
    {
        $query->select(
            'posts.id as post_id',
            'title',
            'description',
            'publication_date',
            'u.name as user_name',
        );
    }

    private function applyJoin(Builder $query)
    {
        $query->leftJoin('users as u', 'u.id', 'posts.user_id');
    }

    private function applyRequestParams(Builder $query, $requestParams)
    {
        if (isset($requestParams['user_id'])) {
            $userId = $requestParams['user_id'];
            $query->leftJoin('users as us', function (JoinClause $query) use ($userId) {
                $query->on('posts.user_id', '=', 'us.id')
                    ->where('us.id', $userId);
            });
        }
        if (isset($requestParams['id'])) {
            $query->where('posts.id', $requestParams['id']);
        }
        if (isset($requestParams['sort_by'])) {
            if ($requestParams['sort_by'] == 'oldest') {
                $query->orderBy('publication_date', 'asc');
            } elseif ($requestParams['sort_by'] == 'oldest') {
                $query->orderBy('publication_date', 'desc');
            }
        }
    }

    private function applyPreviousAndNextPost(Builder $query)
    {
        $postId = $query->first()->post_id;
        $query->orWhere('posts.id', '<', $postId)->max('posts.id');
        $query->orWhere('posts.id', '>', $postId)->min('posts.id');
    }
}
