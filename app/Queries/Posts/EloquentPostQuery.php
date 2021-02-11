<?php

namespace App\Queries\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;

class EloquentPostQuery
{
    const PAGINATE = 10;

    public function getPosts($requestParams = null)
    {
        $query = Post::query();
        $this->applySelectStatement($query);
        $this->applyJoin($query);
        $this->applyRequestParams($query, $requestParams);

        $query = $query->paginate(self::PAGINATE);
        $query->appends(request()->all());
        return $query;
    }

    public function getOnePost($requestParams = null)
    {
        $query = Post::query();
        $this->applySelectStatement($query);
        $this->applyRequestID($query, $requestParams);
        $this->applyJoin($query);

        return $query;
    }

    public function getPrevNextPosts($postId, $type)
    {
        $query = Post::query();
        $this->applySelectStatement($query);
        $this->applyJoin($query);

        if ($type == 'prev') {
            $query->where('posts.id', '<', $postId);
        } else {
            $query->where('posts.id', '>', $postId);
        }

        return $query;
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

    private function applyRequestID(Builder $query, $requestParams)
    {
        $query->where('posts.id', $requestParams['id']);
    }

    private function applyJoin(Builder $query)
    {
        $query->leftJoin('users as u', 'u.id', 'posts.user_id');
    }

    private function applyRequestParams(Builder $query, $requestParams)
    {
        if (isset($requestParams['user_id'])) {
            $userId = $requestParams['user_id'];
            // $query->leftJoin('users as us', function (JoinClause $query) use ($userId) {
            // $query->on('posts.user_id', '=', 'u.id')
            $query->where('u.id', $userId);
            // });
        }

        if (isset($requestParams['sort_by'])) {
            if ($requestParams['sort_by'] == 'oldest') {
                $query->orderBy('publication_date', 'asc');
            } elseif ($requestParams['sort_by'] == 'latest') {
                $query->orderBy('publication_date', 'desc');
            }
        }
    }
}
