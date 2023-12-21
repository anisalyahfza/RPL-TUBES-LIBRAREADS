<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class DatatableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('datatable', function ($request, $useSort = true) {
            $query = $this;
            $searchColumns = blank($request->search_columns) ? [] : explode(',', $request->search_columns);
            $searchKey = $request->search_key ?? '';
            $sortColumn = $request->sort_column ?? 'created_at';
            $sortType = $request->sort_type ?? 'desc';
            $filterColumns = blank($request->filter_columns) ? [] : explode(',', $request->filter_columns);
            $filterKeys = blank($request->filter_keys) ? [] : explode(',', $request->filter_keys);
            $filterDateColumn = $request->filter_date_column;
            $filterDateStart = $request->filter_date_start;
            $filterDateEnd = $request->filter_date_end;

            if (!blank($searchColumns) && !blank($searchKey)) {
                $query = $query->orWhere(function ($query) use ($searchColumns, $searchKey) {
                    foreach ($searchColumns as $searchColumn) {
                        if (str_contains($searchColumn, '.')) {
                            $dir = Str::beforeLast($searchColumn, '.');
                            $dir = Str::camel($dir);
                            $col = Str::afterLast($searchColumn, '.');
                            $query = $query->orWhereHas($dir, function ($query) use ($col, $searchKey) {
                                $query->where($col, 'LIKE', "%$searchKey%");
                            });
                        } else {
                            $query = $query->orWhere($searchColumn, 'LIKE', "%$searchKey%");
                        }
                    }
                });
            }
            if (!blank($filterColumns) && !blank($filterKeys)) {
                $query = $query->where(function ($query) use ($filterColumns, $filterKeys) {
                    $size = count($filterColumns);
                    for ($i = 0; $i < $size; $i++) {
                        $filterColumn = $filterColumns[$i];
                        $filterKey = $filterKeys[$i];

                        if (str_contains($filterColumn, '.')) {
                            $dir = Str::beforeLast($filterColumn, '.');
                            $dir = Str::camel($dir);
                            $col = Str::afterLast($filterColumn, '.');
                            $query = $query->whereHas($dir, function ($query) use ($col, $filterKey) {
                                if (str_contains($filterKey, '|')) {
                                    $in = explode('|', $filterKey);
                                    $query->whereIn($col, $in);
                                } else {
                                    if ($filterKey == '<null>') {
                                        $query->whereNull($col);
                                    } elseif ($filterKey == '<!null>') {
                                        $query->whereNotNull($col);
                                    } else {
                                        $query->where($col, $filterKey);
                                    }
                                }
                            });
                            if (Str::contains($filterKey, '<_null>')) {
                                $query = $query->orWhereDoesntHave($dir);
                            }
                        } else {
                            if (str_contains($filterKey, '|')) {
                                $in = explode('|', $filterKey);
                                $query = $query->whereIn($filterColumn, $in);
                            } else {
                                if ($filterKey == '<null>') {
                                    $query->whereNull($filterColumn);
                                } elseif ($filterKey == '<!null>') {
                                    $query->whereNotNull($filterColumn);
                                } else {
                                    $query->where($filterColumn, $filterKey);
                                }
                            }
                        }
                    }
                });
            }
            if (!blank($filterDateColumn) && (!blank($filterDateStart) || !blank($filterDateEnd))) {
                $query = $query->where(function ($query) use ($filterDateColumn, $filterDateStart, $filterDateEnd) {
                    if(!blank($filterDateStart)) {
                        $filterDateStart = Carbon::parse($filterDateStart)->toDateTimeString();
                        $query->where($filterDateColumn, '>=', $filterDateStart);
                    }
                    if(!blank($filterDateEnd)) {
                        $filterDateEnd = Carbon::parse($filterDateEnd)->toDateTimeString();
                        $query->where($filterDateColumn, '<=', $filterDateEnd);
                    }
                });
            }

            if ($useSort) {
                if (str_contains($sortColumn, '.')) {
                    $dir = Str::beforeLast($sortColumn, '.');
                    $col = Str::afterLast($sortColumn, '.');
                    $query->with([$dir => function ($query) use ($col, $sortType){
                        $query->orderBy($col, $sortType);
                    }]);
                } else {
                    $query->orderBy($sortColumn, strtolower($sortType));
                }
            }
            return $query;
        });
    }
}
