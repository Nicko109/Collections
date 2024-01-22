<?php

namespace App\Http\Filters;

use App\Models\Product;
use Illuminate\Support\Str;

abstract class AbstractFilter
{

    protected array $keys = [];


    public function getData($ClassModel, $data)
    {
        $query = $ClassModel::originalProducts();

        foreach ($this->keys as $key) {
            if (isset($data[$key])) {
                $methodName = Str::camel($key);
                $this->$methodName($query, $data[$key]);
            }
        }
        return $query->get();
    }
}
