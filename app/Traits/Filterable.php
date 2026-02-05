<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Filterable
{
    public function scopeFilter($query, Request $request, array $allowedFilters = [])
    {
        foreach ($allowedFilters as $filter => $operator) {
            if ($request->filled($filter)) {
                $value = $request->input($filter);

                switch ($operator) {
                    case '=':
                        $query->where($filter, $value);
                        break;

                    case '>':
                        $query->where($filter, '>', $value);
                        break;

                    case '<':
                        $query->where($filter, '<', $value);
                        break;

                    case '>=':
                        $query->where($filter, '>=', $value);
                        break;

                    case '<=':
                        $query->where($filter, '<=', $value);
                        break;

                    case 'like':
                        $query->where($filter, 'like', "%{$value}%");
                        break;

                    case 'between':
                        if (is_array($value) && count($value) === 2) {
                            $query->whereBetween($filter, $value);
                        }
                        break;
                }
            }
        }

        // Ordenamiento genérico
        if ($request->filled('sort')) {
            $query->orderBy(
                $request->input('sort'),
                $request->input('order', 'asc')
            );
        }

        return $query;
    }
}
