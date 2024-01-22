<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function scopeOriginalProducts(Builder $builder)
    {
        return $builder->where('is_original', '=','true');
    }
}
