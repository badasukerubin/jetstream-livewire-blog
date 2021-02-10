<?php

namespace App\Traits;

use Illuminate\Routing\Route;

trait RequestTrait
{
    /**
     * Change the sort by route based on user selection
     *
     * @param Route $route
     * @param string $sortBy
     * @return Route route()
     */
    public static function changeSortByInRoute(Route $route, string $sortBy)
    {
        $parameters['sort_by'] = $sortBy;
        $name = $route->getName();

        return route($name, $parameters);
    }
}
