<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Infra\Skeleton\SkeletonClass
 */
class ApiConsumer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'apiconsumer';
    }

}
