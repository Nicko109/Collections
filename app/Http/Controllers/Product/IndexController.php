<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\Product\IndexFilter;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();

        $indexFilter = new \App\Http\Filters\Universal\IndexFilter();

        $modelList = [Product::class];
        $result = [];
        foreach ($modelList as $model)
        {
            $result[$model] = $indexFilter->getData($model, $data);
        }

        return $result;
    }
}
