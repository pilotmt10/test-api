<?php

namespace App\Domain\Category\Models;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property Product[]|Collection $products
 */
class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'categories_products');
    }
}
