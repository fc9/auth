<?php


namespace App\Traits;


trait FilterAccessProfileUserTrait
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('only-user', function (Builder $builder) {
            $builder->where('is_user', true);
        });
    }

}