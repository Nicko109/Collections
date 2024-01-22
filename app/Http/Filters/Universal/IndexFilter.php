<?php

namespace App\Http\Filters\Universal;

use App\Http\Filters\AbstractFilter;
use App\Http\Filters\FilterInterface;
use App\Models\Product;

class IndexFilter extends AbstractFilter
{

    protected array $keys =
        [
            'title',
        ];

    public function title($query, $value)
    {
        $query->where('title', 'like', $value);
    }

}

