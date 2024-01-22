<?php

namespace App\Http\Filters\Product;

use App\Http\Filters\AbstractFilter;
use App\Http\Filters\FilterInterface;
use App\Models\Product;

class IndexFilter extends AbstractFilter
{

    protected array $keys =
        [
            'title',
            'price_from',
            'price_to',
            'price_with_discount_from',
            'price_with_discount_to',
            'is_original',
        ];

    public function title($query, $value)
    {
        $query->where('title', 'like', $value);
    }

    public function priceFrom($query, $value)
    {
        $query->where('price', '>', $value);
    }

    public function priceTo($query, $value)
    {
        $query->where('price', '<', $value);
    }

    public function priceWithDiscountFrom($query, $value)
    {
        $query->where('price_with_discount', '>', $value);
    }

    public function priceWithDiscountTo($query, $value)
    {
        $query->where('price_with_discount', '<', $value);
    }

    public function isOriginal($query, $value)
    {
        $query->where('is_original', $value);
    }
}

