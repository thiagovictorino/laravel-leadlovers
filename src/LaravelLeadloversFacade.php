<?php

namespace Victorino\LaravelLeadlovers;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Thiagovictorino\LaravelLeadlovers\Skeleton\SkeletonClass
 */
class LaravelLeadloversFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-leadlovers';
    }
}
