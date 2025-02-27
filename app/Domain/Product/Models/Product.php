<?php

namespace App\Domain\Product\Models;

use App\Domain\Category\Models\Category;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Category[]|Collection $categories
 */
class Product extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'active'
    ];

    protected $casts = [
        'active' => 'bool',
        'deleted' => 'bool',
        'price' => 'double'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_products');
    }

    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}
