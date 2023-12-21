<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Search
{
    public static function bootSearch()
    {
        static::addGlobalScope('search', function (Builder $builder) {
            $search = request()->get('search');
            if ($search) {
                $builder->where('title', 'like', "%{$search}%");
            }
        });
    }
}
