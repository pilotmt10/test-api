<?php

namespace App\Base\Repository;

use Illuminate\Database\Eloquent\Builder;

trait Filters
{
    public function filter(
        Builder $query,
        array $filters,
        string $filterKey,
        string $action,
        string $modelKey = '',
        string $relation = ''
    ): void
    {
        if (!isset($filters[$filterKey])) {
            return;
        }

        $column = $modelKey ?: $filterKey;
        $value = $filters[$filterKey];

        if ($action === 'like') {
            $value = '%' . $value . '%';
        }

        if ($relation) {
            $query->whereHas($relation, function (Builder $builder) use ($column, $action, $value) {
                return $builder->where($column, $action, $value);
            });
        } else {
            $query->where($column, $action, $value);
        }
    }
}
