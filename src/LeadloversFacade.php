<?php

namespace Victorino\Leadlovers;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Thiagovictorino\Leadlovers\Skeleton\SkeletonClass
 */
class LeadloversFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'leadlovers';
    }
}
